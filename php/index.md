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

## Code validation

When working with gitlab, you can make use of syntax checking (via lint) and code quality checking (via PHP Insights) to validate your code.

### Configuration

Put the .gitlab-ci.yml file into the root of your repository, and the insights.php into the util/bin directory.
You can put the insights.php file wherever you like, but do not forget to adjust the configuration in the .gitlab-ci.yml file accordingly.

The .gitlab-ci.yml defines what should be the minimum score for each category separately. By default, it is set to

* Minimum quality: 37
* Minimum complexity: 15
* Minimum architecture: 52
* Minimum style: 31

These numbers are quite low by default, and can be tailored according to the result of the test. 
If you start with a fresh project, you can start with the options --min-quality=80 --min-complexity=90 --min-architecture=75 --min-style=95.
But in case you want to improve the code quality of an existing (and large) project for which the code need to be optimized quite extensively, 
it might be better to start with lower values, and increase the values step by step.
