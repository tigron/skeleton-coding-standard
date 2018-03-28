
# Database model
## Table names
Table customer, role and link table:

	customer      [ id, firstname, lastname ]
	role          [ id, name ]
	customer_role [ id, customer_id, role_id ]
	
Link tables are named with the name of the two tables to link separated by **_**.
Columns used as foreign key to another table are named target_table_name**_id**.

Using this syntax, table names can become long, but they clearly explain what's contained in the table:

* customer_project
* customer_project_application
* customer_project_customer_project_application

Table with master / child model are named as follows:

* table_name
* table_name_item

which gives:

* invoice
* invoice_item

## Columns order
Columns in the table are sorted by meaning for readability:

* **id**: primary key, always first
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

## Deprecation
Deprecated tables / columns are renamed starting with an underscore:

* table: customer --> _customer
* column: middle_name --> _middle_name
