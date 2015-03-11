<?php
namespace core;

/**
 * Cache handling of key/value pairs
 *
 * @author Zechariah Walden<zech @ zewadesign.com>
 */
class Cache
{
    /**
     * @var mixed
     * @access private
     */
    private $memcached;

    /**
     * @param $host
     * @param $port
     */
    public function __construct($host, $port) {

        if($this->memcached = new \Memcached()) {

            $this->memcached->addServer($host, $port);

        }

    }

    /**
     * Get value from the cache
     *
     * @access public
     * @param  string $key
     * @return mixed
     */
    public function get($key)
    {

        if($result = $this->cache->get($key)) {

            return $result;

        }


        return false;
    }

    /**
     * Set cache value by cache key
     *
     * @access public
     *
     * @param string $key
     * @param mixed $value
     * @param int $time
     * @param boolean $replace
     *
     * @throws \Exception when key is set and replace is false.
     */
    public function set($key, $value, $time = 3600, $replace = true)
    {

        if ($this->memcached->get($key) && $replace === false) {
            throw new \Exception($key . ' already set. Use replace method.');
        }

        $this->memcached->set($key, $value, $time);

    }

    /**
     * Remove key/value pair from cache
     *
     * @access public
     * @param string $key
     */
    public function remove($key)
    {
        $this->memcached->delete($key);
    }

}
