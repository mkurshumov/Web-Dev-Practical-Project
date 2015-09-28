<?php
error_reporting(E_ALL ^ E_NOTICE);

use Framework\App;
include '../../Framework/App.php';

$app = App::getInstance();


$app->run();