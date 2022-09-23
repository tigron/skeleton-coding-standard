# General specifications

* The character encoding for all source code is UTF-8
* Unix line endings (U+000A)
* No [Byte Order Mark](https://en.wikipedia.org/wiki/Byte_order_mark) (BOM)
* Indentation is done with tabs

# Data

## Naming

### Slugs

[Slugs](https://en.wikipedia.org/wiki/Clean_URL#Slug) are human-readable strings
which uniquely identify a resource. Slugs can be generated automatically, based
on other properties of said resource. Slugs may not be used within the code to
reference resources, see "Identifiers".

Slugs must only contain lowercase alphanumericals and hyphens.

### Identifiers

Identifiers are meaningful, human-readable strings which uniquely identify an
object. Identifiers are immutable. These identifiers must be used elsewhere in
the code to reference these objects, instead of numberical IDs.

Identifiers must only contain lowercase alphanumericals and underscores.

## Terminology

### Path, directory or dir

Unless circumstances are such that they require an exception, "path" is the
preferred term.

### Create and update objects via modal
Unless circumstances are such that they require an exception, "modal.add.twig" and "modal.edit.twig"
are the preferred filenames for modals to create and update objects. 
