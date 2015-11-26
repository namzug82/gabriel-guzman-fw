<?php
namespace Fw\Component\Cache;

final class Cache
{
	private $cache;

	public function __construct()
	{
		$this->cache = new \Memcache();
		$this->cache->addServer('localhost', 11211);
	}
	
	public function get($key)
	{
		return $this->cache->get($key);
	}

	public function set($key, $value, $expiration_in_seconds)
	{
		$this->cache->set($key, $value, 0, $expiration_in_seconds);
	}

	public function flush()
	{
		$this->cache->flush();
	}
}