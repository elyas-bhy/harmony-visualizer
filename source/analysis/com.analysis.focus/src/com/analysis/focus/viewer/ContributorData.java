package com.analysis.focus.viewer;

import java.util.LinkedHashMap;
import java.util.Map;

import com.google.gson.annotations.Expose;

public class ContributorData implements VisualizerData {
	
	@Expose
	private Map<String,Object> properties;
	private String id;
	
	public ContributorData(String id) {
		this.properties = new LinkedHashMap<>();
		this.id = id;
	}
	
	public String getID() {
		return id;
	}

	public void putComponents(int numComponents) {
		properties.put("M", numComponents);
	}

	public void putNumContributions(int numContributions) {
		properties.put("NBC", numContributions);
	}
	
	public void putProportionContributions(double proportionContrib) {
		properties.put("PC", proportionContrib);
	}
	
	public void putDaf(double daf) {
		properties.put("DAF", daf);
	}
	
	public void putRelations(Map<String,Double> relations) {
		properties.put("relations", relations);
	}
	
	public Map<String,Object> getProperties() {
		return properties;
	}

}
