package com.analysis.focus;

public class Focus {
	
	// Proportion of commits by a contributor on a component 
	// relative to his other contributions
	private double qprime; 
	
	// Proportion of commits by a contributor on a component 
	// relative to the total amount of contributions on a given component
	private double rprime;
	
	public Focus() {
		
	}

	public String toString() {
		return "[" + qprime + ", " + rprime + "]";
	}
}
