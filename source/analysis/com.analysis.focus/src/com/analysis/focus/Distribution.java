package com.analysis.focus;

import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;

@Entity
public class Distribution {
	
	@Id
	@GeneratedValue
	private int id;
	
	private String contributorId;
	private String componentId;
	
	private int contributions;
	
	// Proportion of commits by a contributor on a component 
	// relative to his other contributions
	private double qprime; 
	
	// Proportion of commits by a contributor on a component 
	// relative to the total amount of contributions on a given component
	private double rprime;
	
	public Distribution() {
		
	}
	
	public Distribution(String contributorId, String componentId) {
		this.contributorId = contributorId;
		this.componentId = componentId;
	}

	public int getContributions() {
		return contributions;
	}

	public void setContributions(int contributions) {
		this.contributions = contributions;
	}

	public double getQprime() {
		return qprime;
	}

	public void setQprime(double qprime) {
		this.qprime = qprime;
	}

	public double getRprime() {
		return rprime;
	}

	public void setRprime(double rprime) {
		this.rprime = rprime;
	}

	public String toString() {
		StringBuilder sb = new StringBuilder();
		sb.append(getClass().getSimpleName());
		sb.append("[ID: " + id);
		sb.append(", contributorId: " + contributorId);
		sb.append(", componentId: " + componentId);
		sb.append(", qprime: " + qprime);
		sb.append(", rprime: " + rprime);
		sb.append("]");
		return sb.toString();
	}
}
