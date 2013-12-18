package com.analysis.focus;

import java.io.File;
import java.io.IOException;
import java.util.HashMap;
import java.util.HashSet;
import java.util.LinkedHashMap;
import java.util.List;
import java.util.Map;
import java.util.Map.Entry;
import java.util.Properties;
import java.util.Set;

import org.apache.commons.io.FileUtils;

import com.analysis.focus.viewer.ComponentData;
import com.analysis.focus.viewer.ContributorData;
import com.analysis.focus.viewer.VisualizerData;
import com.google.gson.Gson;

import fr.labri.harmony.core.analysis.AbstractAnalysis;
import fr.labri.harmony.core.config.model.AnalysisConfiguration;
import fr.labri.harmony.core.dao.Dao;
import fr.labri.harmony.core.log.HarmonyLogger;
import fr.labri.harmony.core.model.Author;
import fr.labri.harmony.core.model.Event;
import fr.labri.harmony.core.model.Item;
import fr.labri.harmony.core.model.Source;


public class FocusAnalysis extends AbstractAnalysis {
	
	private HashMap<String,VisualizerData> data;
	private HashMap<String,Distribution> distributions;
	private HashMap<String,Component> components;
	private HashMap<String,Contributor> contributors;

	public FocusAnalysis() {
		super();
		data = new LinkedHashMap<>();
		distributions = new HashMap<>();
		components = new HashMap<>();
		contributors = new HashMap<>();
	}

	public FocusAnalysis(AnalysisConfiguration config, Dao dao, Properties properties) {
		super(config, dao, properties);
		data = new LinkedHashMap<>();
		distributions = new HashMap<>();
		components = new HashMap<>();
		contributors = new HashMap<>();
	}

	@Override
	public void runOn(Source src) {
		HarmonyLogger.info("Starting FocusAnalysis, with " + src.getItems().size() + " items to analyze.");
		initComponents(src.getItems());
		
		int totalContributions = 0;
		for (Author author : src.getAuthors()) {
			Contributor c = new Contributor(author.getNativeId());
			
			for (Event event : author.getEvents()) {
				Set<Component> cc = new HashSet<>();
				
				// Regroup modified items that belong to the same component
				for (Item item : dao.getItems(event)) {
					Component component = findComponent(item);
					cc.add(component);
				}
				
				// Increment contributions once for each affected component
				for (Component cm : cc) {
					c.addComponent(cm);
					cm.addContributor(c);
					++totalContributions;
				}
			}
			contributors.put(author.getNativeId(), c);
		}
		
		// Update contributions percentage for all components
		for (Component component : components.values()) {
			component.updateContribProportion(totalContributions);
			dao.saveData(getPersitenceUnitName(), component, src);
		}
		
		int contribs;
		String componentId;
		for (Contributor contributor : contributors.values()) {
			contributor.updateContribProportion(totalContributions);
			dao.saveData(getPersitenceUnitName(), contributor, src);
			
			// Calculate the distribution of the contributor's contributions
			for (Entry<String,Integer> entry : contributor.getContributionMap().entrySet()) {
				componentId = entry.getKey();
				contribs = entry.getValue();
				Distribution d = new Distribution(contributor.getAuthorId(), componentId);
				d.setContributions(contribs);
				d.setQprime((double)contribs / (double)contributor.getContributions());
				d.setRprime((double)contribs / (double)components.get(componentId).getContributions());
				distributions.put(contributor.getAuthorId(), d);
				dao.saveData(getPersitenceUnitName(), d, src);
			}
		}

		generateJsonData();
	}
	
	private void generateJsonData() {
		int i = 1;
		ContributorData cdata;
		for (Contributor contributor : contributors.values()) {
			cdata = new ContributorData();
			cdata.putComponents(contributor.getContributionMap().size());
			cdata.putNumContributions(contributor.getContributions());
			cdata.putProportionContributions(contributor.getContribProportion());
			cdata.putDaf(0);
			cdata.putRelations(new LinkedHashMap<String,Double>());
			data.put("D" + i, cdata);
			++i;
		}
		
		i = 1;
		ComponentData mdata;
		for (Component component : components.values()) {
			mdata = new ComponentData();
			mdata.putContributors(component.getContributionMap().size());
			mdata.putNumContributions(component.getContributions());
			mdata.putItems(component.getItems().size());
			mdata.putMaf(0);
			mdata.putRelations(new LinkedHashMap<String,Double>());
			data.put("M" + i, mdata);
			++i;
		}
		
		Gson gson = new Gson();
		File file = new File("visualizer-data.txt");
		try {
			FileUtils.writeStringToFile(file, gson.toJson(data));
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
	
	/**
	 * Returns the associated component if found, or null
	 * @param item
	 */
	private Component findComponent(Item item) {
		return components.get(extractPrefix(item));
	}
	
	/**
	 * Returns the prefix of the item's path
	 * @param item
	 * @return
	 */
	private String extractPrefix(Item item) {
		String prefix = item.getNativeId();
		if (prefix.lastIndexOf('/') != -1) {
			prefix = prefix.substring(0, prefix.lastIndexOf('/'));
		} else {
			prefix = "/";
		}
		return prefix;
	}
	
	/**
	 * Assigns the provided items to their respective components
	 * @param items
	 */
	private void initComponents(List<Item> items) {
		HarmonyLogger.info("Extracting components");
		for (Item item : items) {
			String prefix = extractPrefix(item);
			
			if (components.containsKey(prefix)) {
				components.get(prefix).add(item);
			} else {
				components.put(prefix, new Component(prefix, item));
			}
		}
	}

}