<?php
$cfg['default']['connection_uri'] = 'mysql:host=localhost;dbname=test';
$cfg['default']['username'] = 'root';
$cfg['default']['pass'] = '';
$cfg['default']['pdo_options'][PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES 'UTF8'";
$cfg['default']['pdo_options'][PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

$cfg['session']['connection_url'] = 'mysql:host=localhost;dbname=session';
$cfg['session']['username'] = 'root';
$cfg['session']['pass'] = '';
$cfg['session']['pdo_options'][PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES 'UTF8'";
$cfg['session']['pdo_options'][PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;


return $cfg;