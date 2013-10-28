<?php

require(__DIR__.'/../vendor/autoload.php');
require(__DIR__.'/../config/config.php');

$app = new DTL\GhProc\GhProc($config);
$app->run();
