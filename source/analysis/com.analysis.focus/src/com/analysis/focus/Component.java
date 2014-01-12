package com.analysis.focus;

import java.util.ArrayList;
import java.util.List;
import java.util.TreeMap;

import javax.persistence.Entity;
import javax.persistence.Transient;

import com.analysis.focus.viewer.AbstractVisualizerEntity;

import fr.labri.harmony.core.model.Item;

@Entity
public class Component extends AbstractVisualizerEntity {
	
	@Transient
	private List<Item> items;
	
	public Component() {
		items = new ArrayList<Item>();
		// Key: contributor ID
		// Value: number of contributors who contributed 
		// towards this component
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

	public List<Item> getItems() {
		return items;
	}

	public void setItems(List<Item> items) {
		this.items = items;
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
	
}
