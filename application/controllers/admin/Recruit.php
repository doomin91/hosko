<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Recruit extends CI_Controller {

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

		$this->load->library('CustomClass');
		//$this->load->library('encrypt');
		$this->load->helper('download');

		$this->load->model("RecruitModel");

	}

	public function index(){
		$limit = 20;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*20;
			$nowpage = $_GET["per_page"];
		}

		$searchField = isset($_GET["searchField"]) ? $_GET["searchField"] : "";
		$searchString = isset($_GET["searchString"]) ? $_GET["searchString"] : "";

		$wheresql = array(
						"searchField" => $searchField,
						"searchString" => $searchString,
						"start" => $start,
						"limit" => $limit
						);

		$lists = $this->RecruitModel->getRecruitApplyList($wheresql);
		// print_r($lists);
		// echo $this->db->last_query();
		$listCount = $this->RecruitModel->getRecruitApplyListCount($wheresql);
		// $listCount= array();
		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/recruit", $listCount, 10, 5, $nowpage);
		//print_r($listCount);
		$data = array(
					"searchField" => $searchField,
					"searchString" => $searchString,
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit
					);

		$this->load->view("./admin/recruit/recruit-apply_list", $data);
	}

	public function recruit_apply_view($apply_seq){
		$DATA["APPLY_INFO"] = $this->RecruitModel->getRecruitApplyInfo($apply_seq);

		// print_r($DATA["APPLY_INFO"]);
        
		$this->load->view("./admin/recruit/recruit-apply_view", $DATA);
	}

	public function recruit_abroad_list(){
		$limit = 15;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*15;
			$nowpage = $_GET["per_page"];
		}

		$searchField = isset($_GET["searchField"]) ? $_GET["searchField"] : "";
		$searchString = isset($_GET["searchString"]) ? $_GET["searchString"] : "";

		$wheresql = array(
						"searchField" => $searchField,
						"searchString" => $searchString,
						"start" => $start,
						"limit" => $limit
						);

		$lists = $this->RecruitModel->getRecruitAbroadList($wheresql);
		// $lists = array();
		//echo $this->db->last_query();
		$listCount = $this->RecruitModel->getRecruitAbroadListCount($wheresql);
		// $listCount= array();
		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*15);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/recurit/abroad", $listCount, 15, 5, $nowpage);
		//print_r($listCount);
		$data = array(
					"searchField" => $searchField,
					"searchString" => $searchString,
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit
					);

		$this->load->view("./admin/recruit/recruit-abroad_list", $data);
	}

	public function recruit_abroad_view($abroad_seq){
		$DATA["ABROAD_INFO"] = $this->RecruitModel->getRecruitAbroadInfo($abroad_seq);

		// print_r($DATA["APPLY_INFO"]);
        
		$this->load->view("./admin/recruit/recruit-abroad_view", $DATA);
	}

	public function recruit_abroad_edit($abroad_seq){
		$DATA["ABROAD_INFO"] = $this->RecruitModel->getRecruitAbroadInfo($abroad_seq);

		// print_r($DATA["APPLY_INFO"]);
        
		$this->load->view("./admin/recruit/recruit-abroad_edit", $DATA);
	}

	public function recruit_abroad_del($abroad_seq){
		
		$result = $this->RecruitModel->deleteRecruitAbroad($abroad_seq);
		

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
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
