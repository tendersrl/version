# Version
### Automatically create git tag about your Laravel app version

[![Latest Version on Packagist](https://img.shields.io/packagist/v/tendersrl/version.svg?style=flat-square)](https://packagist.org/packages/tendersrl/version)
[![Build Status](https://img.shields.io/travis/com/tendersrl/version/master.svg?style=flat-square)](https://travis-ci.com/tendersrl/version)
[![StyleCI](https://github.styleci.io/repos/222470946/shield?branch=master)](https://github.styleci.io/repos/222470946)
[![MIT licensed](https://img.shields.io/github/license/tendersrl/version?style=flat-square)](https://img.shields.io/github/license/tendersrl/version)
[![Total Downloads](https://img.shields.io/packagist/dt/tendersrl/version.svg?style=flat-square)](https://packagist.org/packages/tendersrl/version)

## Description

This package is a Laravel (5.5+) utility which helps you keep and manage your application version, increment version numbers (major, minor, patch, commit), and can also use your last commit hash.

This package is an extension of [https://github.com/antonioribeiro/version](https://github.com/antonioribeiro/version), that let you to create automatically a git tag every time you update your app version.  
Please refer to parent package to extensive documentation.

### Easily increment your version numbers, using Artisan commands

``` bash
php artisan version:minor
```

Which should ask you your commit message

``` bash
$ Enter your commit message
>
```
Then should create a new git tag and should print the new version number

``` bash
New patch: 11
MyApp version 2.6.11 (commit cb2afb64)
```

Available for all of them:

``` bash
$ php artisan version:major   
$ php artisan version:minor   
$ php artisan version:patch   
```

Then you only need to push your commit and your tag:

``` bash
$ git push --tags 
```

### Formating tag

After publishing configuration, entry as ```tag-format``` the format you prefer to tag your commit.

``` yaml
tag-format: tag
```

You can also specify the tag format via the ```--tag-format``` option:

``` bash
$ php artisan version:patch --tag-format=compact
```

### Other available options

If you want to increment your app version without creating a commit or tag, you can use the ```--no-commit``` and ```--no-tag``` options

``` bash
$ php artisan version:patch --no-commit --no-tag
```

## Install

Via Composer

``` bash
$ composer require tendersrl/version
```

Then publish the configuration file you'll have to:

``` bash
$ php artisan vendor:publish --provider="TenderSrl\Version\VersionServiceProvider"
```

And you should be good to use it in your views:

``` php
@version
```


## Minimum requirements

- Laravel 5.5
- PHP 7.0



## License

This package is licensed under the MIT License
