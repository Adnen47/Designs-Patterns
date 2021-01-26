<?php
namespace App; 

use Doctrine\Common\Cache\Cache;

class DoctrineCacheAdapter implements CacheInterface {

    private $cache;

    public function __construct(Cache $cache)
    {
        $this->cache = $cache; 
    }

    public function get($key)
    {
        return $this->cache->fetch($key);
    }

    public function has($key)
    {
        return $this->cache->contains($key);
    }

    public function set($key, $value, $expiration = 3600)
    {
        return $this->cache->save($key, $value, $expiration); 
    }
}