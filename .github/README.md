# About this Package
[![Test](https://github.com/Anteris-Dev/autotask-client/workflows/Test/badge.svg?branch=master)](https://github.com/Anteris-Dev/autotask-client/actions?query=workflow%3ATest)

This package provides a PHP API client for the Autotask REST API. It is strongly typed and it is a wonderful experience to work with these classes in any intelligent IDE with autocompletion.

## To Install

Run `composer require anteris-dev/autotask-client`

### Requirements
- **PHP ^7.4** so it can take full advantage of type casting in PHP.
- **Guzzle ^6.3** so it can make requests against the Autotask API.

# Table of Contents

* [Getting Started](#getting-started)
	* [Client Wrapper](#client-wrapper)
	* [Bypassing the Client Wrapper](#bypassing-the-client-wrapper)
	* [Interacting with an Endpoint](#interacting-with-an-endpoint)
		* [create( $resource )](#create-resource-)
		* [deleteById( int $id )](#deletebyid-int-id-)
		* [findById( int $id )](#findbyid-int-id-)
        * [getEntityFields()](#getentityfields)
        * [getEntityInformation()](#getentityinformation)
        * [getEntityUserDefinedFields()](#getentityuserdefinedfields)
		* [query()](#query)
			* [where()](#where)
			* [orWhere()](#orwhere)
			* [records( int $records )](#records-int-records-)
			* [get()](#get)
			* [paginate()](#paginate)
            * [loop()](#loop)
        * [update()](#update-resource-)
* [Resources](#resources)

# Getting Started

## Client Wrapper
For the purpose of ease, there is a client wrapper that allows you to easily interact with every Autotask service. This can be created as shown below.

```php
<?php

$client = new Anteris\Autotask\Client($apiUser, $apiSecret, $integrationCode, $baseUrl);

```

From here, you can use any service by referencing its class method as shown below. The class wrapper caches each instantiation of the service making it efficient.

* **Note**: Class methods are named the camel case version of their endpoint name (e.g. Contacts is `contacts()`, ContactGroups is `contactGroups()`).

```php
<?php

$client->contacts();

```

To find the base URL for your company, go to [https://webservices.autotask.net/atservicesrest/v1.0/zoneInformation?user={{ apiUser }}](https://webservices.autotask.net/atservicesrest/v1.0/zoneInformation?user=) where `{{ apiUser }}` equals the username of your API user.

## Bypassing the Client Wrapper
If you are only interacting with one or two Autotask endpoints, you may wish to bypass the client wrapper. You can do this as shown below.

```php
<?php

// Note that we are using the HttpClient, not the wrapper Client.
$client = new Anteris\Autotask\HttpClient($apiUser, $apiSecret, $integrationCode, $baseUrl);

$contactEndpoint = new Anteris\Autotask\API\Contacts\ContactService($client);
$ticketEndpoint  = new Anteris\Autotask\API\Tickets\TicketService($client);

```

# Interacting with an Endpoint

There are several methods that exist on each service that help you interact with the endpoint. These are listed below. CRUD operations will throw an exception if there are any problems performing the request.

If an endpoint does not support a certain action (e.g. creating resources) the class will not have the method present. To see if an endpoint supports a method, check out the Autotask API documentation. We left a link in the resources section.

## create( $resource )

Endpoints that allow creation of new items have a `create()` method. This takes an entity. An example of its use may be found below.

```php
<?php

$contact = new Anteris\Autotask\API\Contacts\ContactEntity([
    'id' => 0, // Autotask requires that new entities have an ID of 0
    'companyID' => 123,
    'firstName' => 'New',
    'lastName' => 'User',
    'isActive' => 1,
]);

// This sends the create request
$client->contacts()->create( $contact );

```

## deleteById( int $id )

Endpoints that allow deletion of items have a `deleteById()` method. This takes an integer which should be the ID of the asset in Autotask. An example of its use may be found below.

```php
<?php

$client->contacts()->deleteById(1);

```

## findById( int $id )

Endpoints that can be queried have a `findById()` method. This takes an integer which should be the ID of the asset in Autotask. An example of its use may be found below.

```php
<?php

// Looks finds a contact with the ID of 1.
// Alternatively use $contactEndpoint->findById(1);
$contact = $client->contacts()->findById(1);

// This returns an object with all the properties of a contact
echo $contact->firstName;

```

## getEntityFields()

All endpoints can have basic metadata queried. This method returns a specification of what fields the resource has and what their data types are. For more information we recommend taking a look at the [Autotask documentation](https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/API_Calls/REST_Resource_Child_Access_URLs.htm).

## getEntityInformation()

All endpoints can have basic metadata queried. This method returns a specification of what actions the resource has available (create, update, delete, etc.). For more information we recommend taking a look at the [Autotask documentation](https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/API_Calls/REST_Resource_Child_Access_URLs.htm).

## getEntityUserDefinedFields()

All endpoints can have basic metadata queried. If the resource supports User Defined Fields, this method returns a specification of what user defined fields the resource has and their data types. For more information we recommend taking a look at the [Autotask documentation](https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/API_Calls/REST_Resource_Child_Access_URLs.htm).

## query()

Endpoints that can be queried have a `query()` method. This returns a query builder that has several options. These and examples of its use may be found below.

### where()

This method adds a where filter to the query. You may pass a comparison to it or a callback to create a sub-query.  Multiple where statements may be chained. For example:

```php
<?php

// Basic Comparison
$client->contacts()->query()->where('firstName', 'eq', 'Foo');

// Make sure the field exists
$client->contacts()->query()->where('emailAddress', 'exist'); // OR notexist

// Make a sub-query (these are grouped with the AND conjunction by default)
// This query means: firstName equals Foo AND emailAddress exists
$client->contacts()->query()->where(function ($q) {
    return $q->where('firstName', 'eq', 'Foo')
             ->where('emailAddress', 'exist');
});

```

Full options for the `where()` method are as shown below:

`where( $field, $operator = null, $value = null, $udf = false, $conjuction = 'AND' )`

### orWhere()

This method acts as the `where()` method above, but uses an OR conjunction. Example below.

```php
<?php

// Make a sub-query (these are grouped with the OR conjunction by default)
// This query means: firstName equals Foo OR emailAddress exists
$client->contacts()->query()->orWhere(function ($q) {
    return $q->where('firstName', 'eq', 'Foo')
             ->where('emailAddress', 'exist');
});

```

Full options for the `orWhere()` method are shown below:

`orWhere( $field, $operator = null, $value = null, $udf = false )`

The method returns the following call:

`$this->where($field,  $operator,  $value,  $udf,  'OR');`

### records( int $records )

This method limits the number of records that Autotask returns. The integer passed must be between 1 and 500. Example below.

```php
<?php

$client->contacts()->query()->records(20);

```

### count()

Once you have defined all your filters, you may run this method to see how many records making the request would return. This may be helpful for planning out pagination, etc. Example below.

```php
<?php

// This returns an integer specifying how many records will be returned
$result = $client->contacts()->query()->where('firstName', 'contains', 'Foo')->count();

if ($result > 0) {
    echo 'Records exist!';
}

```

### get()

Once you have defined all your filters, you may run this method to make the request against the Autotask API and return a collection of items containing the result. Example below.

```php
<?php

$result = $client->contacts()->query()->where('firstName', 'contains', 'Foo')->get();

foreach ($result as $contact) {
    echo $contact->firstName . PHP_EOL;
}

```

### paginate()

The `get()` method is great, but what if I have over 500 results? What if I want to page the results? We have you covered! Use the `paginate()` method to return a Paginator object with helper properties and methods. These are explained below.

#### collection

When using a paginator object, you reference the collection with this property.

#### hasNextPage()

This returns true if a next page exists. If it does not, it returns false.

#### hasPrevPage()

This returns true if a previous page exists. If it does not, it returns false.

#### nextPage()

This attempts to retrieve the next page and returns it.

#### prevPage()

This attempts to retrieve the previous page and returns it.

Let's take a look at an example of these helper methods in action.

```php
<?php

// Let's get the first page
$page = $client->contacts()->query()->where('firstName', 'exist')->paginate();

// We are going to do this until we run out of pages
while(true) {
    // For every contact, print their name and a new line
    foreach ($page->collection as $contact) {
        echo $contact->firstName . PHP_EOL;
    }

    // If a next page doesn't exist, stop the loop
    if(! $page->hasNextPage() ) {
        break;
    }

    // Otherwise retrieve the next page and do it again!
    $page = $page->nextPage();
}

```

### loop()
Instead of iterating over all the records in Autotask via the `paginate()` method, you can very easily do this with the loop method. This method takes a callback function which will be executed for every record in Autotask that meets the criteria.

- **Note**: The records iterated over here could be greater than 500, which is the Autotask return limit. Just be mindful of throttling.

Example:

```php

use Anteris\Autotask\API\Contacts\ContactEntity;

$query = $client->contacts()->query()->where('id', 'exist');

// Get all the contacts from Autotask and echo their name
$query->loop(function (ContactEntity $contact) {

    echo $contact->firstName . PHP_EOL;

});

```

## update( $resource )

Endpoints that allow updating of items have an `update()` method. This takes an entity. An example of its use may be found below.

* **Note:** Currently the update method uses a `PUT` request to perform the updates. As a result of this, you probably want to retrieve the record and then make changes to submit (this is shown below). We are working on a `PATCH` alternative for future releases.

```php
<?php

$contact = $client->contacts()->findById(1);

$contact->firstName = 'Something';
$contact->lastName  = 'Different';

$client->contacts()->update( $contact );

```

# Resources

* [Autotask API Docs](https://ww14.autotask.net/help/DeveloperHelp/Content/AdminSetup/2ExtensionsIntegrations/APIs/REST/General_Topics/Intro_REST_API.htm)
* [Autotask Soap API Client](https://github.com/opendns/autotask-php)
