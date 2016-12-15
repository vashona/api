# VaShona API
![](http://vashona.com/favicon.ico)

This library provides you with easy access to VaShona's API using PHP. Before you can do some tests you need to obtain a user from http://vashona.com/contacts

### Tech

The API uses a Basic Auth to authenticate users:

### Examples

The API requires [Guzzle](https://github.com/guzzle/guzzle) v6.2+ to run.

Download and extract the [latest pre-built release](https://github.com/vashona/api/).

It is recommended that you install via composer.

```sh
$ composer require vashona/api
```
#### API
```php

// Translate 'child' from 'English' to 'Shona'.

use vashona\api\TranslatorApi;

$TranslatorApi = new TranslatorApi ();
$TranslatorApi->setServerUrl('https://api.vashona.com/api1/translator/');
$TranslatorApi->setAuth('Username', 'password');
$json = $TranslatorApi->getTranslation('child', 'sna', 'en');

```
