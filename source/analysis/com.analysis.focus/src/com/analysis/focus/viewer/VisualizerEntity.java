package com.analysis.focus.viewer;

import java.util.Map;

import com.analysis.focus.Distribution;

public interface VisualizerEntity {
	

	public int getId();

	public void setId(int id);
	
	public String getName();
	
	public void setName(String name);

	public int getContributions();

	public void setContributions(int contributions);

	public double getContribProportion();

	public void setContribProportion(double contribProportion);
	
	public void updateContribProportion(int totalContributions);

	public Map<String,Distribution> getContributionMap();
}
