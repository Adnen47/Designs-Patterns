<?php
namespace App;

class Hello
{

    public function sayHello(CacheInterface $cache)
    {
        if($cache->has('hello')) {
            return $cache->get('hello');
        } else {
            sleep(4);
            $content = 'bonjour';
            $cache->set('hello', $content);
            return $content;
        }
    }

}