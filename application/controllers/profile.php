<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends MY_Controller {

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
		$this->load->model("user_model");
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->helper('password');
		if($_SERVER['QUERY_STRING']){
		    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		}
		else{
		    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		}
		$url = base64_encode($url);
		if(!$this->session->userdata("islogin"))
			redirect("/login?from_url=${url}");
		define("CONTROLLER", "profile");
	}

	public function index()
	{	
		$this->edit();
	}

	public function edit(){
		$id = $this->session->userdata("id");
		$data["profile"] = $this->user_model->get_info(array("where"=>array("id"=>$id)));
		$data["message"] = $this->session->flashdata('message') ?: "";
		$data["session"] = $this->session->all_userdata();
		$content = $this->load->view("profile_view", $data, true);
		$this->show_iframe($content);
	}

	public function edit_save($id=0){
		$post = $this->input->post();
		//var_dump($post);exit;

		if(!$post["name"] OR !$post["contact"] OR !$post["phone"] OR !$post["mobile"]){
			$this->sendError('必填项不能为空');
			// $this->session->set_flashdata('message', '<font color="red">必填项不能为空!</font>');
			// redirect("/profile");
		}

		unset($post["username"]);
		unset($post["c_num"]);

		if($post["password"]){
			if($post["password"]!==$post["confirmPassword"]){
				$this->sendError('两次输入密码不同,请重新输入');
				// $this->session->set_flashdata('message', '<font color="red">两次输入密码不同,请重新输入!</font>');
				// redirect("/profile");
			}
        	$post["password"] = password_hash($post["password"], PASSWORD_BCRYPT, array('cost'=>10));
			unset($post["confirmPassword"]);
		}
		else{
			unset($post["password"]);
			unset($post["confirmPassword"]);
		}
		//var_dump($post);exit;

		if($this->user_model->edit($id,$post)){
			$this->sendSuccess();
			// $this->session->set_flashdata('message', '<font color="red">修改客户成功!</font>');
			// redirect("/profile");
		}
		else{
			$this->sendError('修改客户失败');
			// $this->session->set_flashdata('message', '<font color="red">修改客户失败!</font>');
			// redirect("/profile");
		}
	}
}

/* End of file profile.php */
/* Location: ./application/controllers/profile.php */
