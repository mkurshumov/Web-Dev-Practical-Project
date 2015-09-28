<?php
$cnf['default']['connection_url'] = 'mysql:host=localhost;dbname=shop';
$cnf['default']['username'] = 'qweqwe';
$cnf['default']['pass'] = 'qweqwe';
$cnf['default']['pdo_options'][PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES 'UTF8'";
$cnf['default']['pdo_options'][PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

$cnf['session']['connection_url'] = 'mysql:host=localhost;dbname=session';
$cnf['session']['username'] = 'qweqwe';
$cnf['session']['pass'] = 'qweqwe';
$cnf['session']['pdo_options'][PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES 'UTF8'";
$cnf['session']['pdo_options'][PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;


return $cnf;