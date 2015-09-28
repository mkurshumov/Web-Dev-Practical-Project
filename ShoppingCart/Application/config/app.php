<?php
$cfg['default_controller'] = 'Index';
$cfg['default_method'] = 'index';
$cfg['namespaces']['Controllers'] = 'D:\XAMPP\xampp\htdocs\ShoppingCart\Application\controllers';

$cfg['session']['autostart'] = true;
$cfg['session']['type'] = 'database';
$cfg['session']['name'] = '__sess';
$cfg['session']['lifetime'] = 3600;
$cfg['session']['path'] = '/';
$cfg['session']['domain'] = '';
$cfg['session']['secure'] = false;
$cfg['session']['dbConnection'] = 'default';
$cfg['session']['dbTable'] = 'sessions';

return $cfg;