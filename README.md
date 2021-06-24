# Backbone - Accounting Profile API PHP Client

## Introduction

The Accounting Profile API PHP Client enables you to work with the Accounting Profile API.

This PHP package is generated by an API client generator.

## Prerequisites

- PHP 7.2 or later for production

## Installation

You can use [Composer](https://getcomposer.org/). Follow the [installation instructions](https://getcomposer.org/doc/00-intro.md) if you do not already have composer installed.

~~~~ bash
composer require datenkraft/bb-accounting-profile-api-php-client
~~~~

In your PHP script, make sure you include the autoloader:

~~~~ php
require 'path/to/vendor/autoload.php';
~~~~

## Using the library

The library can be used to communicate with the Accounting Profile Resource Server.
The Client includes functionalities for every endpoint defined in the openapi.json.
The Client also is auto generated with jane-php using an openapi.json file.

### Creating a client

~~~~ php
require 'path/to/vendor/autoload.php';

// Valid clientId, clientSecret and requested scopes
$clientId = '1234';
$clientSecret = 'abcd';
$oAuthScopes = ['accounting-profile:get', 'accounting-profile:post', 'accounting-profile:put', 'accounting-profile:delete'];

$config['clientId'] = $clientId;
$config['clientSecret'] = $clientSecret;
$config['oAuthScopes'] = $oAuthScopes;

$factory = new ClientFactory($config);
$client = Client::createWithFactory($factory);
~~~~

### Example Endpoint: Post Accounting Profile
~~~~ php
$accountingProfile = (new NewAccountingProfile())
            ->setName($this->requestData['name']);

$response = $client->postAccountingProfile($accountingProfile, Client::FETCH_RESPONSE);
$response; // accountingProfile

~~~~

## Licence
This repository is available under the [MIT license](https://opensource.org/licenses/MIT).
