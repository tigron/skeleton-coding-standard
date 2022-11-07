# API

## General

To create API's we follow the '[Openapi](https://swagger.io/specification/)'
specifications. This specification is automatically enforced by using
the
[skeleton-application-api](https://github.com/tigron/skeleton-application-api)
package.

## Casing

Classnames, endpoints and variables should be defined using camelCase.
Classnames should not be split by slashes.

Ex:

    /productType

or

    /product/type

The latter is not allowed, since it could interfer with an action in the
/product endpoint.


## Endpoint parameters

### uniquely identifiable properties

An endpoint can be defined by a 'path' and a 'query'.

    ex: https://my-ip/path?query=test

Only uniquely identifiable properties can end up in the path.

    ex: /account/{accountId} vs /account/getByEmail?email={email}


### Parameters order

API endpoints should resemble a virtual directory. Therefore the hierarchy of
the objects must be respected. Objects higher in the hierarchy should come first
in the endpoint.

    GET /product/{productCategory}/{product}

The product belongs to a category and therefore must be seen as a child of the
productCategory.

### Redundant parameters

If an object can be defined by one of its properties, there should be no
other variable required:

    GET /customer/{customerId}

### Lookups

A lookup based on a property is always defined as 'getByProperty'

    ex GET /customer/getByEmail?email={email}

A search based on a (part of a) property is defined as '/search'

    ex GET /customer/search?term={search}


## Paging

If ever a list of objects is returned that could become too big, paging is
recommended. If paging is enabled, the returned object should have the following
structure:

	{
		"ObjectPager": {
		    "type": "object",
		    "properties": {
		        "items": {
		            "type": "array",
		            "description": "paged objects",
		            "items": {
		                "$ref": "#/components/schemas/PagedObject"
		            }
		        },
		        "meta": {
		            "type": "object",
		            "properties": {
		                "pages": {
		                    "type": "integer",
		                    "description": "Number of pages"
		                },
		                "currentPage": {
		                    "type": "integer",
		                    "description": "Current page"
		                },
		                "itemCount": {
		                    "type": "integer",
		                    "description": "Total amount of objects found"
		                }
		            }
		        }
		    }
		}
	}

The requested page can be selected by passing a '?page=X' GET variable into the
URL.
	

