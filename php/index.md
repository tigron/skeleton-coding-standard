# PHP

We follow [PSR-12](https://www.php-fig.org/psr/psr-12/), and by extent
[PSR-1](https://www.php-fig.org/psr/psr-1/), except for what is defined
explicitly in this document.

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


## Classes, Properties, Methods and Functions

### Properties

Properties use strict snake case:

	$the_best_variable_ever = 'abcd';


### Classes

Classes use a mix of camel and snake case:

	class Class_Name extends Parent_Class implements \Some_Interface, \Countable {
		// constants, properties, methods
	}

The `extends` and `implements` keywords and the opening brace must be on the
same line as the class name, except when splitting across multiple lines.

	class Class_Name extends Parent_Class implements
		\Some_Interface,
		\Countable
	{
		// constants, properties, methods
	}

### Methods and Functions

Method and function names must use strict snake case:

	public function foo_bar(string $arg1, int &$arg2, ?int $arg3,  $arg4 = []) {
		// body
	}

The opening brace must be on the same line as the method or function name,
except when the argument list is split across multiple lines.

	public function ver_long_method(
		ClassTypeHint $arg1,
		&$arg2,
		array $arg3 = []
	) {
		// body
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

## Code beauty (by PHP Insights)

### Avoid useless variables

	function my_function() {
		$data = call_to_another_function();
		return $data;
	}

$data is, in this case, a useless variable.  Prefer this:

	function my_function() {
		return call_to_another_function();
	}

### Avoid empty statements

**If blocks**

	if ($a === $b) {
	} else {
		do_something();
	}

avoid the empty statement by

	if ($a !== $b) {
		do_something();
	}

**Empty catch**

	try {
		do_something();
	} catch (Exception $e) {}

Avoid this as much as possible, hiding an exception will always cause an issue one day or another.

### For loop avoid functional calls in test

	for ($i = 0; $i < a_call_to_a_function(); $i++) {

if this would sound a bad idea to older developers who had to optimize code as much as possible when CPUs were not that fast as they are now ... prefer this:

	$count = a_call_to_a_function();
	for ($i = 0; $i < $count; $i++) {

### Disallow equals operators
Never use **==** or **!=** anymore.  Always use **===** or **!==**.

It's not only for PHP Insights that it is not good but also because we are trying to go for completely strict type in variables and that would be a brake to accomplish our goal.

### Increment and decrement operators should be a single operation

PHP Insights prevents the follwing:

	$sheet->setCellValueByColumnAndRow($col++, $row, $something);
	$sheet->setCellValueByColumnAndRow($col++, $row, $something_else);

This writing is also not appreciated by PHP Insig

	$sheet->setCellValueByColumnAndRow($col, $row, $something); $col++;
	$sheet->setCellValueByColumnAndRow($col, $row, $something_else); $col++;
It should be coded that way

	$sheet->setCellValueByColumnAndRow($col, $row, $something);
	$col++;
	$sheet->setCellValueByColumnAndRow($col, $row, $something_else);
	$col+

### No useless else

	if (a_certain_condition) {
		return $something;
	} else {
		return $something_else;
	}

This is prohibited by PHP Insights who requests this:

	if (a_certain_condition) {
		return $something;
	}
	return $something_else;

This is also valid for break, continue, and other operators that stop the current execution.

### One class per file
Do not define extra classes (like i.e. exceptions) in the PHP file of another class.

### Function call argument spacing
Do not write

	call_to_function($a,$b,$c);

But well

	call_to_function($a, $b, $c);

### Lower case type
Parameters types must be lowercase: **object**, **string** instead of ~~Object~~, ~~String~~.

### Trailing array comma
Arrays with multiple lines must have a comma at the end of the last element

	$fruits = [
		'apple',
		'pear',
		'banana',
	];

But, for single line arrays, that is prohibited.

### Alphabetically sorted uses

	use \package\classA
	use \package\classC
	use \package\classB

is not correct, should be

	use \package\classA
	use \package\classB
	use \package\classC

### Binary operator spaces
Even if it is easier to read, this is not correct

	$data[] = [
		'firstname' 	=> 'John',
		'lastname'	=> 'Doe',
		'streetname'	=> 'Wisteria Lane',
		'housenumber'	=> '4352',
		'city'		=> 'Fairview',
	];

The proper way of writing is the following

	$data[] = [
		'firstname' => 'John',
		'lastname' => 'Doe',
		'streetname' => 'Wisteria Lane',
		'housenumber' => '4352',
		'city' => 'Fairview',
	];

### Single quote vs double quotes
When possible, always prefer using single quotes.  Better for performance and code unity.
