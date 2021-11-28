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

		date_default_timezone_set('Asia/Seoul');

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

		$reg_date_start = $this->input->get("reg_date_start");
		$reg_date_end = $this->input->get("reg_date_end");
		$last_login_start = $this->input->get("last_login_start");
		$last_login_end = $this->input->get("last_login_end");
		$user_skill_eng = $this->input->get("user_skill_eng");
		$user_skill_jp = $this->input->get("user_skill_jp");
		$user_skill_ch = $this->input->get("user_skill_ch");
		$user_study_nation = $this->input->get("user_study_nation");
		$user_study_term = $this->input->get("user_study_term");
		$user_lan_study_nation = $this->input->get("user_lan_study_nation");
		$user_lan_study_term = $this->input->get("user_lan_study_term");
		$user_level = $this->input->get("user_level");
		$search_field = $this->input->get("search_field");
		$search_string = $this->input->get("search_string");

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
						"user_level" => $user_level,
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
		$queryString = "?reg_date_start=".$reg_date_start."&amp;reg_date_end=".$reg_date_end."&amp;last_login_start=".$last_login_start."&last_login_end=".$last_login_end."&user_skill_eng".$user_skill_eng."&user_skill_jp=".$user_skill_jp."&user_skill_ch=".$user_skill_ch."&user_study_nation=".$user_study_nation."&user_study_term=".$user_study_term."&user_lan_study_nation=".$user_lan_study_nation."&user_lan_study_term=".$user_lan_study_term."&user_level=".$user_level."&search_field=".$search_field."&search_string=".$search_string;
		$pagination = $this->customclass->pagenavi("/admin/user".$queryString, $listCount, 10, 5, $nowpage);
		//print_r($listCount);
		$levels = $this->UserModel->getUserLevelAll();
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
					"user_level" => $user_level,
					"search_field" => $search_field,
					"search_string" => $search_string,
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit,
					"levels" => $levels
					);
		$this->load->view("/admin/user/user-list", $data);
	}

	public function user_view(){

		$this->load->view("/admin/user/user-view");
	}

	public function userWrite(){

		$data = array(
					"region_code" => ""
		);
		$this->load->view("./admin//user/user-write", $data);
	}

	public function userWriteProc(){
		$post_data = $this->input->post();

		$idCheck = $this->UserModel->CheckUserId($post_data["user_id"]);
		if (!empty($idCheck)){
			echo json_encode(array("code" => "202", "msg" => "이미 등록되어 있는 아이디 입니다."));
			exit;
		}

		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/profile/";
		$config["allowed_types"] = "xls|xlsx|ppt|pptx|gif|jpg|png|hwp|doc|bmp|jpeg|zip|GIF|JPG|PNG|JPEG";
		$new_name = $post_data["user_id"] . "_img_" . date("YmdHis");
		$config["file_name"] = $new_name;
		$this->load->library("upload", $config);

		$user_profile = "";
		$user_profile_path = "";
		if (isset($_FILES['user_profile']['name'])) {
			if (0 < $_FILES['user_profile']['error']) {
				echo 'Error during file upload' . $_FILES['user_profile']['error'];
			} else {
				if (file_exists('upload/profile' . $_FILES['user_profile']['name'])) {
					echo 'File already exists : upload/profile' . $_FILES['user_profile']['name'];
				} else {
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('user_profile')) {
						echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$user_profile = $_FILES['user_profile']['name'];
						$user_profile_path = "/upload/profile/".$this->upload->data("file_name");
					}
				}
			}
		} else {
			//echo 'Please choose a file';
		}

		$user_profile_doc = "";
		$user_profile_doc_path = "";
		if (isset($_FILES['user_profile_doc']['name'])) {
			if (0 < $_FILES['user_profile_doc']['error']) {
				echo 'Error during file upload' . $_FILES['user_profile_doc']['error'];
			} else {
				if (file_exists('upload/profile' . $_FILES['user_profile_doc']['name'])) {
					echo 'File already exists : upload/profile' . $_FILES['user_profile_doc']['name'];
				} else {
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('user_profile_doc')) {
						echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$user_profile_doc = $_FILES['user_profile_doc']['name'];
						$user_profile_doc_path = "/upload/profile/".$this->upload->data("file_name");
					}
				}
			}
		} else {
			//echo 'Please choose a file';
		}

		$userCnt = $this->UserModel->getMaxUserNumber();
		$user_number = $userCnt->USER_NUMBER + 1;

		$insertArr = array(
						"USER_LEVEL" => $post_data["user_level"],
						"USER_NUMBER" => $user_number,
						"USER_ID" => $post_data["user_id"],
						"USER_PASS" => $post_data["user_pass"],
						"USER_NAME" => $post_data["user_name"],
						"USER_ENG_NAME" => $post_data["user_eng_name"],
						"USER_SEX" => $post_data["user_sex"],
						"USER_PROFILE" => $user_profile_path,
						"USER_BIRTHDAY" => $post_data["user_birthday"],
						"USER_ZIPCODE" => $post_data["user_zipcode"],
						"USER_ADDR1" => $post_data["user_addr1"],
						"USER_ADDR2" => $post_data["user_addr2"],
						"USER_TEL" => $post_data["user_tel"],
						"USER_HP" => $post_data["user_hp"],
						"USER_EMAIL" => $post_data["user_email"],
						"USER_EMAIL_FLAG" => $post_data["user_email_flag"],
						"USER_SMS_FLAG" => isset($post_data["user_sms_flag"]) ? $post_data["user_sms_flag"] : "",
						"USER_SKYPE_ID" => $post_data["user_skype_id"],
						"USER_COMPANY" => $post_data["user_company"],
						"USER_DEPARTMENT" => $post_data["user_department"],
						"USER_MAJOR" => $post_data["user_major"],
						"USER_HOPE_NATION" => $post_data["user_hope_nation"],
						"USER_HOPE_PART" => $post_data["user_hope_part"],
						"USER_SKILL_ENG" => isset($post_data["user_skill_eng"]) ? $post_data["user_skill_eng"] : "",
						"USER_SKILL_JP" => isset($post_data["user_skill_jp"]) ? $post_data["user_skill_jp"] : "",
						"USER_SKILL_CH" => isset($post_data["user_skill_ch"]) ? $post_data["user_skill_ch"] : "",
						"USER_STUDY_NATION" => $post_data["user_study_nation"],
						"USER_STUDY_TERM" => isset($post_data["user_study_termy"]) ? $post_data["user_study_termy"] : "",
						"USER_LAN_STUDY_NATION" => $post_data["user_lan_study_nation"],
						"USER_LAN_STUDY_TERM" => isset($post_data["user_lan_study_term"]) ? $post_data["user_lan_study_term"] : "",
						"USER_WORK_COMPANY" => $post_data["user_work_company"],
						"USER_WORK_TERM" => isset($post_data["user_work_term"]) ? $post_data["user_work_term"] : "",
						"USER_WORK_COMPANY_2" => $post_data["user_work_company_2"],
						"USER_WORK_TERM_2" => isset($post_data["user_work_term_2"]) ? $post_data["user_work_term_2"] : "",
						"USER_WORK_COMPANY_3" => $post_data["user_work_company_3"],
						"USER_WORK_TERM_3" => isset($post_data["user_work_term_3"]) ? $post_data["user_work_term_3"] : "",
						"USER_CERTIFICATE_NAME" => isset($post_data["user_certificate_name"]) ? $post_data["user_certificate_name"] : "",
						"USER_CERTI_FLAG" => isset($post_data["user_certi_flag"]) ? $post_data["user_certi_flag"] : "",
						"USER_PASSPORT_FLAG" => isset($post_data["user_passport_flag"]) ? $post_data["user_passport_flag"] : "",
						"USER_VISA_FLAG" => isset($post_data["user_visa_flag"]) ? $post_data["user_visa_flag"] : "",
						"USER_PROFILE_DOC" => $user_profile_doc_path,
						"USER_JOIN_ROUTE" => isset($post_data["user_join_route"]) ? $post_data["user_join_route"] : "",
						"USER_LEAVE_COUNTRY" => $post_data["user_leave_country"],
						"USER_LEAVE_HOTEL" => $post_data["user_leave_hotel"],
						"USER_MANAGER_NAME" => $post_data["user_manager_name"],
						"USER_RECOMM_ID" => $post_data["user_recomm_id"],
						"USER_MEMO" => $post_data["user_memo"],
						"USER_REG_DATE" => date("Y-m-d H:i:s"),
						"USER_DEL_YN" => "N",
						"USER_REG_IP" => $_SERVER["REMOTE_ADDR"],
		);

		$result = $this->UserModel->insertUser($insertArr);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "회원 정보 등록 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "회원 정보 등록중 문제가 생겼습니다."));
		}
		//print_r($insertArr);
	}

	public function userModify($user_seq){
		$user_info = $this->UserModel->getUserInfo($user_seq);

		$data["info"] = $user_info;
		$this->load->view("admin/user/user-modify", $data);
	}

	public function userModifyProc(){
		$post_data = $this->input->post();

		$user_tel = $post_data["tel1"] . "-" . $post_data["tel2"] . "-" . $post_data["tel3"];
		$user_hp = $post_data["hp1"] . "-" . $post_data["hp2"] . "-" . $post_data["hp3"];
		$user_profile_doc = "";

		$updateArr = array(
						"USER_LEVEL" => $post_data["user_level"],
						"USER_ENG_NAME" => $post_data["user_eng_name"],
						"USER_SEX" => $post_data["user_sex"],
						"USER_BIRTHDAY" => $post_data["user_birthday"],
						"USER_ZIPCODE" => $post_data["zipcode"],
						"USER_ADDR1" => $post_data["addr1"],
						"USER_ADDR2" => $post_data["addr2"],
						"USER_TEL" => $user_tel,
						"USER_HP" => $user_hp,
						"USER_EMAIL" => $post_data["user_email"],
						"USER_EMAIL_FLAG" => $post_data["user_email_flag"],
						"USER_SMS_FLAG" => isset($post_data["user_sms_flag"]) ? $post_data["user_sms_flag"] : "",
						"USER_SKYPE_ID" => $post_data["user_skype_id"],
						"USER_COMPANY" => $post_data["user_company"],
						"USER_DEPARTMENT" => $post_data["user_department"],
						"USER_MAJOR" => $post_data["user_major"],
						"USER_HOPE_NATION" => $post_data["user_hope_nation"],
						"USER_HOPE_PART" => $post_data["user_hope_part"],
						"USER_SKILL_ENG" => isset($post_data["user_skill_eng"]) ? $post_data["user_skill_eng"] : "",
						"USER_SKILL_JP" => isset($post_data["user_skill_jp"]) ? $post_data["user_skill_jp"] : "",
						"USER_SKILL_CH" => isset($post_data["user_skill_ch"]) ? $post_data["user_skill_ch"] : "",
						"USER_STUDY_NATION" => $post_data["user_study_nation"],
						"USER_STUDY_TERM" => isset($post_data["user_study_termy"]) ? $post_data["user_study_termy"] : "",
						"USER_LAN_STUDY_NATION" => $post_data["user_lan_study_nation"],
						"USER_LAN_STUDY_TERM" => isset($post_data["user_lan_study_term"]) ? $post_data["user_lan_study_term"] : "",
						"USER_WORK_COMPANY" => $post_data["user_work_company"],
						"USER_WORK_TERM" => isset($post_data["user_work_term"]) ? $post_data["user_work_term"] : "",
						"USER_WORK_COMPANY_2" => $post_data["user_work_company2"],
						"USER_WORK_TERM_2" => isset($post_data["user_work_term2"]) ? $post_data["user_work_term2"] : "",
						"USER_WORK_COMPANY_3" => $post_data["user_work_company3"],
						"USER_WORK_TERM_3" => isset($post_data["user_work_term3"]) ? $post_data["user_work_term3"] : "",
						"USER_CERTIFICATE_NAME" => isset($post_data["user_certificate_name"]) ? $post_data["user_certificate_name"] : "",
						"USER_CERTI_FLAG" => isset($post_data["user_certi_flag"]) ? $post_data["user_certi_flag"] : "",
						"USER_PASSPORT_FLAG" => isset($post_data["user_passport_flag"]) ? $post_data["user_passport_flag"] : "",
						"USER_VISA_FLAG" => isset($post_data["user_visa_flag"]) ? $post_data["user_visa_flag"] : "",
						"USER_PROFILE_DOC" => $user_profile_doc,
						"USER_JOIN_ROUTE" => isset($post_data["user_join_route"]) ? $post_data["user_join_route"] : "",
						"USER_LEAVE_COUNTRY" => $post_data["user_leave_country"],
						"USER_LEAVE_HOTEL" => $post_data["user_leave_hotel"],
						"USER_MANAGER_NAME" => $post_data["user_manager_name"],
						"USER_RECOMM_ID" => $post_data["user_recomm_id"],
						"USER_MEMO" => $post_data["user_memo"],
		);

		$result = $this->UserModel->editUser($updateArr, $post_data["user_seq"]);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "회원 정보 수정 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "회원 정보 수정중 문제가 생겼습니다."));
		}
	}

	public function userLevel(){
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
		$lists = $this->UserModel->getUserLevel($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->UserModel->getUserLevelCount($wheresql);
		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/user/userLevel", $listCount, 10, 5, $nowpage);
		//print_r($lists);
		$data = array(
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit
					);

		$this->load->view("/admin/user/user-level", $data);
	}

	public function LevelSaveProc(){
		$level_name = $this->input->post("level_name");
		$level_rank = $this->input->post("level_rank");
		$level_discount = $this->input->post("level_discount");
		$level_discount_unit = $this->input->post("level_discount_unit");
		$level_seq = $this->input->post("level_seq");

		$saveArr = array(
						"LEVEL_NAME" => $level_name,
						"LEVEL_RANK" => $level_rank,
						"LEVEL_DISCOUNT" => $level_discount,
						"LEVEL_DISCOUNT_UNIT" => $level_discount_unit
		);

		if ($level_seq == ""){
			$result = $this->UserModel->insertLevel($saveArr);
		}else{
			$result = $this->UserModel->updateLevel($saveArr, $level_seq);
		}

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "회원 등급 저장 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "회원 등급 저장중 문제가 생겼습니다."));
		}
	}

	public function LevelDeleteProc(){
		$level_seq = $this->input->post("level_seq");

		$result = $this->UserModel->updateLevel(array("LEVEL_DEL_YN"=>"y"), $level_seq);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "회원 등급 삭제 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "회원 등급 삭제중 문제가 생겼습니다."));
		}
	}

	public function getlevelInho(){
		$level_seq = $this->input->post("level_seq");

		$result = $this->UserModel->getLevel($level_seq);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "", "result" => $result));
		}else{
			echo json_encode(array("code" => "202", "msg" => "회원 등급 삭제중 문제가 생겼습니다."));
		}
	}

	public function userStatics(){
		$userAllCount = $this->UserModel->getUserlAllCount();
		$levRanks = $this->UserModel->getUserLevelStaics();
		$genRanks = $this->UserModel->getUserGenderStatics();
		$geneRanks = $this->UserModel->getUserStatics("GENERATION");
		$areaRank = $this->UserModel->getUserStatics("AREA");
		$joinRank = $this->UserModel->getUserStatics("USER_JOIN_ROUTE");
		$hopeRank = $this->UserModel->getUserStatics("USER_HOPE_NATION");
		$leaveRank = $this->UserModel->getUserStatics("USER_LEAVE_COUNTRY");
		$hopePartRank = $this->UserModel->getUserStatics("USER_HOPE_PART");
		$majorRank = $this->UserModel->getUserStatics("USER_MAJOR");
		//print_r($lev_rank);

		$data = array(
					"AllCount" => $userAllCount,
					"levRanks" => $levRanks,
					"genRanks" => $genRanks,
					"geneRanks" => $geneRanks,
					"areaRank" => $areaRank,
					"joinRank" => $joinRank,
					"hopeRank" => $hopeRank,
					"leaveRank" => $leaveRank,
					"hopePartRank" => $hopePartRank,
					"majorRank" => $majorRank
		);
		$this->load->view("/admin/user/user-statics", $data);
	}

	public function smsSend(){
		$limit = 30;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*30;
			$nowpage = $_GET["per_page"];
		}

		$reg_date_start = $this->input->get("reg_date_start");
		$reg_date_end = $this->input->get("reg_date_end");
		$last_login_start = $this->input->get("last_login_start");
		$last_login_end = $this->input->get("last_login_end");
		$user_skill_eng = $this->input->get("user_skill_eng");
		$user_skill_jp = $this->input->get("user_skill_jp");
		$user_skill_ch = $this->input->get("user_skill_ch");
		$user_study_nation = $this->input->get("user_study_nation");
		$user_study_term = $this->input->get("user_study_term");
		$user_lan_study_nation = $this->input->get("user_lan_study_nation");
		$user_lan_study_term = $this->input->get("user_lan_study_term");
		$user_level = $this->input->get("user_level");
		$search_field = $this->input->get("search_field");
		$search_string = $this->input->get("search_string");
		$user_sms_flag = $this->input->get("user_sms_flag");

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
						"user_level" => $user_level,
						"search_field" => $search_field,
						"search_string" => $search_string,
						"user_sms_flag" => $user_sms_flag,
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
		
		$queryString = "?reg_date_start=".$reg_date_start."&amp;reg_date_end=".$reg_date_end."&amp;last_login_start=".$last_login_start."&last_login_end=".$last_login_end."&user_skill_eng".$user_skill_eng."&user_skill_jp=".$user_skill_jp."&user_skill_ch=".$user_skill_ch."&user_study_nation=".$user_study_nation."&user_study_term=".$user_study_term."&user_lan_study_nation=".$user_lan_study_nation."&user_lan_study_term=".$user_lan_study_term."&user_level=".$user_level."&search_field=".$search_field."&search_string=".$search_string."&user_sms_flag=".$user_sms_flag;
		$pagination = $this->customclass->pagenavi("/admin/user/smsSend".$queryString, $listCount, 30, 5, $nowpage);
		//print_r($listCount);
		$levels = $this->UserModel->getUserLevelAll();
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
					"user_level" => $user_level,
					"search_field" => $search_field,
					"search_string" => $search_string,
					"user_sms_flag" => $user_sms_flag,
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit,
					"levels" => $levels
					);
		$this->load->view("/admin/user/user-sms-send", $data);
	}

	public function smsSendProc(){
		$user_seq_arr = $this->input->post("user_seq_arr");
		$send_message = $this->input->post("send_message");
		//print_r($this->input->post());
		/*
		$wheresql = array(
						"reg_date_start" => $reg_date_start,
						"reg_date_end" => $reg_date_end,
						"user_level" => $user_level,
						"search_field" => $search_field,
						"search_string" => $search_string,
						"user_email_flag" => $user_email_flag,
						);
		*/
		$wheresql = array(
						"user_seq_arr" => $user_seq_arr
		);
		//print_r($wheresql);
		//exit;
		$lists = $this->UserModel->getUserAll($wheresql);
		//echo $this->db->last_query();
		//print_r($lists);
		//exit; 
		if (!empty($lists)){
			
			foreach ($lists as $list){
				#print_r($list);
				/*
				//카카오톡
				$sendArr = array(
								"SENDER_KEY" => "testSendKey",
								"PHONE" => $list->USER_HP,
								"TMPL_CD" => "TEST1234",
								"SEND_MSG" => $send_message,
								"REQ_DATE" => date("y-m-d h:i:s"),
								"CUR_STATE" => "0",
								"SMS_TYPE" => "S"
								);
				print_r($sendArr);
				
				*/

				// SMS 전송
				if (strlen($send_message) <= 80){
					$sendArr = array(
									"CUR_STATE" => 0,
									"REQ_DATE" => date("Y-m-d H:i:s"),
									"CALL_FROM" => "0220529700",
									"CALL_TO" => str_replace("-", "", $list->USER_HP),
									"SMS_TXT" => $send_message,
									"MSG_TYPE" => 4
					);
					$this->UserModel->setMsgData($sendArr);
				}else{
					$sendArr = array(
									"FILE_CNT" => 1,
									"MMS_BODY" => $send_message,
									"MMS_SUBJECT" => substr($send_message, 0, 10)
					);
					$this->UserModel->setMMSData($sendArr);
					$cont_seq = $this->db->insert_id();

					$smsArr = array(
									"CUR_STATE" => 0,
									"REQ_DATE" => date("Y-m-d H:i:s"),
									"CALL_FROM" => "0220529700",
									"CALL_TO" => str_replace("-", "", $list->USER_HP),
									"SMS_TXT" => $send_message,
									"MSG_TYPE" => 6,
									"CONT_SEQ" => $cont_seq
					);

					$this->UserModel->setMsgData($smsArr);
				}
				


				$insertArr = array(
								"CLOG_MANAGER_NAME" => $this->session->userdata("admin_name"),
								"CLOG_USER_SEQ" => $list->USER_SEQ,
								"CLOG_USER_NAME" => $list->USER_NAME,
								"CLOG_USER_COMPANY" => $list->USER_COMPANY,
								"CLOG_USER_NUMBER" => $list->USER_NUMBER,
								"CLOG_MESSAGE" => "SMS발송 - ".$send_message,
								"CLOG_CONSULT_DATE" => date("y-m-d h:i:s"),
								"CLOG_INTEREST" => 1,
								"CLOG_LANG_SKILL" => 1,
								"CLOG_REG_DATE" => date("Y-m-d H:i:s"),
								"CLOG_REG_IP" => $_SERVER["REMOTE_ADDR"],
								"CLOG_DEL_YN" => "N"
								);

				$result = $this->UserModel->insertUserCallMsg($insertArr);
				
			}
		}

		echo json_encode(array("code" => "200", "msg" => "발송 저장 되었습니다."));
	}

	public function userCallMsg($user_seq){
		$limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$wheresql = array(
						"user_seq" => $user_seq,
						"start" => $start,
						"limit" => $limit
						);
		$lists = $this->UserModel->getUserCallMsg($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->UserModel->getUserCallMsgCount($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/user/userCallMsg/".$user_seq, $listCount, 10, 5, $nowpage);

		$user_info = $this->UserModel->getUserInfo($user_seq);
		$data = array(
			"user_info" => $user_info,
			"lists" => $lists,
			"listCount" => $listCount,
			"pagination" => $pagination,
			"pagenum" => $pagenum,
			"start" => $start,
			"limit" => $limit
			);
		$this->load->view("/admin/user/user-call-log", $data);
	}

	public function userCallMsgProc(){
		$manager_name = $this->input->post("manager_name");
		$user_seq = $this->input->post("user_seq");
		$user_name = $this->input->post("user_name");
		$user_company = $this->input->post("user_company");
		$consult_date = $this->input->post("consult_date");
		$call_message = $this->input->post("call_message");
		$interest = $this->input->post("interest");
		$lang_skill = $this->input->post("lang_skill");
		$clog_seq = $this->input->post("clog_seq");
		$clog_mode = $this->input->post("clog_mode");

		if ($clog_mode == ""){
			$insertArr = array(
								"CLOG_MANAGER_NAME" => $manager_name,
								"CLOG_USER_SEQ" => $user_seq,
								"CLOG_USER_NAME" => $user_name,
								"CLOG_USER_COMPANY" => $user_company,
								"CLOG_MESSAGE" => $call_message,
								"CLOG_CONSULT_DATE" => $consult_date,
								"CLOG_INTEREST" => $interest,
								"CLOG_LANG_SKILL" => $lang_skill,
								"CLOG_REG_DATE" => date("Y-m-d H:i:s"),
								"CLOG_REG_IP" => $_SERVER["REMOTE_ADDR"],
								"CLOG_DEL_YN" => "N"
								);

			$result = $this->UserModel->insertUserCallMsg($insertArr);

			if ($result == true){
				echo json_encode(array("code" => "200", "msg" => "회원 통화내역 저장 완료되었습니다."));
			}else{
				echo json_encode(array("code" => "202", "msg" => "회원 통화내역 저장중 문제가 생겼습니다."));
			}
		}else if ($clog_mode == "modify"){
			$updateArr = array(
								"CLOG_MANAGER_NAME" => $manager_name,
								"CLOG_USER_SEQ" => $user_seq,
								"CLOG_USER_NAME" => $user_name,
								"CLOG_USER_COMPANY" => $user_company,
								"CLOG_MESSAGE" => $call_message,
								"CLOG_CONSULT_DATE" => $consult_date,
								"CLOG_INTEREST" => $interest,
								"CLOG_LANG_SKILL" => $lang_skill,
								);

			$result = $this->UserModel->updateUserCallMsg($updateArr, $clog_seq);

			if ($result == true){
				echo json_encode(array("code" => "200", "msg" => "회원 통화내역 수정 완료되었습니다."));
			}else{
				echo json_encode(array("code" => "202", "msg" => "회원 통화내역 수정중 문제가 생겼습니다."));
			}
		}
	}

	public function deleteCallMsg(){
		$clog_seq = $this->input->post("clog_seq");

		$result = $this->UserModel->delCallLog($clog_seq);
		//echo $this->db->last_query();
		//print_r($result);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "", "result" => $result));
		}else{
			echo json_encode(array("code" => "202", "msg" => "통화내역 불러오는중 문제가 생겼습니다."));
		}
	}

	public function getCallMsg(){
		$clog_seq = $this->input->post("clog_seq");

		$result = $this->UserModel->getCallLog($clog_seq);
		//echo $this->db->last_query();
		//print_r($result);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "", "result" => $result));
		}else{
			echo json_encode(array("code" => "202", "msg" => "통화내역 불러오는중 문제가 생겼습니다."));
		}
	}

	public function mailFormList(){
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
		$lists = $this->UserModel->getMailFormLists($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->UserModel->getMailFormListCount($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/user/mailFormList/", $listCount, 10, 5, $nowpage);

		$data = array(
			"lists" => $lists,
			"listCount" => $listCount,
			"pagination" => $pagination,
			"pagenum" => $pagenum,
			"start" => $start,
			"limit" => $limit
			);
		$this->load->view("/admin/user/mailform-list", $data);
	}

	public function mailFormWrite(){
		$data = array();

		$this->load->view("/admin/user/mailform-write", $data);
	}

	public function mailFormWriteProc(){
		$mf_code = $this->input->post("mf_code");
		$mf_name = $this->input->post("mf_name");
		$mf_body = $this->input->post("mf_body");

		$insertArr = array(
							"MF_CODE" => $mf_code,
							"MF_NAME" => $mf_name,
							"MF_BODY" => $mf_body,
							"MF_DEL_YN" => "N"
							);

		$result = $this->UserModel->insertMailForm($insertArr);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "메일폼 등록 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "메일폼 등록중 문제가 생겼습니다."));
		}
	}

	public function mailformModify($mf_seq){
		$info = $this->UserModel->getMailForm($mf_seq);
		//print_r($info);
		$data = array(
				"info" => $info
		);

		$this->load->view("/admin/user/mailform-modify", $data);
	}

	public function mailFormModifyProc(){
		$mf_seq = $this->input->post("mf_seq");
		$mf_code = $this->input->post("mf_code");
		$mf_name = $this->input->post("mf_name");
		$mf_body = $this->input->post("mf_body");

		$updateArr = array(
							"MF_CODE" => $mf_code,
							"MF_NAME" => $mf_name,
							"MF_BODY" => $mf_body,
							);

		$result = $this->UserModel->updateMailForm($updateArr, $mf_seq);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "메일폼 수정 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "메일폼 수정중 문제가 생겼습니다."));
		}
	}

	public function mailFormDelProc(){
		$mf_seq = $this->input->post("mf_seq");

		$result = $this->UserModel->delMailForm($mf_seq);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "메일폼 삭제 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "메일폼 삭제중 문제가 생겼습니다."));
		}
	}

	public function emailSend(){
		$limit = 5;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$reg_date_start = $this->input->get("reg_date_start");
		$reg_date_end = $this->input->get("reg_date_end");
		$user_level = $this->input->get("user_level");
		$search_field = $this->input->get("search_field");
		$search_string = $this->input->get("search_string");
		$user_email_flag = $this->input->get("user_email_flag");

		$wheresql = array(
						"reg_date_start" => $reg_date_start,
						"reg_date_end" => $reg_date_end,
						"user_level" => $user_level,
						"search_field" => $search_field,
						"search_string" => $search_string,
						"user_email_flag" => $user_email_flag,
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

		$pagination = $this->customclass->pagenavi("/admin/user/emailSend", $listCount, 10, 5, $nowpage);
		//print_r($listCount);
		$levels = $this->UserModel->getUserLevelAll();
		$mailForms = $this->UserModel->getMailForms();
		//print_r($mailForms);
		$data = array(
					"reg_date_start" => $reg_date_start,
					"reg_date_end" => $reg_date_end,
					"user_level" => $user_level,
					"search_field" => $search_field,
					"search_string" => $search_string,
					"user_email_flag" => $user_email_flag,
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit,
					"levels" => $levels,
					"mailForms" => $mailForms
					);
		$this->load->view("/admin/user/user-email-send", $data);
	}

	public function getMailForm(){
		$mf_seq = $this->input->post("mf_seq");

		$result = $this->UserModel->getMailForm($mf_seq);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "", "result" => $result));
		}else{
			echo json_encode(array("code" => "202", "msg" => "메일폼 불러오는중 문제가 생겼습니다."));
		}
	}

	public function mailSend(){
		$mf_body = $this->input->post("mf_body");
		$send_start = $this->input->post("send_start");
		$send_end = $this->input->post("send_end");
		$send_subject = $this->input->post("send_subject");
		$flag = $this->input->post("flag");

		$reg_date_start = $this->input->post("reg_date_start");
		$reg_date_end = $this->input->post("reg_date_end");
		$user_level = $this->input->post("user_level");
		$search_field = $this->input->post("search_field");
		$search_string = $this->input->post("search_string");
		$user_email_flag = $this->input->post("user_email_flag");

		if ($flag == "userSend"){
			$wheresql = array(
							"reg_date_start" => $reg_date_start,
							"reg_date_end" => $reg_date_end,
							"user_level" => $user_level,
							"search_field" => $search_field,
							"search_string" => $search_string,
							"user_email_flag" => $user_email_flag,
							"start" => $send_start,
							"limit" => $send_end-$send_start
							);
			$lists = $this->UserModel->getUsers($wheresql);

			foreach ($lists as $list){

			}
		}else if ($flag == "testSend"){
			$mail_body = str_replace("{DATE}", date("Y-m-d"), $mf_body);
			$mail_body = str_replace("{MEM_ID}", "TEST_ADMIN", $mail_body);
			$mail_body = str_replace("{MEM_PW}", "TEST_PW", $mail_body);
			$mail_body = str_replace("{MEM_NAME}", "관리자", $mail_body);
			$mail_body = str_replace("{SITE_NAME}", "호스코", $mail_body);
			$mail_body = str_replace("{SITE_EMAIL}", "hosko-email", $mail_body);
			$mail_body = str_replace("{SITE_TEL}", "010-0000-0000", $mail_body);
			$mail_body = str_replace("{SITE_URL}", "http://hoskoweb.cafe24.com", $mail_body);
			echo $mail_body;
			$this->SendMail("inho4864@withnetworks.com", $send_subject, $mail_body);
		}

		echo json_encode(array("code" => "200", "msg" => "메일 전송 완료되었습니다."));
	}

	public function SendMail($mail_addr, $subject, $contents){
		$this->load->library('email');

		$config['protocol'] = 'smtp';
		$config['wordwrap'] = TRUE;
		$config['charset'] = 'utf-8';
		$config['mailtype'] = "html";
		$config['smtp_host'] = "smtp.mailplug.co.kr";
		$config['smtp_user'] = "inho4864@withnetworks.com";
		$config['smtp_pass'] = "with!2009";
		$config['smtp_port'] = "465";
		$config['newline'] = "\r\n";
		$config['crlf'] = "\r\n";

		$this->email->initialize($config);

		$this->email->from('hosko@hospitalitykorea.com', '호스코 관리자');
		$this->email->to($mail_addr);

		$this->email->subject($subject);
		$this->email->message($contents);

		$this->email->send();

		echo $this->email->print_debugger();
	}
}
