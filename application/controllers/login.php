<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends MY_Controller {

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
		$this->load->helper('url');
		$this->load->library('session');
	}

	public function index()
	{	
		//var_dump($this->cache->memcached->get('system_zones'));
		$get = $this->input->get();
		$from_url = base64_decode($get['from_url']) ?: '/goods';
		$data['from_url'] = $from_url;
		// if($this->session->userdata("islogin"))
		// 	redirect("/customer");
		$this->load->helper('form');
		// $data["message"] = $this->session->flashdata('message') ?: "欢迎登陆!";
		$content = $this->load->view("login_view", $data, true);
		$this->show_iframe($content);
	}

	public function login_check(){
		$post = $this->input->post();

		$this->load->model("user_model");
		$this->load->helper("password");
		//var_dump($post);exit;
		$arr["where"]["username"] = $post["username"];

		if(!$user=$this->user_model->get_info($arr)){
			// $this->session->set_flashdata("message", '<font color="red">用户不存在!</font>');
			$this->sendError('用户不存在');
			
			// redirect('/login');
		}
			
		if(password_verify($post["password"], $user->password)){
			$login = array(
                   'username'  => $post["username"],
                   'name'     => $user->name,
                   'id' => $user->id,
                   'c_num' => $user->c_num,
                   'islogin' => TRUE,
               );
			$this->session->set_userdata($login);
			$this->sendSuccess('欢迎登陆后客户管理系统');

			// $this->session->set_flashdata('message', '<font color="red">欢迎登陆后客户管理系统!</font>');
			//var_dump($this->session->flashdata('message'));exit;
			redirect('/customer');
		}
		else{
			$this->sendError('密码错误');
			// $this->session->set_flashdata("message", '<font color="red">密码错误!</font>');
			// redirect('/login');
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('/login');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */