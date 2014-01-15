package com.analysis.focus.table;

import java.io.File;
import java.io.IOException;
import java.util.Map;

import org.apache.commons.io.FileUtils;

import com.analysis.focus.Component;
import com.analysis.focus.Contributor;
import com.analysis.focus.Distribution;
import com.analysis.focus.viewer.MapUtil;

public class TabularDataWriter {

	private Map<String,Contributor> contributors;
	private Map<String,Component> components;
	private StringBuffer data;
	
	public TabularDataWriter(Map<String,Contributor> contributors, Map<String,Component> components) {
		this.contributors = MapUtil.sortByValue(contributors);
		this.components = MapUtil.sortByValue(components);
		this.data = new StringBuffer();
	}

	public void generateTable() {
		// Generate contributions data in JSON format
		int total = 0;
		data.append("var items = [");
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
		data.append("}];\n");
		
		// Generate jQuery datatable with appropriate columns
		data.append("var input = {\n\t\"aaData\":items,\n\t\"bJQueryUI\":true,\n\t\"iDisplayLength\":50");
		data.append(",\n\t\"sPaginationType\":\"full_numbers\",\n\t\"aoColumns\":[\n\t");
		data.append("{\"sTitle\":\"Name\", \"mData\":\"name\", \"sClass\":\"dName\"},\n\t");
		data.append("{\"sTitle\":\"Total\", \"mData\":\"total\", \"sClass\":\"dTotal\"},\n\t");
		
		for (Component component : components.values()) {
			data.append("{\"sTitle\":\"");
			data.append(component.getName());
			data.append("\", \"mData\":\"");
			data.append(component.getName() + "\"},\n\t");
		}
		data.append("]};");
		
		
		File file = new File("tabledata.js");
		try {
			FileUtils.writeStringToFile(file, data.toString());
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
}
