<?php
/**
 * Created by IntelliJ IDEA.
 * User: jonathan
 * Date: 28/06/16
 * Time: 10:16
 */
namespace App;

interface CacheInterface
{
    public function get($key);

    public function has($key);

    public function set($key, $value, $expiration = 3600);
}