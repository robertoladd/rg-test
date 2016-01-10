<?php

use Pimple\Container;
use App\Library\ServiceContainer;
use App\Library\LoggerCLI;
use App\Library\Config;

$container = new Container();


$container['config'] = function() {

    return new Config(include(BASE_PATH.'/Config/config.php'));
};

$container['logger'] = function ($c) {

    return new LoggerCLI($c['config']->get('logging'));

};

ServiceContainer::getInstance($container);