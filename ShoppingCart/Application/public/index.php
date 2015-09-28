<?php
error_reporting(E_ALL ^ E_NOTICE);

use Framework\App;
use Framework\Database\SimpleDb;

include '../../Framework/App.php';

$app = App::getInstance();
$db = new SimpleDb();


$app->run();