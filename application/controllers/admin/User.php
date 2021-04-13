<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends CI_Controller {

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

		$this->load->model("UserModel");
		//$this->load->model("CodeModel");

		$this->customclass->adminCheck();
	}

	public function index(){
		$limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$reg_date_start = $this->input->post("reg_date_start");
		$reg_date_end = $this->input->post("reg_date_end");
		$last_login_start = $this->input->post("last_login_start");
		$last_login_end = $this->input->post("last_login_end");
		$user_skill_eng = $this->input->post("user_skill_eng");
		$user_skill_jp = $this->input->post("user_skill_jp");
		$user_skill_ch = $this->input->post("user_skill_ch");
		$user_study_nation = $this->input->post("user_study_nation");
		$user_study_term = $this->input->post("user_study_term");
		$user_lan_study_nation = $this->input->post("user_lan_study_nation");
		$user_lan_study_term = $this->input->post("user_lan_study_term");
		$search_field = $this->input->post("search_field");
		$search_string = $this->input->post("search_string");

		$wheresql = array(
						"reg_date_start" => $reg_date_start,
						"reg_date_end" => $reg_date_end,
						"last_login_start" => $last_login_start,
						"last_login_end" => $last_login_end,
						"user_skill_eng" => $user_skill_eng,
						"user_skill_jp" => $user_skill_jp,
						"user_skill_ch" => $user_skill_ch,
						"user_study_nation" => $user_study_nation,
						"user_study_term" => $user_study_term,
						"user_lan_study_nation" => $user_lan_study_nation,
						"user_lan_study_term" => $user_lan_study_term,
						"search_field" => $search_field,
						"search_string" => $search_string,
						"start" => $start,
						"limit" => $limit
						);
		$lists = $this->UserModel->getUsers($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->UserModel->getUsersCount($wheresql);
		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/user", $listCount, 10, 5, $nowpage);
		//print_r($listCount);
		$data = array(
					"reg_date_start" => $reg_date_start,
					"reg_date_end" => $reg_date_end,
					"last_login_start" => $last_login_start,
					"last_login_end" => $last_login_end,
					"user_skill_eng" => $user_skill_eng,
					"user_skill_jp" => $user_skill_jp,
					"user_skill_ch" => $user_skill_ch,
					"user_study_nation" => $user_study_nation,
					"user_study_term" => $user_study_term,
					"user_lan_study_nation" => $user_lan_study_nation,
					"user_lan_study_term" => $user_lan_study_term,
					"search_field" => $search_field,
					"search_string" => $search_string,
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit
					);
		$this->load->view("/admin/user/user-list", $data);
	}

	public function user_view(){

		$this->load->view("/admin/user/user-view");
	}

	public function user_write(){
		$region_code = $this->CodeModel->getRegionCode();

		$data = array(
					"region_code" => $region_code
		);
		$this->load->view("./admin//user/user-write", $data);
	}

	public function user_modify($user_seq){
		$user_info = $this->UserModel->getUserInfo($user_seq);

		$data["info"] = $user_info;
		$this->load->view("admin/user/user-modify", $data);
	}

	public function userModifyProc(){
		print_r($this->input->post());
		exit;

		$post_data = $this->input->post();

		$user_tel = $post_data["tel1"] . "-" . $post_data["tel2"] . "-" . $post_data["tel3"];
		$user_hp = $post_data["hp1"] . "-" . $post_data["hp2"] . "-" . $post_data["hp3"];

		$updateArr = array(
						"USER_ENG_NAME" => $post_data["user_eng_name"],
						"USER_SEX" => $post_data["user_sex"],
						"USER_BIRTHDAY" => $post_data["user_birth"],
						"USER_ZIPCODE" => $post_data["zipcode"],
						"USER_ADDR1" => $post_data["addr1"],
						"USER_ADDR2" => $post_data["addr2"],
						"USER_TEL" => $user_tel,
						"USER_HP" => $user_hp,
						"USER_EMAIL" => $post_data["user_email"],
						"USER_EMAIL_FLAG" => $post_data["user_email_flag"],
						"USER_SMS_FLAG" => $post_data["user_sms_flag"],
						"USER_SKYPE_ID" => $post_data["user_skype_id"],
						"USER_COMPANY" => $post_data["user_company"],
						"USER_DEPARTMENT" => $post_data["user_department"],
						"USER_MAJOR" => $post_data["user_major"],
						"USER_HOPE_NATION" => $post_data["user_hope_nation"],
						"USER_HOPE_PART" => $post_data["user_hope_part"],
						"USER_SKILL_ENG" => $post_data["user_skill_eng"],
						"USER_SKILL_JP" => $post_data["user_skill_jp"],
						"USER_SKILL_CH" => $post_data["user_skill_ch"],
						"USER_STUDY_NATION" => $post_data["user_study_nation"],
						"USER_STUDY_TERM" => $post_data["user_study_termy"],
						"USER_LAN_STUDY_NATION" => $post_data["user_lan_study_nation"],
						"USER_LAN_STUDY_TERM" => $post_data["user_lan_study_term"],
						"USER_WORK_COMPANY" => $post_data["user_work_company"],
						"USER_WORK_TERM" => $post_data["user_work_term"],
						"USEr_WORK_COMPANY2" => $post_data["user_work_company2"],
						"USER_WORK_TERM2" => $post_data["user_work_term2"],
						"USER_WORK_COMPANY3" => $post_data["user_work_company3"],
						"USER_WORK_TERM3" => $post_data["user_work_term3"],
						"USER_CERTIFICATE_NAME" => $post_data["user_certificate_name"],
						"USER_CERTI_FLAG" => $post_data["user_certi_flag"],
						"USER_PASSPORT_FLAG" => $post_data["user_passport_flag"],
						"USER_VISA_FLAG" => $post_data["user_visa_flag"],
						"USER_PROFILE_DOC" => $user_profile_doc,
						"USER_JOIN_ROUTE" => $post_data["user_join_route"],
						"USER_LEAVE_COUNTRY" => $post_data["user_leave_country"],
						"USER_LEAVE_HOTEL" => $post_data["user_leave_hotel"],
						"USER_MANAGER_NAME" => $post_data["user_manager_name"],
						"USER_RECOMM_ID" => $post_data["user_recomm_id"],
						"USER_MEMO" => $post_data["user_memo"],
		);


		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => $result));
		}
	}

}
