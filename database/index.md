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

### Order of columns

Columns in the table must be sorted by meaning for readability:

* **id**: primary key, auto increment, always first
* foreign keys: customer_id, role_id
* data columns
* timing columns: created, updated, archived

Example of a typical table:

| name | data type |
| --- | --- |
| id | int(11) Auto Increment |
| language_id | int(11) |
| firstname | varchar(128) |
| lastname | varchar(128) |
| created | datetime |
| updated | datetime null |
| archived | datetime null |

### Deprecating tables or columns

If deprecated tables or columns are to be kept temporarily for future
migrations or other reasonable purposes, they must be renamed to start
with an underscore:

* table: `customer` becomes `_customer`
* column: `middle_name` becomes `_middle_name`
