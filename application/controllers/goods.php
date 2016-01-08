<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class goods extends MY_Controller {

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
		$this->load->model("goods_model");
		$this->load->helper('url');
		$this->load->helper('form');

		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		$url = base64_encode($url);
		if(!$this->session->userdata("islogin"))
			redirect("/login?from_url=${url}");
	}

	public function index()
	{	
		$get = $this->input->get();
		$arr = array();
		//var_dump($this->cache->memcached->get('system_zones'));
		if(isset($get["name"]))
			$arr["like"]["name"] = trim($get["name"]); 

		// $arr["where"]["c_add_userid"] = $this->session->userdata('id');
		// $arr["where"]["c_status<>"] = 3; 
		$data["goods"] = $this->goods_model->get_list($arr);

		$data["search"] = $get;

		$data["message"] = $this->session->flashdata('message') ?: "";
		$content = $this->load->view("goods/list", $data, true);
		$this->show_iframe($content);
	}

	public function add(){
		$data["message"] = $this->session->flashdata('message') ?: "";
		$data["post"] = $this->session->flashdata('post') ?: "";

		$content = $this->load->view("goods/add", $data, true);
		$this->show_iframe($content);
	}

	public function add_save(){
		$post = $this->input->post();
		$this->session->set_flashdata('post', $post);
		if(!$post["name"]){
			$this->sendError('货物名称不能为空');
			// $this->session->set_flashdata('message', '<font color="red">货物名称不能为空!</font>');
			// redirect("/goods/add");
		}
		if(!$post["price"]){
			$this->sendError('单价不能为空');
			// $this->session->set_flashdata('message', '<font color="red">单价不能为空!</font>');
			// redirect("/goods/add");
		}
		if(!$post["quantity"]){
			$this->sendError('库存不能为空');
			// $this->session->set_flashdata('message', '<font color="red">库存不能为空!</font>');
			// redirect("/goods/add");
		}

		$arr = array();
		$arr["like"]["name"] = trim($post["name"]); 
		$goods_count = $this->goods_model->get_count($arr);
		if($goods_count > 0){
			$this->sendError('已存在这种货物,请不要重复添加!');
			// $this->session->set_flashdata('message', '<font color="red">已存在这种货物,请不要重复添加!</font>');
			// redirect("/goods/add");
		}

		if($this->goods_model->add($post)){
			$this->sendSuccess();
			// $this->session->set_flashdata('message', '<font color="red">添加货物成功!</font>');
			// redirect("/goods");
		}
		else{
			$this->sendError('添加货物失败');
			// $this->session->set_flashdata('message', '<font color="red">>添加货物失败!</font>');
			// redirect("/goods");
		}
	}

	public function edit($id=0){
		$data["goods"] = $this->goods_model->get_info(array("where"=>array("id"=>$id)));
		$data["message"] = $this->session->flashdata('message') ?: "";
		$content = $this->load->view("goods/edit", $data, true);
		$this->show_iframe($content);
	}

	public function edit_save($id=0){
		$post = $this->input->post();
		if(!$post["name"]){
			$this->sendError('货物名称不能为空');
			// $this->session->set_flashdata('message', '<font color="red">货物名称不能为空!</font>');
			// redirect("/goods/edit/".$id);
		}
		if(!$post["price"]){
			$this->sendError('单价不能为空');
			// $this->session->set_flashdata('message', '<font color="red">单价不能为空!</font>');
			// redirect("/goods/edit/".$id);
		}

		$data["goods"] = $goods = $this->goods_model->get_info(array("where"=>array("id"=>$id)));
		
		if($this->goods_model->edit($id,$post)){
			$this->sendSuccess();
			// $this->session->set_flashdata('message', '<font color="red">修改货物成功!</font>');
			// redirect("/goods");
		}
		else{
			$this->sendError('修改货物失败');
			// $this->session->set_flashdata('message', '<font color="red">修改货物失败!</font>');
			// redirect("/goods");
		}
	}

	public function in($id=0){
		$post = $this->input->post();
		if($post){
			if(!$post["quantity"]){
				$this->session->set_flashdata('message', '<font color="red">入库货物重量不能为空!</font>');
				redirect("/goods/in");
			}

			$data["goods"] = $goods = $this->goods_model->get_info(array("where"=>array("id"=>$id)));
			$post["quantity"] += $goods->quantity;
			
			if($this->goods_model->edit($id,$post)){
				$this->session->set_flashdata('message', '<font color="red">入库成功!</font>');
				redirect("/goods");
			}
			else{
				$this->session->set_flashdata('message', '<font color="red">入库失败!</font>');
				redirect("/goods");
			}
		}
		else{
			$data["goods"] = $this->goods_model->get_info(array("where"=>array("id"=>$id)));
			$data["message"] = $this->session->flashdata('message') ?: "";
			$content = $this->load->view("goods/in", $data, true);
			$this->show_iframe($content);
		}
	}

	public function out($id=0){
		$post = $this->input->post();
		if($post){
			if(!$post["quantity"]){
				$this->session->set_flashdata('message', '<font color="red">出库货物重量不能为空!</font>');
				redirect("/goods/out");
			}

			$data["goods"] = $goods = $this->goods_model->get_info(array("where"=>array("id"=>$id)));
			$post["quantity"] += $goods->quantity;
			if($post["quantity"] < 0){
				$this->session->set_flashdata('message', '<font color="red">出库货物重量不能大于现有库存!</font>');
				redirect("/goods/out");
			}
			if($this->goods_model->edit($id,$post)){
				$this->session->set_flashdata('message', '<font color="red">出库成功!</font>');
				redirect("/goods");
			}
			else{
				$this->session->set_flashdata('message', '<font color="red">出库失败!</font>');
				redirect("/goods");
			}
		}
		else{
			$data["goods"] = $this->goods_model->get_info(array("where"=>array("id"=>$id)));
			$data["message"] = $this->session->flashdata('message') ?: "";
			$content = $this->load->view("goods/out", $data, true);
			$this->show_iframe($content);
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
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */