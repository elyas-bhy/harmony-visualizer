package com.analysis.focus;

import java.util.TreeMap;

import javax.persistence.Entity;

import com.analysis.focus.viewer.AbstractVisualizerEntity;

@Entity
public class Contributor extends AbstractVisualizerEntity {
	
	private double daf;
	
	public Contributor() {
		// Key: component ID
		// Value: contributions made by this contributor
		// towards the specified component
		contributionMap = new TreeMap<>();
	}
	
	public Contributor(String name) {
		this();
		this.name = name;
	}

	public double getDaf() {
		return daf;
	}

	public void setDaf(double daf) {
		this.daf = daf;
	}
	
	public void addComponent(Component component) {
		String id = component.getName();
		if (contributionMap.containsKey(id)) {
			Distribution d = contributionMap.get(id);
			d.setContributions(d.getContributions() + 1);
			contributionMap.put(id, d);
		} else {
			contributionMap.put(id, new Distribution(id, 1));
		}
		++contributions;
	}
	
	public String toString() {
		StringBuilder sb = new StringBuilder();
		sb.append(getClass().getSimpleName());
		sb.append("[Contributions: " + contributions);
		sb.append(", contribProportion: " + contribProportion);
		sb.append(", components: " + contributionMap.values().toString());
		sb.append("]");
		return sb.toString();
	}
	
}
