<?php
namespace App;

class MerciDecorator implements HelloInterface{

    private $hello;

    public function __construct(HelloInterface $hello)
    {
        $this->hello = $hello;
    }

    public function sayHello () {
        return $this->hello->sayHello() . '. Merci';
    }

    public function sayGoodbye() {

    }

}