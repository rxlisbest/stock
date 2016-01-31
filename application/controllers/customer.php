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
		$this->load->model("goods_log_model");
		$this->load->model("goods_log_detail_model");
		$this->load->helper('url');
		$this->load->helper('form');

		if($_SERVER['QUERY_STRING']){
		    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		}
		else{
		    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		}
		define("CONTROLLER", "customer");
		$url = base64_encode($url);
		if(!$this->session->userdata("islogin"))
			redirect("/login?from_url=${url}");
	}

	public function index()
	{	
		$get = $this->input->get();
		$page = isset($get['page']) ? $get['page']: 1;
		$arr = array();
		$per_page = 10;
		$arr['offset'] = ($page - 1)*$per_page;
		$arr['limit'] = $per_page;

		if(isset($get["c_name"]))
			$arr["like"]["c_name"] = trim($get["c_name"]); 

		$arr['order'] = array('id'=>'DESC');
		$data["customers"] = $this->customer_model->get_list($arr);
		$rows = $this->customer_model->get_count($arr);

		$pagination = $this->pagination($page, $rows, $per_page);
		$data["pagination"] = $pagination;

		$data["search"] = $get;

		$content = $this->load->view("customer/customer_list_view", $data, true);
		$this->show_iframe($content);
	}

	public function add(){
		$data["post"] = $this->session->flashdata('post') ?: "";

		$content = $this->load->view("customer/customer_add_view", $data, true);
		$this->show_iframe($content);
	}

	public function add_save(){
		$post = $this->input->post();
		if(!$post["c_name"]){
			$this->sendError('客户名称不能为空');
		}

		$arr = array();
		$arr["where"]["c_name"] = "'".trim($post["c_name"])."'"; 
		$customer_count = $this->customer_model->get_count($arr);
		if($customer_count > 0){
			$this->sendError('已存在这个客户,请不要重复添加!');
		}

		$post["c_createtime"] = date("Y-m-d H:i:s");
		if($this->customer_model->add($post)){
			$this->sendSuccess();
		}
		else{
			$this->sendError('添加客户失败');
		}
	}

	public function edit($id=0){
		$data["customer"] = $this->customer_model->get_info(array("where"=>array("id"=>$id)));
		$content = $this->load->view("customer/customer_edit_view", $data, true);
		$this->show_iframe($content);
	}

	public function edit_save($id=0){
		$post = $this->input->post();
		if(!$post["c_name"]){
			$this->sendError('客户名称不能为空');
		}

		// 查看是否存在重复
		$count = $this->customer_model->get_count(array("where"=>array("id<>"=>$id, "c_name"=>"'{$post['c_name']}'")));
		if($count > 0){
			$this->sendError('已存在这个客户');
		}
		$arr["where"]["id<>"] = $id;
		$data["customer"] = $customer = $this->customer_model->get_info(array("where"=>array("id"=>$id)));
		
		$post["c_createtime"] = date("Y-m-d H:i:s");
		if($this->customer_model->edit($id,$post)){
			$this->sendSuccess();
		}
		else{
			$this->sendError('修改客户失败');
		}
	}

	public function detail($id=0){
		$data["customer"] = $this->customer_model->get_info(array("where"=>array("id"=>$id)));
		$arr = array();
		$arr['where']['c_id'] = $id;
		$arr['order']['id'] = 'desc';
		$log_list = $this->goods_log_model->get_list($arr);
		$list = array();
		foreach($log_list as $item){
		    $arr = array();
		    $arr['where']['l_id'] = $item->id;
		    $log_detail_list = $this->goods_log_detail_model->get_list($arr);
		    $item->list = $log_detail_list;
		    $list[] = $item;
		}
		$data['list'] = $list;
		$content = $this->load->view("customer/customer_detail_view", $data, true);
		$this->show_iframe($content);
	}

	public function del($id){
		if($this->customer_model->delete($id)){
			$this->sendSuccess();
		}
		else{
			$this->sendError('删除客户失败');
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
