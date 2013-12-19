package com.analysis.focus;

import java.util.Map;
import java.util.TreeMap;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Transient;

import com.analysis.focus.viewer.AbstractVisualizerEntity;

@Entity
public class Contributor extends AbstractVisualizerEntity implements Comparable<Contributor> {

	@Id
	@GeneratedValue
	private int id;
	
	// Key: component ID
	// Value: contributions made by this contributor
	// towards the specified component
	@Transient
	private Map<String,Distribution> contributionMap;
	
	private double daf;
	
	public Contributor() {
		contributionMap = new TreeMap<>();
	}
	
	public Contributor(String name) {
		this();
		this.name = name;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public double getDaf() {
		return daf;
	}

	public void setDaf(double daf) {
		this.daf = daf;
	}
	
	public void updateContribProportion(int totalContributions) {
		contribProportion = (double)contributions / (double)totalContributions;
	}
	
	public Map<String,Distribution> getContributionMap() {
		return contributionMap;
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

	@Override
	public int compareTo(Contributor c) {
		return name.compareToIgnoreCase(c.getName());
	}
	
}
