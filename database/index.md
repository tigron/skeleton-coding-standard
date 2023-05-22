# Database

While `skeleton` supports multiple DBMS, it is recommended to use
MySQL. However, developers may choose to use another DBMS supported
by the PHP PDO driver.

## Modelling

### Naming

Table customer, role and link table:

	customer      [ id, firstname, lastname ]
	role          [ id, name ]
	customer_role [ id, customer_id, role_id ]
	
Link tables must be named by taking the name of two referenced tables,
separated by **_**.

Columns referencing another table should use a foreign key and must be
named target_table_name**_id**.

Using this syntax, table names can become long, but they clearly
explain what is contained in the table:

* customer_project
* customer_project_application
* customer_project_customer_project_application

Tables with a parent/child relation must be named as follows:

* table_name
* table_name_item

Example:

* invoice
* invoice_item

### Data types

Data of specific types should use the types suggested in the list below,
or the closest available type. Between brackets is the minumum length
expected.

* id: unsigned integer (11)
* integer: integer (11)
* currency: decimal (10,2)
* string: varying character (255)
* text: text or the largest text type
* boolean: boolean or the smallest integer type

### Order of columns

Columns in the table must be sorted by meaning for readability:

* **id**: primary key, auto increment, always first
* foreign keys: customer_id, role_id
* data columns
* timing columns: created, updated, archived

Example of a typical table:

| name | data type |
| --- | --- |
| id | unsigned integer (11) auto_increment |
| language_id | unsigned integer (11) |
| firstname | varying character (128) |
| lastname | varying character (128) |
| created | datetime |
| updated | datetime null |
| archived | datetime null |

### Deprecating tables or columns

If deprecated tables or columns are to be kept temporarily for future
migrations or other reasonable purposes, they must be renamed to start
with an underscore:

* table: `customer` becomes `_customer`
* column: `middle_name` becomes `_middle_name`
