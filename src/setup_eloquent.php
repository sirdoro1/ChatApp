<?php

use \Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Container\Container;

date_default_timezone_set('Europe/London');

$container = new Container;
$capsule = new Capsule;

$capsule->addConnection([
	'driver' => 'mysql',
	'host' => 'localhost',
	'database' => 'chatapp',
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
	'collation' => 'utf8_unicode_ci',
	'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

?>
