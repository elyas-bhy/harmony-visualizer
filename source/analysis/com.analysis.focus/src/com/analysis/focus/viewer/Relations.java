package com.analysis.focus.viewer;

import java.util.Collections;
import java.util.Comparator;
import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.LinkedList;
import java.util.List;
import java.util.Map;
import java.util.Map.Entry;

public class Relations {

	private Map<String,Integer> relations;
	
	public Relations() {
		relations = new HashMap<>();
	}
	
	public void put(String key, Integer value) {
		relations.put(key, value);
	}
	
	public Map<String,Integer> getValues() {
		List<Entry<String,Integer>> list = new LinkedList<Entry<String,Integer>>(relations.entrySet());
		Collections.sort(list, new Comparator<Entry<String,Integer>>() {

			@Override
			public int compare(Entry<String, Integer> r1, Entry<String, Integer> r2) {
				// Discard entity header ("M" or "D") before sorting by ID
				String k1 = r1.getKey();
				k1 = k1.substring(1, k1.length());
				
				String k2 = r2.getKey();
				k2 = k2.substring(1, k2.length());
				
				return (Integer.valueOf(k1)).compareTo(Integer.valueOf(k2));
			}
		});

		Map<String, Integer> result = new LinkedHashMap<String, Integer>();
		for (Entry<String, Integer> entry : list) {
			result.put(entry.getKey(), entry.getValue());
		}
		return result;
	}
	
}
