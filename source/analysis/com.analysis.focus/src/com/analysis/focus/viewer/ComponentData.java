package com.analysis.focus.viewer;

import java.util.LinkedHashMap;
import java.util.Map;

public class ComponentData implements VisualizerData {
	
	private Map<String,Object> properties;
	
	public ComponentData() {
		properties = new LinkedHashMap<>();
	}

	public void putContributors(int numContributors) {
		properties.put("D", numContributors);
	}
	
	public void putItems(int numItems) {
		properties.put("NBI", numItems);
	}
	
	public void putNumContributions(int numContributions) {
		properties.put("NBC", numContributions);
	}
	
	public void putMaf(double maf) {
		properties.put("MAF", maf);
	}
	
	public void putRelations(Map<String,Double> relations) {
		properties.put("relations", relations);
	}
	
	public Map<String,Object> getProperties() {
		return properties;
	}
	
	public String toJson() {
		return "";
	}
}
