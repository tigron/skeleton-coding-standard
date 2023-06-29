<?php

require_once dirname(__FILE__) . '/../../lib/base/Bootstrap.php';

use Skeleton\Database\Database;

Bootstrap::boot();

$tables = [
	'table1',
	'table2',
];
foreach ($tables as $table) {
	generate_queries($table);
}


function generate_queries($table) {
	$db = Database::get();

	$data = [
		'database' => 'olt',
		'table' => $table,
		'column' => 'id',
	];

	$rows = $db->get_all("	SELECT information_schema.KEY_COLUMN_USAGE.TABLE_NAME, information_schema.KEY_COLUMN_USAGE.COLUMN_NAME, information_schema.KEY_COLUMN_USAGE.REFERENCED_TABLE_NAME, information_schema.KEY_COLUMN_USAGE.REFERENCED_COLUMN_NAME, information_schema.KEY_COLUMN_USAGE.CONSTRAINT_NAME, IS_NULLABLE
							FROM information_schema.KEY_COLUMN_USAGE
							INNER JOIN information_schema.COLUMNS ON information_schema.COLUMNS.TABLE_SCHEMA = information_schema.KEY_COLUMN_USAGE.TABLE_SCHEMA AND information_schema.COLUMNS.TABLE_NAME = information_schema.KEY_COLUMN_USAGE.TABLE_NAME AND information_schema.COLUMNS.COLUMN_NAME = information_schema.KEY_COLUMN_USAGE.COLUMN_NAME
							WHERE 1
							AND CONSTRAINT_SCHEMA = ?
							AND REFERENCED_TABLE_NAME = ?
							AND REFERENCED_COLUMN_NAME = ?", $data);

	// dropping existing foreign keys towards the table we want to modify
	foreach ($rows as $row) {
		printf("ALTER TABLE `%s` DROP FOREIGN KEY `%s`;\n", $row['TABLE_NAME'], $row['CONSTRAINT_NAME']);
	}

	// changing type of column
	printf("ALTER TABLE `%s` CHANGE `%s` `%s` int(11) unsigned NOT NULL AUTO_INCREMENT FIRST;\n", $data['table'], $data['column'], $data['column']);

	// recreating foreign keys that were removed before
	foreach ($rows as $row) {
		if ($row['IS_NULLABLE'] === 'YES') {
			$null = 'NULL';
		} else {
			$null = 'NOT NULL';
		}
		printf("ALTER TABLE `%s` CHANGE `%s` `%s` int(11) unsigned %s, ADD FOREIGN KEY (`%s`) REFERENCES `%s` (`%s`);\n", $row['TABLE_NAME'], $row['COLUMN_NAME'], $row['COLUMN_NAME'], $null, $row['COLUMN_NAME'], $row['REFERENCED_TABLE_NAME'], $row['REFERENCED_COLUMN_NAME']);
	}
}
