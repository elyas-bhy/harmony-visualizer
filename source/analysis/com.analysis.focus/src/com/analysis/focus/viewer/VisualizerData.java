package com.analysis.focus.viewer;

import java.util.Map;

public interface VisualizerData {

	public Map<String,Object> getProperties();
	public String toJson();
}
