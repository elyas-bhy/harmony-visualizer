package com.analysis.focus.viewer;


public abstract class AbstractVisualizerEntity implements VisualizerEntity {

	protected String name;
	protected int contributions;
	protected double contribProportion;
	

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
}
