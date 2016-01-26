<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 4.3.2 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2006 - 2012 EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 2.0
 * @filesource	
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Memcached Caching Class 
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Core
 * @author		ExpressionEngine Dev Team
 * @link
 */

class CI_Cache_memcached extends CI_Driver {

	private $_memcached;	// Holds the memcached object

	protected $_memcache_conf 	= array(
		'default' => array(
			'default_host'		=> '127.0.0.1',
			'default_port'		=> 11211,
			'default_weight'	=> 1,
			//'default_profix'	=> 'xxcrm_'
		)
	);

	// ------------------------------------------------------------------------
	/**
	 * Fetch from cache
	 *
	 * @param 	mixed		unique key id
	 * @return 	mixed		data on success/false on failure
	 */	
	public function get($id)
	{
		$microtime_start = microtime(true);
		$id = $this->_memcache_conf['default']['profix'] . $id;
		//var_dump($id);
		$data = $this->_memcached->get($id);
		//var_dump($id . ':' . (microtime(true) - $microtime_start));
		//var_dump(count($data[0]));
		//return empty($data) ? FALSE : $data;
		return (is_array($data)) ? $data[0] : FALSE;
	}

	// ------------------------------------------------------------------------

	/**
	 * Save
	 *
	 * @param 	string		unique identifier
	 * @param 	mixed		data being cached
	 * @param 	int			time to live
	 * @return 	boolean 	true on success, false on failure
	 */
	public function save($id, $data, $ttl = 60)
	{
		$id = $this->_memcache_conf['default']['profix'] . $id;
		if (get_class($this->_memcached) == 'Memcached')
		{
			return $this->_memcached->set($id, array($data, time(), $ttl), $ttl);
		}
		else if (get_class($this->_memcached) == 'Memcache')
		{
			//return $this->_memcached->set($id, array($data, time(), $ttl), $ttl);
			return $this->_memcached->set($id, array($data, time(), $ttl), 0, $ttl);
		}

		return FALSE;
	}

	/**
	 * 澧炲姞Replace鏂规硶
	 * Replace
	 *
	 * @param   string	  unique identifier
	 * @param   mixed	   data being cached
	 * @param   int		 time to live
	 * @return  boolean	 true on success, false on failure
	 */
	public function replace($id, $data, $ttl = 60)
	{
		$id = $this->_memcache_conf['default']['profix'] . $id;
		if (get_class($this->_memcached) == 'Memcached')
		{
			return $this->_memcached->replace($id, array($data, time(), $ttl), $ttl);
		}
		else if (get_class($this->_memcached) == 'Memcache')
		{
			return $this->_memcached->replace($id, array($data, time(), $ttl), 0, $ttl);
		}
		 
		return FALSE;
	}
	// ------------------------------------------------------------------------
	/**
	 * Delete from Cache
	 *
	 * @param 	mixed		key to be deleted.
	 * @return 	boolean 	true on success, false on failure
	 */
	public function delete($id)
	{
		$id = $this->_memcache_conf['default']['profix'] . $id;
		return $this->_memcached->delete($id);
	}

	// ------------------------------------------------------------------------
	/**
	 * Clean the Cache
	 *
	 * @return 	boolean		false on failure/true on success
	 */
	public function clean()
	{
		return $this->_memcached->flush();
	}

	// ------------------------------------------------------------------------

	/**
	 * Cache Info
	 *
	 * @param 	null		type not supported in memcached
	 * @return 	mixed 		array on success, false on failure
	 */
	public function cache_info($type = NULL)
	{
		return $this->_memcached->getStats();
	}

	public function list_key($type = NULL)
	{
		$all_items = $this->_memcached->getExtendedStats('items');
		$profix = $this->_memcache_conf['default']['profix'];
		$keys = [];
		foreach ($this->_memcache_conf as $cache_server) {
			$servarname = sprintf("%s:%s", $cache_server['hostname'], $cache_server['port']);
			if (isset($all_items[$servarname]['items'])) {
				$items = $all_items[$servarname]['items'];
				foreach ($items as $number => $item) {
					$str = $this->_memcached->getExtendedStats('cachedump', $number, 0);
					//var_dump($str);
					$line = $str[$servarname];
					if (is_array($line) && count($line) > 0){
						foreach ($line as $key => $value) {
							if (substr($key, 0, strlen($profix)) == $profix)
								$keys[] = substr($key, strlen($profix));
						}
					}
				}
			}
		//foreach ($this->_options as $options) {
			/*foreach ($options as $option) {
			aaif (isset($all_items[$option]['items'])) {
					$items = $all_items[$option]['items'];
					foreach ($items as $number => $item) {
						$str = $this->_memcached->getExtendedStats('cachedump', $number, 0);
						$line = $str[$option];
						if (is_array($line) && count($line) > 0){
							foreach ($line as $key => $value) {
								$keys[] = $key;
							}
						}
					}
				}
			}*/
		}
		return array_unique($keys);
	}
	// ------------------------------------------------------------------------
	/**
	 * Get Cache Metadata
	 *
	 * @param 	mixed		key to get cache metadata on
	 * @return 	mixed		FALSE on failure, array on success.
	 */
	public function get_metadata($id)
	{
		$stored = $this->_memcached->get($id);

		if (count($stored) !== 3)
		{
			return FALSE;
		}

		list($data, $time, $ttl) = $stored;

		return array(
			'expire'	=> $time + $ttl,
			'mtime'		=> $time,
			'data'		=> $data
		);
	}

	// ------------------------------------------------------------------------

	/**
	 * Setup memcached.
	 */
	/*private function _setup_memcached()
	{
		// Try to load memcached server info from the config file.
		$CI =& get_instance();
		if ($CI->config->load('memcached', TRUE, TRUE))
		{
			if (is_array($CI->config->config['memcached']))
			{
				$this->_memcache_conf = NULL;

				foreach ($CI->config->config['memcached'] as $name => $conf)
				{
					$this->_memcache_conf[$name] = $conf;
				}
			}
		}
		if (extension_loaded('memcached')){
			$this->_memcached = new Memcached();
		}else{
			$this->_memcached = new Memcache();
		}
		//$this->_memcached = new Memcached();
		foreach ($this->_memcache_conf as $name => $cache_server)
		{
			if ( ! array_key_exists('hostname', $cache_server))
			{
				//$cache_server['hostname'] = $this->_default_options['default_host'];
				$cache_server['hostname'] = $this->_memcache_conf['default']['default_host'];
			}
			if ( ! array_key_exists('port', $cache_server))
			{
				//$cache_server['port'] = $this->_default_options['default_port'];
				$cache_server['port'] = $this->_memcache_conf['default']['default_port'];
			}
			if ( ! array_key_exists('weight', $cache_server))
			{
				//$cache_server['weight'] = $this->_default_options['default_weight'];
				$cache_server['weight'] = $this->_memcache_conf['default']['default_weight'];
			}
			if (extension_loaded('memcached')){
				$this->_memcached->addServer(
					$cache_server['hostname'], $cache_server['port'], $cache_server['weight']
				);
			}else{
				$this->_memcached->addServer($cache_server['hostname'],$cache_server['port'],TRUE, $cache_server['weight']);
			}
			//$this->_memcached->addServer(
			//		$cache_server['hostname'], $cache_server['port'], $cache_server['weight']
			//);
		}

	}
	*/
	private function _setup_memcached()
	{
		// Try to load memcached server info from the config file.
		$CI =& get_instance();
		if ($CI->config->load('memcached', TRUE, TRUE))
		{
			if (is_array($CI->config->config['memcached']))
			{
				$this->_memcache_conf = NULL;
				foreach ($CI->config->config['memcached'] as $name => $conf)
				{
					$this->_memcache_conf[$name] = $conf;
				}
			}
		}
		if(class_exists("Memcached"))
			$this->_memcached = new Memcached();
		else
			$this->_memcached = new Memcache();
		foreach ($this->_memcache_conf as $name => $cache_server)
		{
			if ( ! array_key_exists('hostname', $cache_server))
			{
				//$cache_server['hostname'] = $this->_default_options['default_host'];
				$cache_server['hostname'] = $this->_memcache_conf[$name]['default_host'];
			}
			if ( ! array_key_exists('port', $cache_server))
			{
				//$cache_server['port'] = $this->_default_options['default_port'];
				$cache_server['port'] = $this->_memcache_conf[$name]['default_port'];
			}
			if ( ! array_key_exists('weight', $cache_server))
			{
				//$cache_server['weight'] = $this->_default_options['default_profix'];
				$cache_server['weight'] = $this->_memcache_conf[$name]['default_weight;'];
			}
			if (extension_loaded('Memcached')) {
				$this->_memcached->addServer(
					$cache_server['hostname'], $cache_server['port'], $cache_server['weight']
				);
			} else {
				$this->_memcached->addServer($cache_server['hostname'],$cache_server['port'],TRUE, $cache_server['weight']);
			}

		}
	}
	// ------------------------------------------------------------------------
	/**
	 * Is supported
	 *
	 * Returns FALSE if memcached is not supported on the system.
	 * If it is, we setup the memcached object & return TRUE
	 */
	public function is_supported()
	{
		if ( ! extension_loaded('memcached') && ! extension_loaded('memcache'))
		{
			log_message('error', 'The Memcached Extension must be loaded to use Memcached Cache.');
			return FALSE;
		}

		$this->_setup_memcached();
		return TRUE;
	}

	// ------------------------------------------------------------------------

}
// End Class

/* End of file Cache_memcached.php */
/* Location: ./system/libraries/Cache/drivers/Cache_memcached.php */