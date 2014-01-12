package com.analysis.focus.viewer;

import java.util.Map;

import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.MappedSuperclass;
import javax.persistence.Transient;

import com.analysis.focus.Distribution;

@MappedSuperclass
public abstract class AbstractVisualizerEntity implements VisualizerEntity, Comparable<VisualizerEntity> {

	@Id
	@GeneratedValue
	protected int id;
	protected String name;
	protected int contributions;
	protected double contribProportion;

	@Transient
	protected Map<String,Distribution> contributionMap;
	

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
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

	public void setContribProportion(double contribProportion) {
		this.contribProportion = contribProportion;
	}

	public void updateContribProportion(int totalContributions) {
		contribProportion = (double)contributions / (double)totalContributions;
	}

	public Map<String,Distribution> getContributionMap() {
		return contributionMap;
	}

	@Override
	public int compareTo(VisualizerEntity e) {
		return name.compareToIgnoreCase(e.getName());
	}
}
