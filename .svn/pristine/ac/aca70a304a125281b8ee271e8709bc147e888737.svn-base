<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer extends MY_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library('session');
		$this->load->model("customer_model");
		$this->load->helper('url');
		$this->load->helper('form');
		if(!$this->session->userdata("islogin"))
			redirect("/login");
	}

	public function index()
	{	
		$post = $this->input->post();

		//var_dump($this->cache->memcached->get('system_zones'));
		if(isset($post["c_status"]))
			$arr["where"]["c_status"] = $post["c_status"]; 
		if(isset($post["c_name"]))
			$arr["like"]["c_name"] = $post["c_name"]; 

		$arr["where"]["c_add_userid"] = $this->session->userdata('id');
		$arr["where"]["c_status<>"] = 3; 
		$data["customers"] = $this->customer_model->get_list($arr);
		$data["customer_zones"] = $this->system_zones;
		$data["customer_trades"] = $this->system_trades;

		$this->config->load('customers');
		$data["customers_config"] = $this->config->item("customers");
		$data["search"] = $post;

		$data["message"] = $this->session->flashdata('message') ?: "";
		$content = $this->load->view("customer/customer_list_view", $data, true);
		$this->show_iframe($content);
	}

	public function add(){
		$data["customer_trades"] = $this->system_trades;
		$data["customer_zones"] = $this->system_zones;
		$data["city"] = $this->_getCity();
		$data["county"] = $this->_getCounty();

		$data["customers_config"] = $this->config->item("customers");
		$data["message"] = $this->session->flashdata('message') ?: "";
		$data["post"] = $this->session->flashdata('post') ?: "";

		$content = $this->load->view("customer/customer_add_view", $data, true);
		$this->show_iframe($content);
	}

	public function add_save(){
		$post = $this->input->post();
		$this->session->set_flashdata('post', $post);
		if(!$post["c_name"] OR !$post["c_address"] OR !$post["area"]){
			$this->session->set_flashdata('message', '<font color="red">必填项不能为空!</font>');
			redirect("/customer/add");
		}

		if(!$this->_getProtectNumberCheck() && !$post['c_status']){
			$this->session->set_flashdata('message', '<font color="red">保护客户数量己达到限制数量,不能继续报备!</font>');
			redirect("/customer/add");
		}
		$post["c_zonepath"] = $post["area"];
		unset($post["city"]);
		unset($post["area"]);

		if(isset($post['c_status']) && !$post['c_status'])
			$post["c_status"] = 0;
		else
			$post["c_status"] = 5;
		$post["c_createtime"] = date("Y-m-d H:i:s");
		$post["c_add_userid"] = $this->session->userdata("id");
		if($this->customer_model->add($post)){
			$this->session->set_flashdata('message', '<font color="red">添加客户成功!</font>');
			redirect("/customer");
		}
		else{
			$this->session->set_flashdata('message', '<font color="red">添加客户失败!</font>');
			redirect("/customer");
		}
	}

	public function edit($id=0){
		$data["customer_trades"] = $this->system_trades;
		$data["customer_zones"] = $this->system_zones;
		$data["city"] = $this->_getCity();
		$data["county"] = $this->_getCounty();

		$data["customers_config"] = $this->config->item("customers");
		$data["customer"] = $this->customer_model->get_info(array("where"=>array("id"=>$id)));
		$data["message"] = $this->session->flashdata('message') ?: "";
		$content = $this->load->view("customer/customer_edit_view", $data, true);
		$this->show_iframe($content);
	}

	public function edit_save($id=0){
		$post = $this->input->post();
		if(!$post["c_name"] OR !$post["c_address"] OR !$post["area"]){
			$this->session->set_flashdata('message', '<font color="red">必填项不能为空!</font>');
			redirect("/customer/edit/".$id);
		}
		$arr["where"]["id<>"] = $id;
		if(!$this->_getProtectNumberCheck($arr) && !$post['c_status']){
			$this->session->set_flashdata('message', '<font color="red">保护客户数量己达到限制数量,不能继续报备!</font>');
			redirect("/customer/edit/".$id);
		}
		$data["customer"] = $customer = $this->customer_model->get_info(array("where"=>array("id"=>$id)));
		
		/*保护客户和申请取消客户不能修改公司名称*/
		if(in_array($customer->c_status, array(1, 4)))
			unset($post["c_name"]);
		$post["c_zonepath"] = $post["area"];
		unset($post["city"]);
		unset($post["area"]);

		if(isset($post['c_status']) && !$post['c_status'])
			$post["c_status"] = 0;
		else
			unset($post["c_status"]);
		$post["c_createtime"] = date("Y-m-d H:i:s");
		$post["c_add_userid"] = $this->session->userdata("id");
		if($this->customer_model->edit($id,$post)){
			$this->session->set_flashdata('message', '<font color="red">修改客户成功!</font>');
			redirect("/customer");
		}
		else{
			$this->session->set_flashdata('message', '<font color="red">修改客户失败!</font>');
			redirect("/customer");
		}
	}

	public function detail($id=0){
		$data["customer_trades"] = $this->system_trades;
		$data["customer_zones"] = $this->system_zones;
		$data["city"] = $this->_getCity();
		$data["county"] = $this->_getCounty();

		$data["customers_config"] = $this->config->item("customers");
		$data["customer"] = $this->customer_model->get_info(array("where"=>array("id"=>$id)));
		$data["message"] = $this->session->flashdata('message') ?: "";
		$content = $this->load->view("customer/customer_detail_view", $data, true);
		$this->show_iframe($content);
	}

	public function delete($id){
		$arr["c_status"] = 3;

		$data["customer"] = $customer = $this->customer_model->get_info(array("where"=>array("id"=>$id)));
		if($customer->c_status!=5){
			$this->session->set_flashdata('message', '<font color="red">删除失败,只能删除未保护客户!</font>');
			redirect("/customer");
		}
		if($this->customer_model->edit($id, $arr))
			$this->session->set_flashdata('message', '<font color="red">删除客户成功!</font>');
		else
			$this->session->set_flashdata('message', '<font color="red">删除客户失败!</font>');
		redirect("/customer");
	}

	public function cancel($id){
		$data["customer"] = $customer = $this->customer_model->get_info(array("where"=>array("id"=>$id)));
		if(!$customer->c_status){
			$arr["c_status"] = 5;
			$message = "取消保护客户申请成功";
		}
		else{
			$message = "申请取消保护客户成功";
			$arr["c_status"] = 4;
		}
		if($this->customer_model->edit($id, $arr))
			$this->session->set_flashdata('message', '<font color="red">'.$message.'!</font>');
		else
			$this->session->set_flashdata('message', '<font color="red">申请取消保护客户失败!</font>');
		redirect("/customer");
	}

	public function apply($id=0){
		$arr["where"]["id<>"] = $id;
		if(!$this->_getProtectNumberCheck($arr)){
			$this->session->set_flashdata('message', '<font color="red">保护客户数量己达到限制数量,不能继续保护!</font>');
		}
		else{
			$data["c_status"] = 0;
			if($this->customer_model->edit($id, $data))
				$this->session->set_flashdata('message', '<font color="red">申请保护客户成功!</font>');
			else
				$this->session->set_flashdata('message', '<font color="red">申请保护客户失败!</font>');
		}
		redirect("/customer");
	}

	public function county($path=33){
		$data = $this->system_zones;

		$county = array(
				"" => "所有县区",
			);
		foreach ($data as $key => $value) {
			if(strlen($key)==6 && substr($key, 0, 4)==$path)
				$county[$key] = $value;
		}
		echo json_encode($county);
		exit ;
	}

	private function _getCity($path=33){
		$data = $this->system_zones;
		$city = array(
				$path => "所有城市",
			);
		foreach ($data as $key => $value) {
			if(strlen($key)==4)
				$city[$key] = $value;
		}
		return $city;
	}

	private function _getCounty($path=33){
		$data = $this->system_zones;

		$county = array(
				"" => "所有县区",
			);
		foreach ($data as $key => $value) {
			if(strlen($key)==6)
				$county[$key] = $value;
		}
		return $county;
	}


	private function _getProtectNumberCheck($arr=array()){
		$arr["where_in"]["c_status"] = array(0, 1, 4);
		$arr["where"]["c_add_userid"] = $this->session->userdata("id");

		$number = $this->customer_model->get_count($arr);
		if((int)$number<(int)$this->session->userdata("c_num"))
			return TRUE;
		else
			return FALSE;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */