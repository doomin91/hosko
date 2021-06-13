<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Consult extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/welcome
	 *  - or -
	 *      http://example.com/index.php/welcome/index
	 *  - or -
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

		$this->load->model("UserModel");
		$this->load->model("ConsultModel");

	}


	public function onlineConsult(){
		$limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$wheresql = array(
						"start" => $start,
						"limit" => $limit
						);
		$lists = $this->ConsultModel->getOnlineConsultLists($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->ConsultModel->getOnlineConsultListCount($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/consult/onlineConsult/", $listCount, 10, 5, $nowpage);

		$data = array(
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit
					);
		$this->load->view("/admin/consult/online-consult", $data);
	}

	public function visitConsult(){
		$limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$consult_date_start = $this->input->get("consult_date_start");
		$consult_date_end = $this->input->get("consult_date_end");
		$consult_hour = $this->input->get("consult_hour");
		$consult_minute = $this->input->get("consult_minute");
		$user_age = $this->input->get("user_age");
		$user_major  = $this->input->get("user_major");
		$search_field = $this->input->get("search_field");
		$search_string = $this->input->get("search_string");

		$consult_time = $consult_hour . ":" . $consult_minute;

		$wheresql = array(
						"consult_date_start" => $consult_date_start,
						"consult_date_end" => $consult_date_end,
						"consult_time" => $consult_time,
						"user_age" => $user_age,
						"user_major" => $user_major,
						"search_field" => $search_field,
						"search_string" => $search_string,
						"start" => $start,
						"limit" => $limit
						);
		$lists = $this->ConsultModel->getVisitConsultLists($wheresql);

		$listCount = $this->ConsultModel->getVisitConsultListCount($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/consult/visitConsult/", $listCount, 10, 5, $nowpage);

		$data = array(
					"consult_date_start" => $consult_date_start,
					"consult_date_end" => $consult_date_end,
					"consult_hour" => $consult_hour,
					"consult_minute" => $consult_minute,
					"user_age" => $user_age,
					"user_major" => $user_major,
					"search_field" => $search_field,
					"search_string" => $search_string,
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit
					);
		$this->load->view("/admin/consult/visit-consult", $data);
	}

	public function visitConsultEdit($vcon_seq){
		$info = $this->ConsultModel->getVisitConsultInfo($vcon_seq);

		$data = array(
						"info" => $info
					);

		$this->load->view("/admin/consult/visit-consult-view", $data);
	}

	public function consultEditProc(){
		$user_name = $this->input->post("user_name");
		$user_age = $this->input->post("user_age");
		$user_tel = $this->input->post("user_tel");
		$user_email = $this->input->post("user_email");
		$consult_date = $this->input->post("consult_date");
		$consult_time = $this->input->post("consult_time");
		$user_comp = $this->input->post("user_comp");
		$user_depart = $this->input->post("user_depart");
		$user_major = $this->input->post("user_major");
		$user_grades = $this->input->post("user_grades");
		$test_result = $this->input->post("test_result");
		$mail_flag = $this->input->post("mail_flag");
		$vcon_seq = $this->input->post("vcon_seq");

		$updateArr = array(
							"VCON_USER_NAME" => $user_name,
							"VCON_USER_AGE" => $user_age,
							"VCON_USER_TEL" => $user_tel,
							"VCON_USER_EMAIL" => $user_email,
							"VCON_USER_COMP" => $user_comp,
							"VCON_USER_DEPART" => $user_depart,
							"VCON_USER_MAJOR" => $user_major,
							"VCON_USER_GRADES" => $user_grades,
							"VCON_CONSULT_DATE" => $consult_date,
							"VCON_CONSULT_TIME" => $consult_time,
							"VCON_TEST_RESULT" => $test_result,
							"VCON_MAIL_FLAG" => $mail_flag,
							);

		$result = $this->ConsultModel->updateVisitConult($updateArr, $vcon_seq);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "방문상담 수정 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "방문상담 수정중 문제가 생겼습니다."));
		}
	}

	public function callConsultList(){
		$limit = 5;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$wheresql = array(
						"start" => $start,
						"limit" => $limit
						);
		$lists = $this->ConsultModel->getCallMsg($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->ConsultModel->getCallMsgCount($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/consult/callConsultList/", $listCount, 10, 5, $nowpage);

		$data = array(
			"lists" => $lists,
			"listCount" => $listCount,
			"pagination" => $pagination,
			"pagenum" => $pagenum,
			"start" => $start,
			"limit" => $limit
			);
		$this->load->view("/admin/consult/callConsultList", $data);
	}

	public function schedule(){
		$flag = ($this->input->get("flag")) ? $this->input->get("flag") : "hosko";
		$dateY = ($this->input->get("strYear")) ? $this->input->get("strYear") : date("Y");
        $dateM = ($this->input->get("strMon")) ? $this->input->get("strMon") : date("m");

		if ($flag == "hosko"){
			$flag_string = "HOSKO 일정";
		}else if ($flag == "presentation"){
			$flag_string = "설명회 일정";
		}

        $data["month"] = $dateM;
        $data["year"] = $dateY;
		$data = array(
					"year" => $dateY,
					"month" => $dateM,
					"flag" => $flag,
					"flag_string" => $flag_string
		);

		$this->load->view("/admin/consult/schedule", $data);
	}

	public function schedule_write($nDay){
		$flag = $this->input->get("flag");

		if ($flag == "hosko"){
			$flag_string = "HOSKO 일정";
		}else if ($flag == "presentation"){
			$flag_string = "설명회 일정";
		}

		$data = array(
					"nDay" => $nDay,
					"flag" => $flag,
					"flag_string" => $flag_string
		);

		$this->load->view("/admin/consult/schedule-write", $data);
	}
}
