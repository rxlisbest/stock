<?php 
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class goods_model extends CI_model {

	public function __construct() {
		parent::__construct();
		$this->db = $this->load->database('default',TRUE);
		$this->tablename = "goods";
	}

	public function get_list($arr=array())
	{
		$this->db->from($this->tablename);
		if(isset($arr["where"]))
			$this->db->where($arr["where"], "", FALSE);
		if(isset($arr["like"]))
			$this->db->like($arr["like"], "", FALSE);
		$query = $this->db->get();
		$data = $query->result();
		$query->free_result();
		return $data;
	}

	public function get_count($arr=array())
	{
		$this->db->from($this->tablename);
		if(isset($arr["where"]))
			$this->db->where($arr["where"], "", FALSE);
		if(isset($arr["like"]))
			$this->db->like($arr["like"], "", FALSE);
		if(isset($arr["where_in"])){
			foreach ($arr["where_in"] as $key => $value) {
				$this->db->where_in($key, $value);
			}
		}

		$query = $this->db->get();
		$data = $query->num_rows();
		$query->free_result();
		return $data;
	}

	public function get_info($arr=array())
	{
		$this->db->from($this->tablename);
		if(isset($arr["where"]))
			$this->db->where($arr["where"]);
		if(isset($arr["like"]))
			$this->db->like($arr["like"]);
		$query = $this->db->get();
		$data = $query->row();
		$query->free_result();
		return $data;
	}

    public function add($post){

    	return $this->db->insert($this->tablename,$post);
    }

    public function edit($id,$post){
    	$this->db->where('id',$id);
    	return $this->db->update($this->tablename,$post);
    }

    public function delete($id){

    	$this->db->where('id',$id);
    	return $this->db->delete($this->tablename);
    }
}
/* End of file user_model.php */
/* Location: ./application/models/user_model.php */