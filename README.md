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
```sh
https://api.vashona.com/api1/translator/?x=child&to=sna&from=en&format=json

# This translates 'child' from 'en' to 'sna'.

https://api.vashona.com/api1/translator/?x=mwana&to=en&from=sna&format=json

# This translates 'mwana' from 'sna' to 'en'.
```
