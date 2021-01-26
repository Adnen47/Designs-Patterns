<?php
echo '<pre>';

require 'DIC.php';

class Foo{

}

class Bar{

    /**
     * @var Foo
     */
    private $foo;
    /**
     * @var string
     */
    private $name;

    public function __construct($name = "Salut les gens", Foo $foo){

        $this->foo = $foo;
        $this->name = $name;
    }

}

$app = new DIC();

$app->set('Bar', function($app){
    return new Bar("Chien", $app->get('Foo'));
});

var_dump($app->get('Bar'));





echo '</pre>';
