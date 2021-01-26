<?php
namespace App;

class Hello implements HelloInterface
{

    public function sayHello () {
        return 'Bonjour'; 
    }

}