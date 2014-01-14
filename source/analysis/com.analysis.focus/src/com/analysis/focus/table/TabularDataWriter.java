package com.analysis.focus.table;

import java.io.File;
import java.io.IOException;
import java.util.Map;

import org.apache.commons.io.FileUtils;

import com.analysis.focus.Contributor;
import com.analysis.focus.Distribution;

public class TabularDataWriter {
	
	private Map<String,Contributor> contributors;
	private StringBuffer data;
	
	public TabularDataWriter(Map<String,Contributor> contributors) {
		this.contributors = contributors;
		this.data = new StringBuffer();
	}

	public void generateTable() {
		data.append("[");
		for (Contributor contributor : contributors.values()) {
			data.append("{ \"name\":\"");
			data.append(contributor.getName());
			data.append("\" ");
			for (Distribution d : contributor.getContributionMap().values()) {
				data.append(",\"" + d.getName());
				data.append("\":\"");
				data.append(d.getContributions());
				data.append("\" ");
			}
			data.append("},");
		}
		data.append("]");
		
		File file = new File("tview.json");
		try {
			FileUtils.writeStringToFile(file, data.toString());
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
}
