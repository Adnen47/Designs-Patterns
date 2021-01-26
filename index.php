<?php
require('vendor/autoload.php');
// $cache = new \App\Cache();
$cache = new \Doctrine\Common\Cache\FilesystemCache(__DIR__ . '/cache');
$adapter = new \App\DoctrineCacheAdapter($cache);
$hello = new App\Hello();
echo $hello->sayHello($adapter);