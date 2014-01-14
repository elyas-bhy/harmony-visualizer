package com.analysis.focus;

import java.util.HashMap;
import java.util.HashSet;
import java.util.List;
import java.util.Map;
import java.util.Map.Entry;
import java.util.Properties;
import java.util.Set;

import com.analysis.focus.table.TabularDataWriter;
import com.analysis.focus.viewer.VisualizerDataWriter;
import com.analysis.focus.viewer.VisualizerEntity;

import fr.labri.harmony.core.analysis.AbstractAnalysis;
import fr.labri.harmony.core.config.model.AnalysisConfiguration;
import fr.labri.harmony.core.dao.Dao;
import fr.labri.harmony.core.log.HarmonyLogger;
import fr.labri.harmony.core.model.Author;
import fr.labri.harmony.core.model.Event;
import fr.labri.harmony.core.model.Item;
import fr.labri.harmony.core.model.Source;


public class FocusAnalysis extends AbstractAnalysis {
	
	private int totalContributions;
	private Map<String,Component> components;
	private Map<String,Contributor> contributors;

	public FocusAnalysis() {
		super();
		components = new HashMap<>();
		contributors = new HashMap<>();
	}

	public FocusAnalysis(AnalysisConfiguration config, Dao dao, Properties properties) {
		super(config, dao, properties);
		components = new HashMap<>();
		contributors = new HashMap<>();
	}

	@Override
	public void runOn(Source src) {
		HarmonyLogger.info("Starting FocusAnalysis, with " + src.getItems().size() + " items to analyze.");
		initComponents(src.getItems());
		
		totalContributions = 0;
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
		updateContributions(src, components, contributors);
		// Update contributions percentage for all contributors
		updateContributions(src, contributors, components);

		VisualizerDataWriter writer = new VisualizerDataWriter(contributors, components);
		writer.generateRelations();
		writer.generateMapping();
		
		TabularDataWriter twriter = new TabularDataWriter(contributors);
		twriter.generateTable();
	}
	
	private void updateContributions(Source src, 
			Map<String, ? extends VisualizerEntity> a, Map<String, ? extends VisualizerEntity> b) {
		int contribs;
		String entityId;
		for (VisualizerEntity entity : a.values()) {
			entity.updateContribProportion(totalContributions);

			// Calculate the distribution of the entity's contributions
			for (Entry<String,Distribution> entry : entity.getContributionMap().entrySet()) {
				entityId = entry.getKey();
				Distribution d = entry.getValue();
				contribs = d.getContributions();
				d.setQprime((double)contribs / (double)entity.getContributions());
				d.setRprime((double)contribs / (double)b.get(entityId).getContributions());
			}
			
			dao.saveData(getPersitenceUnitName(), entity, src);
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