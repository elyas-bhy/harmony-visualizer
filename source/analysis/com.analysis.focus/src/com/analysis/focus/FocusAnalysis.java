package com.analysis.focus;

import java.util.HashMap;
import java.util.HashSet;
import java.util.List;
import java.util.Properties;
import java.util.Set;

import fr.labri.harmony.core.analysis.AbstractAnalysis;
import fr.labri.harmony.core.config.model.AnalysisConfiguration;
import fr.labri.harmony.core.dao.Dao;
import fr.labri.harmony.core.log.HarmonyLogger;
import fr.labri.harmony.core.model.Author;
import fr.labri.harmony.core.model.Event;
import fr.labri.harmony.core.model.Item;
import fr.labri.harmony.core.model.Source;


public class FocusAnalysis extends AbstractAnalysis {
	
	private HashMap<String,Component> components;
	private HashMap<String,Contributor> contributors;

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
					c.setContributions(c.getContributions() + 1);
					c.addComponent(cm.getId());
					cm.setContributions(cm.getContributions() + 1);
				}
			}
			contributors.put(author.getNativeId(), c);
		}
		
		int totalCommits = src.getEvents().size(); // A
		for (Component component : components.values()) {
			component.updateContribProportion(totalCommits);
		}
		
		HarmonyLogger.info(contributors.values().toString());
		HarmonyLogger.info(components.values().toString());
	}
	
	/**
	 * Returns the associated component if found, or null
	 * @param item
	 */
	private Component findComponent(Item item) {
		return components.get(extractPrefix(item));
	}
	
	private String extractPrefix(Item item) {
		String prefix = item.getNativeId();
		if (prefix.lastIndexOf('/') != -1) {
			prefix = prefix.substring(0, prefix.lastIndexOf('/'));
		} else {
			prefix = "/";
		}
		return prefix;
	}
	
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