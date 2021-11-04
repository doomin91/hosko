<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

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
    }

    function member_input_step1(){

        $this->load->view("/member/input_step1");
    }

    function member_input_step2(){

        $this->load->view("/member/input_step2");
    }

	function userIdCheck(){
		$user_id = $this->input->post("user_id");

		$result = $this->UserModel->idCheck($user_id);

		if (empty($result)){
			echo json_encode(array("code" => "200", "msg" => "사용할 수 있는 아이디입니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "이미 가입되어 있는 아이디입니다."));
		}

	}

	function userInsertProc(){
		//print_r($this->input->post());
		$user_id = $this->input->post("user_id");
		$user_pass = $this->input->post("user_pass");
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
		
		$idCheck = $this->UserModel->CheckUserId($user_id);
		if (!empty($idCheck)){
			echo json_encode(array("code" => "202", "msg" => "이미 등록되어 있는 아이디 입니다."));
			exit;
		}

		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/profile/";
		$config["allowed_types"] = "xls|xlsx|ppt|pptx|gif|jpg|png|hwp|doc|bmp|jpeg|zip|GIF|JPG|PNG|JPEG";
		$new_name = $user_id . "_img_" . date("YmdHis");
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
						"USER_NUMBER" => $user_number,
						"USER_LEVEL" => 9,
						"USER_ID" => $user_id,
						"USER_PASS" => md5($user_pass),
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
						"USER_RECOMM_ID" => $user_recomm_id,
						"USER_DEL_YN" => "N",
						"USER_REG_DATE" => date("Y-m-d"),
		);
		$result = $this->UserModel->insertUser($insertArr);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "회원 가입 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "회원 가입중 문제가 생겼습니다."));
		}
	}

	function member_input_step3(){

        $this->load->view("/member/input_step3");
    }

	function login(){
		//echo md5("1111");
        $this->load->view("/member/login");
    }

	function loginProc(){
		$user_id = $this->input->post("user_id");
		$user_pass = $this->input->post("user_pass");

		$userInfo = $this->UserModel->CheckUserId($user_id);

		if (!empty($userInfo)){
			if (md5($user_pass) == $userInfo->USER_PASS){
				//print_r($user);
				$session_data = array(
					"USER_SEQ" => $userInfo->USER_SEQ,
					"USER_ID" => $userInfo->USER_ID,
					"USER_NAME" => $userInfo->USER_NAME,
					"USER_EMAIL" => $userInfo->USER_EMAIL
				);
				$this->session->set_userdata($session_data);

				echo json_encode(array("code" => "200", "msg" => "로그인되었습니다."));
			}else{
				echo json_encode(array("code" => "202", "msg" => "비밀번호가 맞지 않습니다."));
			}
		}else{
			echo json_encode(array("code" => "202", "msg" => "아이디가 존재하지 않습니다."));
		}
	}

	public function idFind(){
		$this->load->view("/member/id_find");
	}

	public function idFindProc(){
		$user_name = $this->input->post("user_name");
		$user_email = $this->input->post("user_email");

		$result = $this->UserModel->getIdFind($user_name, $user_email);
		//echo $this->db->last_query();
		//print_r($result);
		if ($result == true){
			$user_id = $result->USER_ID;
			$str = "";
			for ($i=3; $i<strlen($user_id); $i++){
				$str .= "*";
			}
			$user_id = substr($user_id, 0, 3) . $str;
			echo json_encode(array("code" => "200", "user_id" => $user_id));
		}else{
			echo json_encode(array("code" => "202", "msg" => "회원정보를 찾아볼 수 없습니다."));
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect("/", "location");
	}

	public function pwFind(){
		$this->load->view("/member/pw_find");
	}

	public function pwFindProc(){
		$user_id = $this->input->post("user_id");
		$user_name = $this->input->post("user_name");
		$user_email = $this->input->post("user_email");

		$result = $this->UserModel->getPwFind($user_id, $user_name, $user_email);
		echo $this->db->last_query();
		//print_r($result);
		if ($result == true){
			$mfinfo = $this->UserModel->getMailForm(14);
			$mf_body = $mfinfo->MF_BODY;

			$mail_body = str_replace("{DATE}", date("Y-m-d"), $mf_body);
			$mail_body = str_replace("{MEM_ID}", $result->USER_ID, $mail_body);
			$mail_body = str_replace("{MEM_PW}", $result->USER_PW, $mail_body);
			$mail_body = str_replace("{MEM_NAME}", $result->USER_NAME, $mail_body);
			$mail_body = str_replace("{SITE_NAME}", "호스코", $mail_body);
			$mail_body = str_replace("{SITE_EMAIL}", "hosko-email", $mail_body);
			$mail_body = str_replace("{SITE_TEL}", "010-0000-0000", $mail_body);
			$mail_body = str_replace("{SITE_URL}", "http://hoskoweb.cafe24.com", $mail_body);

			$this->SendMail("inho4864@withnetworks.com", $send_subject, $mail_body);

			echo json_encode(array("code" => "200", "msg" => "비밀번호를 등록된 메일로 되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "회원정보를 찾아볼 수 없습니다."));
		}
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

		//$this->email->send();

		//echo $this->email->print_debugger();
	}
}