# PHPDI

## Welcome to the PHPDI project.
----------------------------------

Hi, :smiley: :wave:

This is a minimalistic PHP project with the aim to provide a simple but powerful solution to anyone that thinks **Dependency Injection** (DI) is something useful.

*PHPDI* is a DI container, allowing you to control your dependencies throughout your whole project. I won't explain here what DI and containers are in detail. For more information, you can visit this site :point_right: [HERE](https://en.wikipedia.org/wiki/Dependency_injectionttps://www.google.com)

 - [PHPDI](#phpdi)
    - [Welcome to the PHPDI project](#welcome-to-the-phpdi-project)
    - [So, now about the project](#so-now-about-the-project)
    - [**PHPDI_v1.1**](#phpdiv11)
        - [Config:](#config)
        - [Advantages](#advantages)
            - [No more endless `required_once`](#no-more-endless-requiredonce)
            - [Scope Check](#scope-check)
            - [Logger options](#logger-options)
            - [Exception Logger options](#exception-logger-options)
            - [Follow the best desgin principles](#follow-the-best-desgin-principles)
        - [How to use](#how-to-use)
    - [**PHPDI_v1.2**](#phpdiv12)
    - [Conclusion](#conclusion)


## So, now about the project
------------------------------

The whole design behind the realisation is *Convention over Configuration*. That doesn't mean that you won't need to make some tweeks and adjustments, but you won't need to do anything special.

**Currently there are two versions of the project: This is the official second version. The second version contains everything from the first one.**

**Version one will not be maintained anymore.**

*Beta* state means, that everything tested so far works, but that there might be some small bugs.

*Alpha* state means, that it is still in phase of testing and might be unstable, but that you can always give it a try and report issues, bugs, and missing features.

## **PHPDI** [![Build Status](https://travis-ci.org/IvanGrigorov/PHPDI.svg?branch=master)](https://travis-ci.org/IvanGrigorov/PHPDI) ![(https://img.shields.io/badge/coverage-14%25-orange)](https://img.shields.io/badge/coverage-14%25-orange)  ![(https://img.shields.io/badge/version-stable-green)](https://img.shields.io/badge/version-stable-green)

### Config:

| Config options | Description | Object type (Injection)
| ------------- | ------------ |:-------------:|
| className      | Name of the class to inject | Object, with parameterless constructor  |
| isSingleton      | Creates singleton object | Object, with parameterless constructor      |

![Parameterless Injection](./doc/parameterless.png "Parameterless Injection")


| Config options | Description | Object type (Injection)
| ------------- | ------------ |:-------------:|
| name      | Name of the value  | Value type object  |
| type      | Type of the object (string, int and so on) | Value type object      |
| value      | Value, desired to be returned  | Value type object    |

![Valuetype Injection](./doc/valuetype.png "Valuetype Injection")

| Config options | Description | Object type (Injection)
| ------------- | ------------ |:-------------:|
| className      | Name of the class to inject   |  Object, with  constructor with parameters  |
| isSingleton      | Creates singleton object |  Object, with  constructor   with parameters    |
| params | The params for constructor |   Object, with  constructor   with parameters   |

![Injection with params](./doc/params.png "Injection with params")

In the params, the root node is the name of parameter in the constructor and in it the defaulValue.

***IMPORTANT:*** **The config currently does not allow the use of reference type parameters when calling an injection. To get a reference type object when calling a dependency, you should use the container in the constructor in the class of the dependency and set its properties with the injected objects there.**

See the examples in the project.

### Advantages

#### No more endless `required_once`

There is an AutoLoader, which loads the classes automatically *just* when needed. Just specify the path in the `LoaderConfig.php` file once.

#### Easy change between service (injection) providers

You can easily switch between different configured injection configurations for development, testing, and production.

#### Scope Check

Be sure that only allowed classes can create instances and use object dependencies.

#### Logger options

Option to log all injections - Which examples are used and where.

#### Exception Logger options

Option to log some catched exceptions - Which examples are used and where.


#### Follow the best desgin principles

Option to check whether all injections have an interface inherited by them.

All these things, can be modified in the Config.php

#### Lazy Instantiation

Initially creates a proxy object which loads the whole object only when used.

#### Easier configs

The injection configs are now exported to json files, which makes working with different ones very easy.

### How to use

**composer require ivangrigorov/php-simple-dicontainer**

**Before use, you can delete the doc folder, `index.php`, `IURLParser.php`, and `URLParser.php` (which are used only for the tests).**
**Update the config dependencies json file.**

1. In your composer.json file add `"autoload": {
        "classmap": ["vendor/ivangrigorov/php-simple-dicontainer/DI/Lib/"]
    }`
2. Run `composer update` command
3. In your initial file add `require __DIR__."/vendor/autoload.php";
`
3. Get instance of the container (static method)
4. Call the requested method with the correct parameters. (To get reference type object pass the className with the "I" prefix -> IclassName).
    3.1. Example for parameter for getInjectionWithParams method - `["params" => array(["name" => "url"])]);`
    If "value" is not given, the default from the config is used.

## Conclusion

If you've read everything up to this point, congratulations :clap: and thank you for your interest :thumbsup:

The license for this is open source and free to use. I will appreciate a star or a good word if you think it deserves it.

You can raise issues and report problems or missing features. You can help with ideas and solutions too.

For contact - ivangrigorov9 at gmail.com
