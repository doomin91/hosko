<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();

		$this->load->helper('url');
		$this->load->helper('form');

		$this->load->library('session');
		$this->load->library('pagination');

		//$this->load->library('CustomClass');
		//$this->load->library('encrypt');
		$this->load->helper('download');

		//$this->load->model("adminModel");

	}

	public function index(){
		$this->load->view("admin/login");

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("http://".$_SERVER["SERVER_NAME"]."/admin", "location");
	}

	public function login_proc(){
		$admin_id = isset($_POST["admin_id"]) ? $_POST["admin_id"] : "";
		$admin_pass = isset($_POST["admin_pass"]) ? $_POST["admin_pass"] : "";

		$user = $this->AdminModel->adminLogin($admin_id, $admin_pass);
		//echo $this->db->last_query();
		if (empty($user)){
			echo json_encode(array("code" => "201", "msg" => "아이디 패스워드를 확인해주세요"));
		}else{
			//print_r($user);
			$session_data = array(
								"admin_id" => $user->ADMIN_ID
			);
			$this->session->set_userdata($session_data);

			echo json_encode(array("code" => "200"));
		}
	}

	public function thumbnail_del_proc(){
		$seq = isset($_POST["seq"]) ? $_POST["seq"] : "";
		$part = isset($_POST["part"]) ? $_POST["part"] : "";

		$result = $this->CodeModel->attachDel($seq, $part);
		//echo $this->db->last_query();
		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => $logs));
		}
	}
}
