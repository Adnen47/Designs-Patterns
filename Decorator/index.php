<?php
require('vendor/autoload.php');
$hello = new App\Hello();
$hello = new \App\MerciDecorator($hello);
$hello = new \App\CaVaDecorator($hello);
echo $hello->sayHello();