package com.analysis.focus;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Transient;

import fr.labri.harmony.core.model.Item;

@Entity
public class Component {
	
	@Id
	@GeneratedValue
	private int id;
	
	@Transient
	private List<Item> items;
	
	// Key: contributor ID
	// Value: number of contributors who contributed 
	// towards this component
	@Transient
	private HashMap<String,Integer> contributionMap;
	
	private String name;
	private int contributions;
	private double contribProportion;
	
	
	public Component() {
		items = new ArrayList<Item>();
		contributionMap = new HashMap<>();
	}
	
	public Component(String name, Item item) {
		this();
		this.name = name;
		add(item);
	}
	
	public void add(Item item) {
		items.add(item);
	}
	
	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public List<Item> getItems() {
		return items;
	}

	public void setItems(List<Item> items) {
		this.items = items;
	}

	public HashMap<String, Integer> getContributionMap() {
		return contributionMap;
	}

	public void setContributionMap(HashMap<String, Integer> contributionMap) {
		this.contributionMap = contributionMap;
	}

	public String getName() {
		return name;
	}

	public void setName(String name) {
		this.name = name;
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

	public void addContributor(Contributor contributor) {
		String id = contributor.getAuthorId();
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
		sb.append("[Name: " + name);
		sb.append(", contributions: " + contributions);
		sb.append(", contribProportion: " + contribProportion);
		sb.append(", items: " + items.toString());
		sb.append("]");
		return sb.toString();
	}
	
}
