<?php
$s = DIRECTORY_SEPARATOR;

$cfg['admin']['namespace'] = 'Controllers'.$s.'Admin1';

$cfg['administration']['namespace'] = 'Controllers'.$s.'Admin2';
$cfg['administration']['controllers']['index']['to'] = 'test';
$cfg['administration']['controllers']['index']['methods']['new'] = '_new';

$cfg['administration']['controllers']['new']['to'] = 'create';

$cfg['*']['namespace'] = 'Controllers';

return $cfg;