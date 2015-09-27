<?php
$s = DIRECTORY_SEPARATOR;

$cnf['admin']['namespace'] = 'Controllers'.$s.'Admin1';

$cnf['administration']['namespace'] = 'Controllers'.$s.'Admin2';
$cnf['administration']['controllers']['index'] = 'test';
$cnf['administration']['controllers']['new'] = 'create';

$cnf['*']['namespace'] = 'Controllers';

return $cnf;