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
	
	public function pagination($page, $rows, $per_page){
		$get = $this->input->get();
		$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		$pages = ceil($rows/$per_page);
		$html = ''; 
		$html .= '<div class="widget-body">';
		$html .= '<div class="pagination no-margin">';
		$html .= '<ul>';

		if($page > 1){
		    $get['page'] = $page - 1;
		    $query_string = $this->query_string($get);
    
		    $html .= '<li>';
		    $html .= '<a href="'.$url.'?'.$query_string.'">';
		}
		else{
		    $html .= '<li class="disabled">';
		    $html .= '<a>';
		}
		$html .= '上一页';
		$html .= '</a>';
		$html .= '</li>';
		
		for($i=1;$i<=$pages;$i++){
		    if($i==$page){
			$html .= '<li class="active">';
		    }
		    elseif(abs($page-$i)>1){
			$html .= '<li class="hidden-phone">';
		    }
		    else{
			$html .= '<li>';
		    }
		    $get['page'] = $i;
		    $query_string = $this->query_string($get);

		    $html .= '<a href="'.$url.'?'.$query_string.'">';
		    $html .= $i;
		    $html .= '</a>';
		    $html .= '</li>';
		}
		if($page < $pages){
		    $get['page'] = $page + 1;
		    $query_string = $this->query_string($get);

		    $html .= '<li>';
		    $html .= '<a href="'.$url.'?'.$query_string.'">';
		}
		else{
		    $html .= '<li class="disabled">';
		    $html .= '<a>';
		}
		$html .= '下一页';
		$html .= '</a>';
		$html .= '</li>';

		$html .= '</ul>';
		$html .= '</div>';
		$html .= '</div>';
		return $html;
	}
	
	public function query_string($get){
	    $data = array();
	    foreach($get as $key => $value){
		$data[] = $key.'='.$value;
	    }
	    return implode('&', $data);
	}
}


/* End of file MY_Controller.php */
/* Location: ./application/core/MY_Controller.php */
