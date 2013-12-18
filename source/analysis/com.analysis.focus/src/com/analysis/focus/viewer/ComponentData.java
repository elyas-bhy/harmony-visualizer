package com.analysis.focus.viewer;

import java.util.LinkedHashMap;
import java.util.Map;

import com.google.gson.annotations.Expose;

public class ComponentData implements VisualizerData {
	
	@Expose
	private Map<String,Object> properties;
	private String id;
	
	public ComponentData(String id) {
		this.properties = new LinkedHashMap<>();
		this.id = id;
	}
	
	public String getID() {
		return id;
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
}
