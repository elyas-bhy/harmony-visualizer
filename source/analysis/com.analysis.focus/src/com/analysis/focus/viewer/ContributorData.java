package com.analysis.focus.viewer;

import java.util.LinkedHashMap;
import java.util.Map;
import java.util.Map.Entry;

public class ContributorData implements VisualizerData {
	
	private Map<String,Object> properties;
	
	public ContributorData() {
		properties = new LinkedHashMap<>();
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
	
	public String toJson() {
		StringBuilder sb = new StringBuilder();
		for (Entry<String,Object> entry : properties.entrySet()) {
			
		}
		return "";
	}

}
