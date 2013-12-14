package com.analysis.focus;

import java.util.HashMap;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;

@Entity
public class Contributor {

	@Id
	@GeneratedValue
	private int id;
	
	private String authorId;
	private double daf;
	private int contributions;
	private HashMap<Integer,Focus> focus; // key: componentId
	
	public Contributor() {
		focus = new HashMap<>();
	}
	
	public Contributor(String authorId) {
		this();
		this.authorId = authorId;
	}

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public String getAuthorId() {
		return authorId;
	}

	public void setAuthorId(String authorId) {
		this.authorId = authorId;
	}

	public double getDaf() {
		return daf;
	}

	public void setDaf(double daf) {
		this.daf = daf;
	}

	public int getContributions() {
		return contributions;
	}

	public void setContributions(int contributions) {
		this.contributions = contributions;
	}

	public HashMap<Integer, Focus> getFocus() {
		return focus;
	}

	public void setFocus(HashMap<Integer, Focus> focus) {
		this.focus = focus;
	}
	
	public void addComponent(Integer componentId) {
		focus.put(componentId, new Focus());
	}
	
	public String toString() {
		StringBuilder sb = new StringBuilder();
		sb.append(getClass().getSimpleName());
		sb.append("[Contributions: " + contributions);
		sb.append(", focus: " + focus.values().toString());
		sb.append("]");
		return sb.toString();
	}
	
}
