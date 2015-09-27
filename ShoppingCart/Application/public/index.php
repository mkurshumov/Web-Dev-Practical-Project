<?php

use Framework\App;
use Framework\Config;

include '../../Framework/App.php';

$app = App::getInstance();

$config = Config::getInstance();
$config->setConfigFolder('../config');

$app->run();