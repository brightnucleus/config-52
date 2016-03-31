# Bright Nucleus Config 5.2

Config component that does not use namespaces, to be used in PHP 5.2 projects.

[![Latest Stable Version](https://poser.pugx.org/brightnucleus/config-52/v/stable)](https://packagist.org/packages/brightnucleus/config-52)
[![Total Downloads](https://poser.pugx.org/brightnucleus/config-52/downloads)](https://packagist.org/packages/brightnucleus/config-52)
[![Latest Unstable Version](https://poser.pugx.org/brightnucleus/config-52/v/unstable)](https://packagist.org/packages/brightnucleus/config-52)
[![License](https://poser.pugx.org/brightnucleus/config-52/license)](https://packagist.org/packages/brightnucleus/config-52)

## Table Of Contents

* [Introduction](#introduction)
* [Installation](#installation)
* [Basic Usage](#basic-usage)
* [Contributing](#contributing)
* [License](#license)

## Introduction

Bright Nucleus Config 5.2 is a Config component similar to [brightnucleus/config](https://github.com/brightnucleus/config), but it does not use PHP namespaces, so that it can be used in projects that need to work on PHP 5.2.

As it uses Composer, it will need PHP 5.3.2+ to use during development. However, there's a PHP 5.2 autoloader file that is generated, so that you only need PHP 5.2+ at runtime.

This is a very reduced form of a Config component, though, and is meant to provide a very basic way for PHP 5.2 libraries to read existing config files. There's no default values, no validation, no fancy convenience functions.

## Installation

To include the library in your project, you can use Composer:

```BASH
composer require brightnucleus/config-52
```

Alternatively, you can copy the classes inside of your application and make sure that your application can find them.

## Basic Usage

To use the component within your project, you should first load the 5.2 autoloader:

```PHP
require dirname(__FILE__) . '/vendor/autoload_52.php';
```

Here's an example of how to use the class once it's been loaded:

```PHP
<?php

use BrightNucleus_ConfigInterface as ConfigInterface;
use BrightNucleus_Config          as Config;

class WorldGreeter {

    /** @var  @var ConfigInterface */
    protected $config;

    public function __construct(ConfigInterface $config) {
        $this->config = $config;
    }

    public function greet() {
        $hello = $this->config->getKey('hello');
        $world = $this->config->getKey('world');
        echo "$hello $world";
    }
}

$config_file = dirname(__FILE__) . '/config/greetings.php';
$config      = new Config(include($config_file));

$worldGreeter = new WorldGreeter($config);
$worldGreeter->greet();
```

## Contributing

All feedback / bug reports / pull requests are welcome.

## License

This code is released under the MIT license. For the full copyright and license information, please view the LICENSE file distributed with this source code.
