<?php 
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class loader_model extends CI_model {

	public function __construct() {
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
	}

	public function load_system_status()
	{
		$this->config->load('customers');
		$_system_status = $this->config->item('customers');
		return $_system_status;

	}

	public function load_system_trades() {
		$this->db->cache_on();
		$this->db->select('c_tradepath, c_tradename', FALSE);
		$this->db->from('customer_trades');
		$query = $this->db->get();
		$data = $query->result();
		$query->free_result();
		$t = [];
		foreach ($data as $item) {
			$t[$item->c_tradepath] = $item->c_tradename;
		}
		return $t;
	}
	public function load_system_zones() {
		$this->db->cache_on();
		$this->db->select('c_zonepath, c_zonename', FALSE);
		$this->db->from('customer_zones');
		$this->db->where('LEFT(c_zonepath,2)', '33');
		$query = $this->db->get();
		$data = $query->result();
		$query->free_result();
		$z = [];
		foreach ($data as $item) {
			$z[$item->c_zonepath] = $item->c_zonename;
		}
		return $z;
	}
}
/* End of file loader_model.php */
/* Location: ./application/models/loader_model.php */