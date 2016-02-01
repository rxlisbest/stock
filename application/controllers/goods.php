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
		$this->load->model("goods_log_model");
		$this->load->model("goods_log_detail_model");
		$this->load->model("customer_model");
		$this->load->helper('url');
		$this->load->helper('form');

		if($_SERVER['QUERY_STRING']){
		    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
		}
		else{
		    $url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
		}
		$url = base64_encode($url);
		if(!$this->session->userdata("islogin"))
			redirect("/login?from_url=${url}");
		define("CONTROLLER", "goods");
	}

	public function index($page=1)
	{	
		$get = $this->input->get();
		$page = isset($get['page']) ? $get['page']: 1;
		$arr = array();
		$per_page = 10;
		$arr['offset'] = ($page - 1)*$per_page;
		$arr['limit'] = $per_page;
		if(isset($get["name"]))
			$arr["like"]["name"] = trim($get["name"]); 

		$data["goods"] = $this->goods_model->get_list($arr);
		$rows = $this->goods_model->get_count($arr);

		$data["search"] = $get;
		
		// $url = "/goods/index/";
		$pagination = $this->pagination($page, $rows, $per_page);
		$data["pagination"] = $pagination;
		// $data["message"] = $this->session->flashdata('message') ?: "";
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
		$arr["where"]["name"] = "'".trim($post["name"])."'"; 
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
		
		// 查看是否存在重复
		$count = $this->goods_model->get_count(array("where"=>array("id<>"=>$id, "name"=>"'{$post['name']}'")));
		if($count > 0){
			$this->sendError('已存在货物');
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
				$this->sendError('入库货物重量不能为空');
				// $this->session->set_flashdata('message', '<font color="red">入库货物重量不能为空!</font>');
				// redirect("/goods/in");
			}

			$data["goods"] = $goods = $this->goods_model->get_info(array("where"=>array("id"=>$id)));
			$post["quantity"] += $goods->quantity;
			
			if($this->goods_model->edit($id,$post)){
				$this->sendSuccess();
				// $this->session->set_flashdata('message', '<font color="red">入库成功!</font>');
				// redirect("/goods");
			}
			else{
				$this->sendError('入库失败');
				// $this->session->set_flashdata('message', '<font color="red">入库失败!</font>');
				// redirect("/goods");
			}
		}
		else{
			$data["goods"] = $this->goods_model->get_info(array("where"=>array("id"=>$id)));
			$data["message"] = $this->session->flashdata('message') ?: "";
			$content = $this->load->view("goods/in", $data, true);
			$this->show_iframe($content);
		}
	}

	public function out($c_id=0){
		$post = $this->input->post();
		$get = $this->input->get();
		$page = isset($get['page']) ? $get['page']: 1;
		$arr = array();
		$per_page = 5;
		$arr['offset'] = ($page - 1)*$per_page;
		$arr['limit'] = $per_page;
		if(isset($get["name"]))
			$arr["like"]["name"] = trim($get["name"]); 

		$data["goods"] = $this->goods_model->get_list($arr);
		$rows = $this->goods_model->get_count($arr);

		$data["search"] = $get;
		
		// $url = "/goods/index/";
		$pagination = $this->pagination($page, $rows, $per_page);
		$data["pagination"] = $pagination;

		$data["customer"] = $this->customer_model->get_info(array("where"=>array("id"=>$c_id)));
		$data["cart"] = $cart = $this->session->userdata($c_id);
		$total_money = 0.00;
		foreach($cart?:array() as $key=>$item){
		    $total_money = ($total_money*100 + $item['price']*$item['quantity']*100)/100;
		}
		$data['total_money'] = sprintf("%.2f", $total_money);
		// var_dump($data["cart"]);exit;
		$content = $this->load->view("goods/out", $data, true);
		$this->show_iframe($content);
	}

	public function cart($c_id){
		$post = $this->input->post();
		$data = $this->session->userdata($c_id);
		if(!$data){
		    $data = array();
		}
		$data[] = array(
				'id' => $post['id'],
				'name' => $post['name'],
				'price' => $post['price'],
				'quantity' => $post['quantity'],
			    );
		$this->session->set_userdata($c_id, $data);
		$this->sendSuccess();
	}

	public function delcart($c_id){
		$post = $this->input->post();
		$data = $this->session->userdata($c_id);
		unset($data[$post['id']]);
		// var_dump($data);exit;
		$this->session->unset_userdata($c_id);
		$this->session->set_userdata($c_id, $data);
		// $this->session->set_userdata($c_id, $data);
		$this->sendSuccess();
	}

	public function del($id){
		if($this->goods_model->delete($id)){
			$this->sendSuccess();
		}
		else{
			$this->sendError('删除货物失败');
		}
	}
    
	public function account($c_id){
		$cart= $this->session->userdata($c_id);
		$data['customer'] = $customer = $this->customer_model->get_info(array("where"=>array("id"=>$c_id)));
		$data['list'] = $cart;

		if($cart){
		    // 验证库存
		    $remain = array();
		    foreach($cart ?:array() as $item){
			$arr = array();
			$arr['where']['id'] = $item['id'];
			$goods = $this->goods_model->get_info($arr);
			if($goods->quantity < $item['quantity']){
			    $this->sendError($goods->name.'库存不足');
			}
			$remain[$item['id']] = ($goods->quantity*100 - $item['quantity']*100)/100;
		    }
		    $log = array();
		    $log['c_id'] = $c_id;
		    $log['c_name'] = $customer->c_name;
		    $log['createtime'] = date('Y-m-d H:i:s');
		    $l_id = $this->goods_log_model->add($log);
		    
		    $total_money = 0;
		    foreach($cart ?:array() as $item){
			$log_detail = array();
			$log_detail['l_id'] = $l_id;
			$log_detail['g_id'] = $item['id'];
			$log_detail['g_name'] = $item['name'];
			$log_detail['price'] = $item['price'];
			$log_detail['quantity'] = $item['quantity'];
			$log_detail['outdate'] = date('Y-m-d');
			$this->goods_log_detail_model->add($log_detail);
			$goods = $this->goods_model->get_info($arr);
			$total_money = ($total_money*100 + $item['price']*$item['quantity']*100)/100;
			
			$data = array();
			$data['quantity'] = $remain[$item['id']];
			$this->goods_model->edit($item['id'],$data);
		    }
		    $log = array();
		    $log['total_money'] = $total_money;
		    $this->goods_log_model->edit($l_id, $log);
		    $this->session->unset_userdata($c_id);
		}
		else{	
		    $this->sendError("未添加货物到清单");
		}
		$this->sendSuccess($l_id);
		// redirect("/goods/deal/".$l_id);
	}
	
	public function deal($id = ''){
		$data['log'] = $log = $this->goods_log_model->get_info(array("where"=>array("id"=>$id)));
		$data['customer'] = $this->customer_model->get_info(array("where"=>array("id"=>$log->c_id)));
		$data['list'] = $list = $this->goods_log_detail_model->get_list(array("where"=>array("l_id"=>$id)));
		
		$content = $this->load->view("goods/account", $data, true);
		$this->show_iframe($content);
	}

	public function detail($id = ''){
		$get = $this->input->get();
		$page = $get['page'];
		if(!$page){
		    $page = 0;
		}
		$data['next_page'] = $page - 1;
		$data['pre_page'] = $page + 1;
		$date = date('Y-m', strtotime("-${page} months"));
		$d = date('t', strtotime($date));
		$arr = array();
		$arr['where']['id'] = $id;
		$data['goods'] = $this->goods_model->get_info($arr);

		$arr = array();
		$arr['select'] = "sum(quantity) as quantity,outdate";
		$arr['where']['g_id'] = $id;
		$arr['where']['date_format(outdate,"%Y-%m")'] = "'${date}'";
		$arr['group'] = array('outdate');
		$result = $this->goods_log_detail_model->get_list($arr);
		// var_dump($result);exit;
		$list = array();
		for($i=1;$i<=$d;$i++){
		    if($i<10){
			$key = $date.'-0'.$i;
		    }
		    else{
			$key = $date.'-'.$i;
		    }
		    $list[$key] = 0;
		}
		foreach($result ?: array() as $item){
		    $list[$item->outdate] = $item->quantity;
		}
		$data['list'] = $list;
		$content = $this->load->view("goods/detail", $data, true);
		$this->show_iframe($content);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
