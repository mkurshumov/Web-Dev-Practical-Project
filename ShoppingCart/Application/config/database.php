<?php
$cnf['default']['connection_uri'] = 'mysql:host=localhost;dbname=application';
$cnf['default']['username'] = 'root';
$cnf['default']['pass'] = '';
$cnf['default']['pdo_options'][PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES 'UTF8'";
$cnf['default']['pdo_options'][PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

$cnf['session']['connection_url'] = 'mysql:host=localhost;dbname=session';
$cnf['session']['username'] = 'root';
$cnf['session']['pass'] = '';
$cnf['session']['pdo_options'][PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES 'UTF8'";
$cnf['session']['pdo_options'][PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;


return $cnf;