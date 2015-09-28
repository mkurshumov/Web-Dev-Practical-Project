<?php
$s = DIRECTORY_SEPARATOR;

$cnf['admin']['namespace'] = 'Controllers'.$s.'Admin1';

$cnf['administration']['namespace'] = 'Controllers'.$s.'Admin2';
$cnf['administration']['controllers']['index']['to'] = 'test';
$cnf['administration']['controllers']['index']['methods']['new'] = '_new';

$cnf['administration']['controllers']['new']['to'] = 'create';

$cnf['*']['namespace'] = 'Controllers';

return $cnf;