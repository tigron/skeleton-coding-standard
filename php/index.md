# PHP

## General

### File structure

Start any PHP source file by:

	<?php

Do not use the PHP closing tag at the end of the file.

Order of elements in the file:

* class variables
* public functions
* private functions
* public static functions
* private static functions


### Indentation

We use [**1TBS**](https://en.wikipedia.org/wiki/Indentation_style#Variant:_1TBS_(OTBS)) indentation with **tabs**.

	public function my_function() {
		if ($a == $b) {
			return true;
		}
	}

Never use spaces for indenting code.


## Naming

### Variables

Variables use strict snake case:

	$the_best_variable_ever = 'abcd';


### Classes

Classes use a mix of camel and snake case:

	class Customer_Project {
	}

## Spacing and readability

	$variable = 'a_value';  // OK
	$variable='a_value';    // NOK
	$variable='a_value' ;   // NOK
	
	if ($a == 0) {   // OK
	if ($a==0) {     // NOK
	if ($a == 0){    // NOK
	
	function function_name() {  // OK
	function function_name () { // NOK
	function function_name(){   // NOK
	
	$my_array = [];      // OK
	$my_array = array(); // NOK


## Documenting code

Classes start with a documentation block.

	<?php
	/**
	 * Class name
	 *
	 * Class description
	 *
	 * @author John Doe <john@tigron.be>
	 */

Class variables also have their own documentation block.

	/**
	 * Login required
	 *
	 * @var $login_required
	 */
	protected $login_required = true;

And finally, methods are also preceded by a documentation block. The
implementation of the method starts directly after the documentation
block, do not insert an empty line.

	/**
	 * A description for this method
	 *
	 * Paragraphs are separated by an empty line.
	 *
	 * @access public|private
	 * @param Class_Name $param_name
	 * @return Class_Name
	 */
	 public my_function(Class_Name $param_name) {
	 	return $something;
	 }
