package com.analysis.focus.table;

import java.io.File;
import java.io.IOException;
import java.util.Map;

import org.apache.commons.io.FileUtils;

import com.analysis.focus.Component;
import com.analysis.focus.Contributor;
import com.analysis.focus.Distribution;

public class TabularDataWriter {

	private Map<String,Contributor> contributors;
	private Map<String,Component> components;
	private StringBuffer data;
	
	public TabularDataWriter(Map<String,Contributor> contributors, Map<String,Component> components) {
		this.contributors = contributors;
		this.components = components;
		this.data = new StringBuffer();
	}

	public void generateTable() {
		int total = 0;
		data.append("[");
		for (Contributor contributor : contributors.values()) {
			data.append("{ \"name\":\"");
			data.append(contributor.getName());
			data.append("\"");
			for (Distribution d : contributor.getContributionMap().values()) {
				data.append(",\"" + d.getName());
				data.append("\":\"");
				data.append(d.getContributions());
				data.append("\"");
				total += d.getContributions();
			}
			data.append(",\"total\":\"");
			data.append(total);
			data.append("\"},");
			total = 0;
		}
		
		data.append("{ \"name\":\" TOTAL\"");
		for (Component component : components.values()) {
			data.append(",\"" + component.getName());
			data.append("\":\"");
			data.append(component.getContributions());
			data.append("\"");
		}
		data.append("}]");
		
		File file = new File("tview.json");
		try {
			FileUtils.writeStringToFile(file, data.toString());
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
}
