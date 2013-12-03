Redexperts Errbit Bundle
======================

[![Build Status](https://travis-ci.org/Redexperts/RedexpertsErrbitBundle.png?branch=master)](https://travis-ci.org/Redexperts/RedexpertsErrbitBundle)

This bundle integrates [errbit](https://github.com/errbit/errbit) and [errbitPHP] (https://github.com/emgiezet/errbitPHP) client with Symfony 2 by kernel.exception event listener.


## Installation

Add RedexpertsErrbitBundle in your composer.json:

```js
{
    "require": {
        "redexperts/errbit-bundle": "dev-master"
    }
}
```

Download the bundle by running the command:

``` bash
$ php composer.phar update redexperts/errbit-bundle
```

Enable the bundle in the kernel:

``` php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new Redexperts\ErrbitBundle\RedexpertsErrbitBundle(),
    );
}
```
## Configuration

Configure bundle in your /app/config.yml file:

```yaml
# /app/config.yml
redexperts_errbit:
    errbit:
        errbit_enable_log: true #default true - enable or disable errbit loggining
        api_key:           API_KEY #errbit API KEY
        host:              HOST #errbit host
        port:              PORT # default 80
        environment_name:  ENVIRONMENT_NAME #default local - can be test,prod etc.
        skipped_exceptions:  [] #list of skipped exceptions which you do not need to log by errbit
```

That's it
