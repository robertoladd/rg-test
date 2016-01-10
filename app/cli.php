<?php

namespace App;

use App\Library\ServiceContainer;
use App\Library\CLI;

require_once __DIR__.'/bootstrap.php';

/** @var $argv */


/** @var Container $container $cli */

$cli = new CLI(ServiceContainer::getInstance()->get('logger'));

$cli->runTask($argv);
