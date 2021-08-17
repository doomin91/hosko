<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypage extends CI_Controller {

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

		$this->customclass->userCheck();
    }

    public function memberEdit(){

		$info = $this->UserModel->getUserInfo($this->session->userdata("USER_SEQ"));

		$data = array(
					"info" => $info
		);

        $this->load->view("/mypage/member-edit", $data);
    }
	public function memberEditProc(){
		$user_name = $this->input->post("user_name");
		$user_email = $this->input->post("user_email");
		//$user_email1 = $this->input->post("user_email1");
		//$user_email2 = $this->input->post("user_email2");
		//$user_email = $user_email1 . "@" . $user_email2;
		$user_mail_flag = $this->input->post("user_mail_flag");
		$user_sex = $this->input->post("user_sex");
		$user_birthday = $this->input->post("user_birthday");
		$user_tel = $this->input->post("user_tel");
		//$tel1 = $this->input->post("tel1");
		//$tel2 = $this->input->post("tel2");
		//$tel3 = $this->input->post("tel3");
		//$user_tel = $tel1."-".$tel2."-".$tel3;
		$user_hp = $this->input->post("user_hp");
		//$hp1 = $this->input->post("hp1");
		//$hp2 = $this->input->post("hp2");
		//$hp3 = $this->input->post("hp3");
		//$user_hp = $hp1."-".$hp2."-".$hp3;
		$user_sms_flag = $this->input->post("user_sms_flag");
		$user_skype_id = $this->input->post("user_skype_id");
		$user_company = $this->input->post("user_company");
		$user_department = $this->input->post("user_department");
		$user_major = $this->input->post("user_major");
		$user_zip = $this->input->post("user_zip");
		$user_addr1 = $this->input->post("user_addr1");
		$user_addr2 = $this->input->post("user_addr2");
		$user_hope_nation = $this->input->post("user_hope_nation");
		$user_hope_part = $this->input->post("user_hope_part");
		$user_skill_eng = $this->input->post("user_skill_eng");
		$user_skill_jp = $this->input->post("user_skill_jp");
		$user_skill_ch = $this->input->post("user_skill_ch");
		$user_study_nation = $this->input->post("user_study_nation");
		$user_study_term = $this->input->post("user_study_term");
		$user_lan_study_nation = $this->input->post("user_lan_study_nation");
		$user_lan_study_term = $this->input->post("user_lan_study_term");
		$user_work_company = $this->input->post("user_work_company");
		$user_work_term = $this->input->post("user_work_term");
		$user_work_company2 = $this->input->post("user_work_company_2");
		$user_work_term2 = $this->input->post("user_work_term_2");
		$user_work_company3 = $this->input->post("user_work_company_3");
		$user_work_term3 = $this->input->post("user_work_term_3");
		$user_certi_flag = $this->input->post("user_certi_flag");
		$user_certificate_name = $this->input->post("user_certificate_name");
		$user_passport_flag = $this->input->post("user_passport_flag");
		$user_visa_flag = $this->input->post("user_visa_flag");
		$user_recomm_id = $this->input->post("user_recomm_id");
		$user_join_route = $this->input->post("user_join_route");
		$user_join_route_str = $this->input->post("user_join_route_str");
		
		//print_r($this->input->post());

		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/profile/";
		$config["allowed_types"] = "xls|xlsx|ppt|pptx|gif|jpg|png|hwp|doc|bmp|jpeg|zip|GIF|JPG|PNG|JPEG";
		$new_name = $this->session->userdata("USER_ID") . "_img_" . date("YmdHis");
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
		
		$updateArr = array(
						"USER_NAME" => $user_name,
						"USER_SEX" => $user_sex,
						"USER_PROFILE" => $user_profile_path,
						"USER_BIRTHDAY" => $user_birthday,
						"USER_ZIPCODE" => $user_zip,
						"USER_ADDR1" => $user_addr1,
						"USER_ADDR2" => $user_addr2,
						"USER_TEL" => $user_tel,
						"USER_HP" => $user_hp,
						"USER_EMAIL" => $user_email,
						"USER_EMAIL_FLAG" => $user_mail_flag,
						"USER_SMS_FLAG" => $user_sms_flag,
						"USER_SKYPE_ID" => $user_skype_id,
						"USER_COMPANY" => $user_company,
						"USER_DEPARTMENT" => $user_department,
						"USER_MAJOR" => $user_major,
						"USER_HOPE_NATION" => $user_hope_nation,
						"USER_HOPE_PART" => $user_hope_part,
						"USER_SKILL_ENG" => $user_skill_eng,
						"USER_SKILL_JP" => $user_skill_jp,
						"USER_SKILL_CH" => $user_skill_ch,
						"USER_STUDY_NATION" => $user_study_nation,
						"USER_STUDY_TERM" => $user_study_term,
						"USER_LAN_STUDY_NATION" => $user_lan_study_nation,
						"USER_LAN_STUDY_TERM" => $user_lan_study_term,
						"USER_WORK_COMPANY" => $user_work_company,
						"USER_WORK_TERM" => $user_work_term,
						"USER_WORK_COMPANY_2" => $user_work_company2,
						"USER_WORK_TERM_2" => $user_work_term2,
						"USER_WORK_COMPANY_3" => $user_work_company3,
						"USER_WORK_TERM_3" => $user_work_term3,
						"USER_CERTI_FLAG" => $user_certi_flag,
						"USER_CERTIFICATE_NAME" => $user_certificate_name,
						"USER_PASSPORT_FLAG" => $user_passport_flag,
						"USER_VISA_FLAG" => $user_visa_flag,
						"USER_PROFILE_DOC" => $user_profile_doc_path,
						"USER_JOIN_ROUTE" => $user_join_route,
						"USER_JOIN_ROUTE_STR" => $user_join_route_str,
						"USER_RECOMM_ID" => $user_recomm_id
		);
		$result = $this->UserModel->editUser($updateArr, 
		$this->session->userdata("USER_SEQ"));
		
		//echo $this->db->last_query();

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "회원 정보 수정 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "회원 정보 수정중 문제가 생겼습니다."));
		}
	}

	public function memberResumeRegist(){
		$my_resume = $this->UserModel->getUserResume($this->session->userdata("USER_SEQ"));

		if($my_resume){
			// print_r($my_resume);
			$DATA["RESUME_INFO"] = $my_resume;
			$DATA["RESUME_EDU"] = $this->UserModel->getUserResumeEducation($my_resume->RESUME_SEQ);
			$DATA["RESUME_WEXP"] = $this->UserModel->getUserResumeWorkExp($my_resume->RESUME_SEQ);
			$DATA["RESUME_ACT"] = $this->UserModel->getUserResumeActivity($my_resume->RESUME_SEQ);
			$DATA["RESUME_ACHV"] = $this->UserModel->getUserResumeAchiv($my_resume->RESUME_SEQ);
			$DATA["RESUME_SKIL"] = $this->UserModel->getUserResumeSkill($my_resume->RESUME_SEQ);
			$DATA["RESUME_LANG"] = $this->UserModel->getUserResumeLanguage($my_resume->RESUME_SEQ);
		}else{
			$DATA["MY_INFO"] = $this->UserModel->getUserInfo($this->session->userdata("USER_SEQ"));
		}
		$this->load->view("/mypage/member-resume_register", $DATA);
	}
	
	public function memberResumeRegistProc(){
		$user_seq = isset($_POST["user_seq"]) ? $_POST["user_seq"] : "";
		$resume_title = isset($_POST["resume_title"]) ? $_POST["resume_title"] : "";
		$resume_user_name = isset($_POST["resume_user_name"]) ? $_POST["resume_user_name"] : "";
		$resume_user_zipcode = isset($_POST["resume_user_zipcode"]) ? $_POST["resume_user_zipcode"] : "";
		$resume_user_addr1 = isset($_POST["resume_user_addr1"]) ? $_POST["resume_user_addr1"] : "";
		$resume_user_addr2 = isset($_POST["resume_user_addr2"]) ? $_POST["resume_user_addr2"] : "";
		$resume_user_phone = isset($_POST["resume_user_phone"]) ? $_POST["resume_user_phone"] : "";
		$resume_user_email = isset($_POST["resume_user_email"]) ? $_POST["resume_user_email"] : "";
		$resume_user_skype_id = isset($_POST["resume_user_skype_id"]) ? $_POST["resume_user_skype_id"] : "";
		$resume_user_age = isset($_POST["resume_user_age"]) ? $_POST["resume_user_age"] : "";
		$resume_user_dob = isset($_POST["resume_user_dob"]) ? $_POST["resume_user_dob"] : "";
		$resume_user_nationality = isset($_POST["resume_user_nationality"]) ? $_POST["resume_user_nationality"] : "";
		$resume_user_martial_status = isset($_POST["resume_user_martial_status"]) ? $_POST["resume_user_martial_status"] : "";
		$resume_user_ic_number = isset($_POST["resume_user_ic_number"]) ? $_POST["resume_user_ic_number"] : "";
		$resume_user_permanent_residence = isset($_POST["resume_user_permanent_residence"]) ? $_POST["resume_user_permanent_residence"] : "";
		$resume_user_religion = isset($_POST["resume_user_religion"]) ? $_POST["resume_user_religion"] : "";
		$resume_user_dog = isset($_POST["resume_user_dog"]) ? $_POST["resume_user_dog"] : "";
		$resume_user_height = isset($_POST["resume_user_height"]) ? $_POST["resume_user_height"] : "";
		$resume_user_weight = isset($_POST["resume_user_weight"]) ? $_POST["resume_user_weight"] : "";
		$resume_user_hobby = isset($_POST["resume_user_hobby"]) ? $_POST["resume_user_hobby"] : "";
		$resume_user_criminal_record = isset($_POST["resume_user_criminal_record"]) ? $_POST["resume_user_criminal_record"] : "";
		$redu_date = isset($_POST["redu_date"]) ? json_decode($_POST["redu_date"]) : array();
		$redu_description = isset($_POST["redu_description"]) ? json_decode($_POST["redu_description"]) : array();
		$rwexp_date = isset($_POST["rwexp_date"]) ? json_decode($_POST["rwexp_date"]) : array();
		$rwexp_description = isset($_POST["rwexp_description"]) ? json_decode($_POST["rwexp_description"]) : array();
		$ract_date = isset($_POST["ract_date"]) ? json_decode($_POST["ract_date"]) : array();
		$ract_description = isset($_POST["ract_description"]) ? json_decode($_POST["ract_description"]) : array();
		$rahcv_title = isset($_POST["rahcv_title"]) ? json_decode($_POST["rahcv_title"]) : array();
		$rahcv_description = isset($_POST["rahcv_description"]) ? json_decode($_POST["rahcv_description"]) : array();
		$rskil_date = isset($_POST["rskil_date"]) ? json_decode($_POST["rskil_date"]) : array();
		$rskil_description = isset($_POST["rskil_description"]) ? json_decode($_POST["rskil_description"]) : array();
		$rlang_name = isset($_POST["rlang_name"]) ? json_decode($_POST["rlang_name"]) : array();
		$rlang_speaking = isset($_POST["rlang_speaking"]) ? json_decode($_POST["rlang_speaking"]) : array();
		$rlang_writing = isset($_POST["rlang_writing"]) ? json_decode($_POST["rlang_writing"]) : array();
		$resume_user_computer_skill = isset($_POST["resume_user_computer_skill"]) ? json_decode($_POST["resume_user_computer_skill"]) : "";

		$insertArr = array(
			"USER_SEQ" => $user_seq,
			"RESUME_TITLE" => $resume_title,
			"RESUME_USER_NAME" => $resume_user_name,
			"RESUME_USER_ZIPCODE" => $resume_user_zipcode,
			"RESUME_USER_ADDR1" => $resume_user_addr1,
			"RESUME_USER_ADDR2" => $resume_user_addr2,
			"RESUME_USER_PHONE" => $resume_user_phone,
			"RESUME_USER_EMAIL" => $resume_user_email,
			"RESUME_USER_SKYPE_ID" => $resume_user_skype_id,
			"RESUME_USER_AGE" => $resume_user_age,
			"RESUME_USER_DOB" => $resume_user_dob,
			"RESUME_USER_NATIONALITY" => $resume_user_nationality,
			"RESUME_USER_MARTIAL_STATUS" => $resume_user_martial_status,
			"RESUME_USER_IC_NUMBER" => $resume_user_ic_number,
			"RESUME_USER_PERMANENT_RESIDENCE" => $resume_user_permanent_residence,
			"RESUME_USER_RELIGION" => $resume_user_religion,
			"RESUME_USER_DOG" => $resume_user_dog,
			"RESUME_USER_HEIGHT" => $resume_user_height,
			"RESUME_USER_WEIGHT" => $resume_user_weight,
			"RESUME_USER_HOBBY" => $resume_user_hobby,
			"RESUME_USER_CRIMINAL_RECORD" => $resume_user_criminal_record,
			"RESUME_USER_COMPUTER_SKILL" => $resume_user_computer_skill
		);

		$result = $this->UserModel->createUserResume($insertArr);
		
		$resume_id = $this->db->insert_id();
		
		foreach ($redu_date as $key => $edu_date){
			$insertArr = array(
							"RESUME_SEQ" => $resume_id,
							"REDU_DATE" => $edu_date,
							"REDU_DESCRIPTION" => $redu_description[$key]
						);

			$this->UserModel->createUserResumeEducation($insertArr);
		}
		foreach ($rwexp_date as $key => $exp_date){
			$insertArr = array(
				"RESUME_SEQ" => $resume_id,
				"RWEXP_DATE" => $exp_date,
				"RWEXP_DESCRIPTION" => $rwexp_description[$key]
			);
			
			$this->UserModel->createUserResumeWorkExp($insertArr);
		}
		foreach ($ract_date as $key => $act_date){
			$insertArr = array(
				"RESUME_SEQ" => $resume_id,
				"RACT_DATE" => $act_date,
				"RACT_DESCRIPTION" => $ract_description[$key]	
			);

			$this->UserModel->createUserResumeActivity($insertArr);
		}
		
		foreach ($rahcv_title as $key => $ahcv_title){
			$insertArr = array(
				"RESUME_SEQ" => $resume_id,
				"RACHV_TITLE" => $ahcv_title,
				"RACHV_DESCRIPTION" => $rahcv_description[$key]
			);

			$this->UserModel->createUserResumeAchiv($insertArr);
		}
		foreach ($rskil_date as $key => $skill_date){
			$insertArr = array(
				"RESUME_SEQ" => $resume_id,
				"RSKL_DATE" => $skill_date,
				"RSKL_DESCRIPTION" => $rskil_description[$key]
			);

			$this->UserModel->createUserResumeSkill($insertArr);
		}

		foreach ($rlang_name as $key => $lang_date){
			$insertArr = array(
				"RESUME_SEQ" => $resume_id,
				"RLANG_NAME" => $lang_date,
				"RLANG_SPEAKING" => $rlang_speaking[$key],
				"RLANG_WRITING" => $rlang_writing[$key]
			);

			$this->UserModel->createUserResumeLanguage($insertArr);
		}

		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/resume/";
		$config["allowed_types"] = "jpg|png|jpeg|JPG|PNG|JPEG";
		$new_name = "resume_". $resume_id . "_img_" . date("YmdHis");
		$config["file_name"] = $new_name;
		$this->load->library("upload", $config);

		$this->upload->initialize($config);

		$resume_img = "";
		$resume_img_path = "";
		// print_r($_FILES['resume_img']['name']);
		if (isset($_FILES['resume_img']['name'])) {
			if (0 < $_FILES['resume_img']['error']) {
				echo 'Error during file upload' . $_FILES['resume_img']['error'];
			} else {
				if (file_exists('upload/resume/' . $_FILES['resume_img']['name'])) {
					echo 'File already exists : upload/resume/' . $_FILES['resume_img']['name'];
				} else {
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('resume_img')) {
						echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$resume_img = $_FILES['resume_img']['name'];
						$resume_img_path = "/upload/resume/".$this->upload->data("file_name");
					}
				}
			}
		} else {
			//echo 'Please choose a file';
		}

		$updateArr = array(
						"RESUME_USER_PHOTO" => $resume_img_path
					);

		$result = $this->UserModel->updateUserResume($updateArr, $resume_id);

		//echo $this->db->last_query();

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "이력서가 작성되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "이력서 작성중 문제가 생겼습니다."));
		}


	}

	public function memberResumeUpdateProc(){		
		$resume_seq = isset($_POST["resume_seq"]) ? $_POST["resume_seq"] : "";
		$resume_title = isset($_POST["resume_title"]) ? $_POST["resume_title"] : "";
		$resume_user_name = isset($_POST["resume_user_name"]) ? $_POST["resume_user_name"] : "";
		$resume_user_zipcode = isset($_POST["resume_user_zipcode"]) ? $_POST["resume_user_zipcode"] : "";
		$resume_user_addr1 = isset($_POST["resume_user_addr1"]) ? $_POST["resume_user_addr1"] : "";
		$resume_user_addr2 = isset($_POST["resume_user_addr2"]) ? $_POST["resume_user_addr2"] : "";
		$resume_user_phone = isset($_POST["resume_user_phone"]) ? $_POST["resume_user_phone"] : "";
		$resume_user_email = isset($_POST["resume_user_email"]) ? $_POST["resume_user_email"] : "";
		$resume_user_skype_id = isset($_POST["resume_user_skype_id"]) ? $_POST["resume_user_skype_id"] : "";
		$resume_user_age = isset($_POST["resume_user_age"]) ? $_POST["resume_user_age"] : "";
		$resume_user_dob = isset($_POST["resume_user_dob"]) ? $_POST["resume_user_dob"] : "";
		$resume_user_nationality = isset($_POST["resume_user_nationality"]) ? $_POST["resume_user_nationality"] : "";
		$resume_user_martial_status = isset($_POST["resume_user_martial_status"]) ? $_POST["resume_user_martial_status"] : "";
		$resume_user_ic_number = isset($_POST["resume_user_ic_number"]) ? $_POST["resume_user_ic_number"] : "";
		$resume_user_permanent_residence = isset($_POST["resume_user_permanent_residence"]) ? $_POST["resume_user_permanent_residence"] : "";
		$resume_user_religion = isset($_POST["resume_user_religion"]) ? $_POST["resume_user_religion"] : "";
		$resume_user_dog = isset($_POST["resume_user_dog"]) ? $_POST["resume_user_dog"] : "";
		$resume_user_height = isset($_POST["resume_user_height"]) ? $_POST["resume_user_height"] : "";
		$resume_user_weight = isset($_POST["resume_user_weight"]) ? $_POST["resume_user_weight"] : "";
		$resume_user_hobby = isset($_POST["resume_user_hobby"]) ? $_POST["resume_user_hobby"] : "";
		$resume_user_criminal_record = isset($_POST["resume_user_criminal_record"]) ? $_POST["resume_user_criminal_record"] : "";
		$redu_seq = isset($_POST["redu_seq"]) ? json_decode($_POST["redu_seq"]) : array();
		$redu_date = isset($_POST["redu_date"]) ? json_decode($_POST["redu_date"]) : array();
		$redu_description = isset($_POST["redu_description"]) ? json_decode($_POST["redu_description"]) : array();
		$rwexp_seq = isset($_POST["rwexp_seq"]) ? json_decode($_POST["rwexp_seq"]) : array();
		$rwexp_date = isset($_POST["rwexp_date"]) ? json_decode($_POST["rwexp_date"]) : array();
		$rwexp_description = isset($_POST["rwexp_description"]) ? json_decode($_POST["rwexp_description"]) : array();
		$ract_seq = isset($_POST["ract_seq"]) ? json_decode($_POST["ract_seq"]) : array();
		$ract_date = isset($_POST["ract_date"]) ? json_decode($_POST["ract_date"]) : array();
		$ract_description = isset($_POST["ract_description"]) ? json_decode($_POST["ract_description"]) : array();
		$rahcv_seq = isset($_POST["rahcv_seq"]) ? json_decode($_POST["rahcv_seq"]) : array();
		$rahcv_title = isset($_POST["rahcv_title"]) ? json_decode($_POST["rahcv_title"]) : array();
		$rahcv_description = isset($_POST["rahcv_description"]) ? json_decode($_POST["rahcv_description"]) : array();
		$rskil_seq = isset($_POST["rskil_seq"]) ? json_decode($_POST["rskil_seq"]) : array();
		$rskil_date = isset($_POST["rskil_date"]) ? json_decode($_POST["rskil_date"]) : array();
		$rskil_description = isset($_POST["rskil_description"]) ? json_decode($_POST["rskil_description"]) : array();
		$rlang_seq = isset($_POST["rlang_seq"]) ? json_decode($_POST["rlang_seq"]) : array();
		$rlang_name = isset($_POST["rlang_name"]) ? json_decode($_POST["rlang_name"]) : array();
		$rlang_speaking = isset($_POST["rlang_speaking"]) ? json_decode($_POST["rlang_speaking"]) : array();
		$rlang_writing = isset($_POST["rlang_writing"]) ? json_decode($_POST["rlang_writing"]) : array();
		$resume_user_computer_skill = isset($_POST["resume_user_computer_skill"]) ? $_POST["resume_user_computer_skill"] : "";

		$updateArr = array(
			"RESUME_TITLE" => $resume_title,
			"RESUME_USER_NAME" => $resume_user_name,
			"RESUME_USER_ZIPCODE" => $resume_user_zipcode,
			"RESUME_USER_ADDR1" => $resume_user_addr1,
			"RESUME_USER_ADDR2" => $resume_user_addr2,
			"RESUME_USER_PHONE" => $resume_user_phone,
			"RESUME_USER_EMAIL" => $resume_user_email,
			"RESUME_USER_SKYPE_ID" => $resume_user_skype_id,
			"RESUME_USER_AGE" => $resume_user_age,
			"RESUME_USER_DOB" => $resume_user_dob,
			"RESUME_USER_NATIONALITY" => $resume_user_nationality,
			"RESUME_USER_MARTIAL_STATUS" => $resume_user_martial_status,
			"RESUME_USER_IC_NUMBER" => $resume_user_ic_number,
			"RESUME_USER_PERMANENT_RESIDENCE" => $resume_user_permanent_residence,
			"RESUME_USER_RELIGION" => $resume_user_religion,
			"RESUME_USER_DOG" => $resume_user_dog,
			"RESUME_USER_HEIGHT" => $resume_user_height,
			"RESUME_USER_WEIGHT" => $resume_user_weight,
			"RESUME_USER_HOBBY" => $resume_user_hobby,
			"RESUME_USER_CRIMINAL_RECORD" => $resume_user_criminal_record,
			"RESUME_USER_COMPUTER_SKILL" => $resume_user_computer_skill
		);

		$result = $this->UserModel->updateUserResume($updateArr, $resume_seq);

		foreach ($redu_date as $key => $edu_date){
			if(count($redu_seq)-1 >= $key){
				$updateArr = array(
						"REDU_DATE" => $edu_date,
						"REDU_DESCRIPTION" => $redu_description[$key]
					);
				$this->UserModel->updateUserResumeEducation($updateArr, $redu_seq[$key]);
			}else{
				$insertArr = array(
						"RESUME_SEQ" => $resume_seq,
						"REDU_DATE" => $edu_date,
						"REDU_DESCRIPTION" => $redu_description[$key]
					);
				$this->UserModel->createUserResumeEducation($insertArr);
			}	
		}
		foreach ($rwexp_date as $key => $exp_date){
			if(count($rwexp_seq)-1 >= $key){
				$updateArr = array(
						"RWEXP_DATE" => $exp_date,
						"RWEXP_DESCRIPTION" => $rwexp_description[$key]
					);
				$this->UserModel->updateUserResumeWorkExp($updateArr, $rwexp_seq[$key]);
			}else{
				$insertArr = array(
						"RESUME_SEQ" => $resume_seq,
						"RWEXP_DATE" => $exp_date,
						"RWEXP_DESCRIPTION" => $rwexp_description[$key]
					);
				$this->UserModel->createUserResumeWorkExp($insertArr);
			}
		}
		foreach ($ract_date as $key => $act_date){
			if(count($ract_seq)-1 >= $key){
				$updateArr = array(
						"RACT_DATE" => $act_date,
						"RACT_DESCRIPTION" => $ract_description[$key]	
					);
				$this->UserModel->updateUserResumeActivity($updateArr, $ract_seq[$key]);
			}else{
				$insertArr = array(
						"RESUME_SEQ" => $resume_seq,
						"RACT_DATE" => $act_date,
						"RACT_DESCRIPTION" => $ract_description[$key]	
					);
				$this->UserModel->createUserResumeActivity($insertArr);
			}
		}
		
		foreach ($rahcv_title as $key => $ahcv_title){
			if(count($rahcv_seq)-1 >= $key){
				$updateArr = array(
						"RACHV_TITLE" => $ahcv_title,
						"RACHV_DESCRIPTION" => $rahcv_description[$key]
					);
				$this->UserModel->updateUserResumeAchiv($updateArr, $rahcv_seq[$key]);
			}else{
				$insertArr = array(
						"RESUME_SEQ" => $resume_seq,
						"RACHV_TITLE" => $ahcv_title,
						"RACHV_DESCRIPTION" => $rahcv_description[$key]
					);
				$this->UserModel->createUserResumeAchiv($insertArr);
			}
		}
		foreach ($rskil_date as $key => $skill_date){
			if(count($rskil_seq)-1 >= $key){
				$updateArr = array(
						"RSKL_DATE" => $skill_date,
						"RSKL_DESCRIPTION" => $rskil_description[$key]
					);
				$this->UserModel->updateUserResumeSkill($updateArr, $rskil_seq[$key]);
			}else{
				$insertArr = array(
						"RESUME_SEQ" => $resume_seq,
						"RSKL_DATE" => $skill_date,
						"RSKL_DESCRIPTION" => $rskil_description[$key]
					);
				$this->UserModel->createUserResumeSkill($insertArr);
			}
		}

		foreach ($rlang_name as $key => $lang_date){
			// print_r($rlang_speaking[$key]);
			// print_r($rlang_writing[$key]);
			// print_r($rlang_seq[$key]);
			if(count($rlang_seq)-1 >= $key){
				$updateArr = array(
						"RLANG_NAME" => $lang_date,
						"RLANG_SPEAKING" => $rlang_speaking[$key],
						"RLANG_WRITING" => $rlang_writing[$key]
					);
				$this->UserModel->updateUserResumeLanguage($updateArr, $rlang_seq[$key]);
			}else{
				$insertArr = array(
						"RESUME_SEQ" => $resume_seq,
						"RLANG_NAME" => $lang_date,
						"RLANG_SPEAKING" => $rlang_speaking[$key],
						"RLANG_WRITING" => $rlang_writing[$key]
					);
				$this->UserModel->createUserResumeLanguage($insertArr);
			}
		}

		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/resume/";
		$config["allowed_types"] = "jpg|png|jpeg|JPG|PNG|JPEG";
		$new_name = "resume_". $resume_seq . "_img_" . date("YmdHis");
		$config["file_name"] = $new_name;
		$this->load->library("upload", $config);

		$this->upload->initialize($config);

		$resume_img = "";
		$resume_img_path = "";
		// print_r($_FILES['resume_img']['name']);
		if (isset($_FILES['resume_img']['name'])) {
			if (0 < $_FILES['resume_img']['error']) {
				echo 'Error during file upload' . $_FILES['resume_img']['error'];
			} else {
				if (file_exists('upload/resume/' . $_FILES['resume_img']['name'])) {
					echo 'File already exists : upload/resume/' . $_FILES['resume_img']['name'];
				} else {
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('resume_img')) {
						echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$resume_img = $_FILES['resume_img']['name'];
						$resume_img_path = "/upload/resume/".$this->upload->data("file_name");
					}
				}
			}
		} else {
			//echo 'Please choose a file';
		}

		$updateArr = array(
						"RESUME_USER_PHOTO" => $resume_img_path
					);

		$result = $this->UserModel->updateUserResume($updateArr, $resume_seq);

		//echo $this->db->last_query();

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "이력서가 수정되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "이력서 수정중 문제가 생겼습니다."));
		}
	}

	public function memberResumeManage(){
		$my_admin_resume = $this->UserModel->getAdminUserResume($this->session->userdata("USER_SEQ"));
		$DATA = array();

		if($my_admin_resume){
			// print_r($my_resume);
			$DATA["RESUME_INFO"] = $my_admin_resume;
			$DATA["RESUME_EDU"] = $this->UserModel->getUserResumeEducation($my_admin_resume->ADMIN_RESUME_SEQ);
			$DATA["RESUME_WEXP"] = $this->UserModel->getUserResumeWorkExp($my_admin_resume->ADMIN_RESUME_SEQ);
			$DATA["RESUME_ACT"] = $this->UserModel->getUserResumeActivity($my_admin_resume->ADMIN_RESUME_SEQ);
			$DATA["RESUME_ACHV"] = $this->UserModel->getUserResumeAchiv($my_admin_resume->ADMIN_RESUME_SEQ);
			$DATA["RESUME_SKIL"] = $this->UserModel->getUserResumeSkill($my_admin_resume->ADMIN_RESUME_SEQ);
			$DATA["RESUME_LANG"] = $this->UserModel->getUserResumeLanguage($my_admin_resume->ADMIN_RESUME_SEQ);
		}

		$this->load->view("/mypage/member-resume_manage", $DATA);
	}

	public function submissionDoc(){

		$DATA = array();

		$this->load->view("/mypage/submission-doc", $DATA);
	}

}