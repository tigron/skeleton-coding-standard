# PHP
## General
We use **1TBS** indentation [https://en.wikipedia.org/wiki/Indentation_style#Variant:_1TBS_(OTBS)](https://en.wikipedia.org/wiki/Indentation_style#Variant:_1TBS_(OTBS)) with **tabs**.

	public function my_function() {
		if (a == b) {
			return true;
		}
	}

**ATTENTION: NO SPACE FOR CODE INDENTATION !!**

## Classes basics
Start PHP files / classes by:

	<?php

do not close the PHP at the end.

Order of elements in the file:

* class variables
* public functions
* private functions
* public static functions
* private static functions

## Various coding rules for readability

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

## Code documentation
Every class starts with a documentation block.

	<?php
	/**
	 * Class name
	 *
	 * Class description
	 *
	 * @author John Doe <john@tigron.be>
	 */

Every function is prepended with a documentation block.

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

function starts directly the line after, no blank line.

Global variables are prepended by a documentation block

	/**
	 * Login required
	 *
	 * @var $login_required
	 */
	protected $login_required = true;