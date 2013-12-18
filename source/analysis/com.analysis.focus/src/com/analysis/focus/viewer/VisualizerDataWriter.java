package com.analysis.focus.viewer;

import java.io.File;
import java.io.IOException;
import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.Map;
import java.util.Map.Entry;

import org.apache.commons.io.FileUtils;

import com.analysis.focus.Component;
import com.analysis.focus.Contributor;
import com.analysis.focus.Distribution;
import com.google.gson.Gson;
import com.google.gson.GsonBuilder;

public class VisualizerDataWriter {

	private HashMap<String,VisualizerData> data;
	private HashMap<String,Contributor> contributors;
	private HashMap<String,Component> components;
	
	public VisualizerDataWriter(HashMap<String,Contributor> contributors, HashMap<String,Component> components) {
		this.data = new LinkedHashMap<>();
		this.contributors = contributors;
		this.components = components;
	}

	public void generateRelations() {
		int i = 1;
		ContributorData cdata;
		for (Contributor contributor : contributors.values()) {
			cdata = new ContributorData(contributor.getAuthorId());
			cdata.putComponents(contributor.getContributionMap().size());
			cdata.putNumContributions(contributor.getContributions());
			cdata.putProportionContributions(contributor.getContribProportion());
			cdata.putDaf(0);
			Map<String,Double> relations = new LinkedHashMap<>();
			for (Entry<String,Distribution> entry : contributor.getContributionMap().entrySet()) {
				relations.put(entry.getKey(), entry.getValue().getQprime());
			}
			cdata.putRelations(relations);
			data.put("D" + i, cdata);
			++i;
		}
		
		i = 1;
		ComponentData mdata;
		for (Component component : components.values()) {
			mdata = new ComponentData(component.getName());
			mdata.putContributors(component.getContributionMap().size());
			mdata.putNumContributions(component.getContributions());
			mdata.putItems(component.getItems().size());
			mdata.putMaf(0);
			Map<String,Double> relations = new LinkedHashMap<>();
			for (Entry<String,Distribution> entry : component.getContributionMap().entrySet()) {
				relations.put(entry.getKey(), entry.getValue().getQprime());
			}
			mdata.putRelations(relations);
			data.put("M" + i, mdata);
			++i;
		}
		
		Gson gson = new GsonBuilder().excludeFieldsWithoutExposeAnnotation().create();
		File file = new File("popup.json");
		try {
			FileUtils.writeStringToFile(file, gson.toJson(data));
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
	public void generateMapping() {
		StringBuffer sb = new StringBuffer();
		sb.append("var mapping = {\n");
		
		for (Entry<String,VisualizerData> entry : data.entrySet()) {
			sb.append("\"" + entry.getKey() + "\"");
			sb.append(":\"");
			sb.append(entry.getValue().getID());
			sb.append("\",\n");
		}

		sb.append("\"D\":\"Developpers\",\n");
		sb.append("\"M\":\"Modules\",\n");
		sb.append("\"PC\":\"Commits (%)\",\n");
		sb.append("\"DAF\":\"DAF\",\n");
		sb.append("\"MAF\":\"MAF\",\n");
		sb.append("\"NBI\":\"Items\",\n");
		sb.append("\"NBC\":\"Contributions\",\n");
		sb.append("\"TPC\":\"Total commits (%)\"\n");
		sb.append("}");
		
		File file = new File("mapping.js");
		try {
			FileUtils.writeStringToFile(file, sb.toString());
		} catch (IOException e) {
			e.printStackTrace();
		}
	}
	
	public void generateFlows() {
		// TODO
	}
}
