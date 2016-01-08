<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->driver('cache');
		// $this->load->model('loader_model');
		define('PATH_INFO', isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : "/");
		define('HTTP_REFERER', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "");
		define('STATIC_URL', '/statics');
		$this->guid = rand(1000, 9999);
	}

	public function show_iframe($content, $data = FALSE, $return = FALSE) {
		$this->load->library('session');
		if ($data === FALSE) {
			$data["name"] = $this->session->userdata("name") ?: "";
			$data['content'] = $content;
			$this->load->view("master_view.php", $data);
		} else {
			if ($return)
				return $this->load->view($content, $data, $return);
			else
				$this->load->view($content, $data);
		}
	}

	public function sendSuccess($msg = ''){
		$data = array();
		$data['code'] = 200;
		$data['msg'] = $msg;
		echo json_encode($data);
		exit;
	}

	public function sendError($msg = ''){
		$data = array();
		$data['code'] = 300;
		$data['msg'] = $msg;
		echo json_encode($data);
		exit;
	}
}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */