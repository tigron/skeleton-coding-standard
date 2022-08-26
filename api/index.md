# API

## General

To create API's we follow the '[Openapi](https://swagger.io/specification/)' 
specifications. This specification is automatically enforced by using
the 
[skeleton-application-api](https://github.com/tigron/skeleton-application-api)
package.

## casing

Classnames, endpoints and variables should be defined using camelCase. 

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




fix naming 'chanelAccount' ⇒ 'Account'. All other channelAccount* classes should be renamed also.
Order of parameters in URL should follow the class hierarchy
We avoid redundant data in the URL. No more required parameters as needed to identify 1 object
Only uniquely identifiable properties can end up in the URL. All other properties should be passed via GET
ex: /account/{accountId} vs /account/getByEmail?email={email}
A lookup based on a property is always defined as 'getByProperty'
A search based on a (part of a) property is defined as '/search'
classnames should end up in camelcase in the url. ex productType (not /product/type)

