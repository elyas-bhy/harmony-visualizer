package com.analysis.focus;

import java.util.HashMap;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Transient;

@Entity
public class Contributor {

	@Id
	@GeneratedValue
	private int id;
	
	// Key: component ID
	// Value: contributions made by this contributor
	// towards the specified component
	@Transient
	private HashMap<String,Integer> contributionMap;
	
	private String authorId;
	private double daf;
	private int contributions;
	private double contribProportion;
	
	public Contributor() {
		contributionMap = new HashMap<>();
	}
	
	public Contributor(String authorId) {
		this();
		this.authorId = authorId;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getAuthorId() {
		return authorId;
	}

	public void setAuthorId(String authorId) {
		this.authorId = authorId;
	}

	public double getDaf() {
		return daf;
	}

	public void setDaf(double daf) {
		this.daf = daf;
	}

	public int getContributions() {
		return contributions;
	}

	public void setContributions(int contributions) {
		this.contributions = contributions;
	}

	public double getContribProportion() {
		return contribProportion;
	}

	public void setContribProportion(double proportion) {
		this.contribProportion = proportion;
	}
	
	public void updateContribProportion(int totalContributions) {
		contribProportion = (double)contributions / (double)totalContributions;
	}
	
	public HashMap<String,Integer> getContributionMap() {
		return contributionMap;
	}

	public void setContributionMap(HashMap<String,Integer> contributionMap) {
		this.contributionMap = contributionMap;
	}
	
	public void addComponent(Component component) {
		String id = component.getName();
		if (contributionMap.containsKey(id)) {
			Integer count = contributionMap.get(id);
			contributionMap.put(id, count + 1);
		} else {
			contributionMap.put(id, 1);
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
