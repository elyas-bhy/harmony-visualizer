package com.analysis.focus;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.TreeMap;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Transient;

import com.analysis.focus.viewer.AbstractVisualizerEntity;

import fr.labri.harmony.core.model.Item;

@Entity
public class Component extends AbstractVisualizerEntity implements Comparable<Component> {
	
	@Id
	@GeneratedValue
	private int id;
	
	@Transient
	private List<Item> items;
	
	// Key: contributor ID
	// Value: number of contributors who contributed 
	// towards this component
	@Transient
	private Map<String,Distribution> contributionMap;
	
	
	public Component() {
		items = new ArrayList<Item>();
		contributionMap = new TreeMap<>();
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

	public Map<String,Distribution> getContributionMap() {
		return contributionMap;
	}

	public void setContributionMap(HashMap<String,Distribution> contributionMap) {
		this.contributionMap = contributionMap;
	}
	
	public void updateContribProportion(int totalContributions) {
		contribProportion = (double)contributions / (double)totalContributions;
	}

	public void addContributor(Contributor contributor) {
		String id = contributor.getName();
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
		sb.append("[Name: " + name);
		sb.append(", contributions: " + contributions);
		sb.append(", contribProportion: " + contribProportion);
		sb.append(", items: " + items.toString());
		sb.append("]");
		return sb.toString();
	}

	@Override
	public int compareTo(Component c) {
		return name.compareToIgnoreCase(c.getName());
	}
	
}
