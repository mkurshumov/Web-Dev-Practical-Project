<?php
error_reporting(E_ALL ^ E_NOTICE);

use Framework\App;
include '../../Framework/App.php';

$app = App::getInstance();

$db = new \Framework\Database\SimpleDb();
$a = $db->prepare('SELECT * FROM users')->execute()->fetchAllAssoc();
print_r($a);

$app->run();