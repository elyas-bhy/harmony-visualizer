package com.analysis.focus;


public class Distribution implements Comparable<Distribution> {
	
	// TODO use type + id instead
	private String owner;
	
	private int contributions;
	
	// Proportion of commits by a contributor on a component 
	// relative to his other contributions
	private double qprime; 
	
	// Proportion of commits by a contributor on a component 
	// relative to the total amount of contributions on a given component
	private double rprime;
	
	public Distribution(String owner, int contributions) {
		this.owner = owner;
		this.contributions = contributions;
		this.qprime = 0;
		this.rprime = 0;
	}

	public String getOwner() {
		return owner;
	}

	public void setOwner(String owner) {
		this.owner = owner;
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
		sb.append("[Contributions: " + contributions);
		sb.append(", qprime: " + qprime);
		sb.append(", rprime: " + rprime);
		sb.append("]");
		return sb.toString();
	}

	@Override
	public int compareTo(Distribution d) {
		return owner.compareToIgnoreCase(d.getOwner());
	}
}
