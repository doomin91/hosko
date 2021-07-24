<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consult extends CI_Controller {

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
        $this->load->library('image_lib');
        $this->load->library('CustomClass');
        //$this->load->library('encrypt');
        $this->load->helper('download');
		$this->load->model('UserModel');
		$this->load->model("ConsultModel");
        $this->load->model("RecruitModel");
    }

    function onlineConsultList(){
		$limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$searchField = $this->input->get("searchField");
		$searchString = $this->input->get("searchString");

		$wheresql = array(
						"start" => $start,
						"limit" => $limit,
						"user_seq" => $this->session->userdata("USER_SEQ"),
						"searchField" => $searchField,
						"searchString" => $searchString
						);
		$lists = $this->ConsultModel->getOnlineConsultLists($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->ConsultModel->getOnlineConsultListCount($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->front_pagenavi("/admin/consult/onlineConsult/", $listCount, 10, 5, $nowpage);

		$data = array(
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit
					);
        $this->load->view("/consult/online-consult-list", $data);
    }

	function onlineConsultWrite(){
		$userInfo = $this->UserModel->getUserInfo($this->session->userdata("USER_SEQ"));
		print_r($userInfo);
		$data = array(
					"userInfo" => $userInfo
					);
        $this->load->view("/consult/online-consult-write", $data);
    }

	public function onlineConsultWriteProc(){
		$oc_subject = $this->input->post("oc_subject");
		$oc_user_name = $this->input->post("oc_user_name");
		$oc_user_tel = $this->input->post("oc_user_tel");
		$oc_user_hp = $this->input->post("oc_user_hp");
		$oc_user_email = $this->input->post("oc_user_email");
		$oc_contents = $this->input->post("oc_contents");

		$insertArr = array(
						"OC_SUBJECT" => $oc_subject,
						"OC_USER_SEQ" => $this->session->userdata("USER_SEQ"),
						"OC_USER_NAME" => $oc_user_name,
						"OC_USER_TEL" => $oc_user_tel,
						"OC_USER_HP" => $oc_user_hp,
						"OC_USER_EMAIL" => $oc_user_email,
						"OC_CONTENTS" => $oc_contents,
						"OC_ANSWER_FLAG" => "W",
						"OC_REG_DATE" => date("Y-m-d H:i:s"),
						"OC_DEL_YN" => "N"
 		);
		$result = $this->ConsultModel->insertOnlineConsult($insertArr);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "문의 신청 되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "문의 신청중 문제가 생겼습니다."));
		}
	}

	function onlineConsultView($oc_seq){
		$ocInfo = $this->ConsultModel->getOnlineConsult($oc_seq);

		$data = array(
					"ocInfo" => $ocInfo
		);
        $this->load->view("/consult/online-consult-view", $data);
    }

    public function qnaList(){
        $limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$searchField = $this->input->get("searchField");
		$searchString = $this->input->get("searchString");

		$wheresql = array(
						"start" => $start,
						"limit" => $limit,
						"user_seq" => $this->session->userdata("USER_SEQ"),
						"searchField" => $searchField,
						"searchString" => $searchString
						);
		$lists = $this->ConsultModel->getQnaLists($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->ConsultModel->getQnaListCount($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->front_pagenavi("/admin/consult/onlineConsult/", $listCount, 10, 5, $nowpage);

		$data = array(
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit
					);
        $this->load->view("/consult/qna-list", $data);
    }

    public function online(){
        $this->load->view("consult/consult_online");
    }

    public function offline(){
        $this->load->view("consult/consult_offline");
    }

    public function apply(){
        // $this->session->userdata("USER_SEQ")
        $session_data = array("USER_SEQ" => 1);
		$this->session->set_userdata($session_data);
        $my_applies = $this->RecruitModel->getMyApplies($this->session->userdata("USER_SEQ"));
        $my_interest_applies = $this->RecruitModel->getMyInterestApplies($this->session->userdata("USER_SEQ"));

        $DATA["MY_APPLIES"] = $my_applies;
        $DATA["MY_INTEREST_APPLIES"] = $my_interest_applies;
        
        $this->load->view("consult/consult_apply", $DATA);
    }

    public function apply_view($app_seq){
        $my_apply = $this->RecruitModel->getRecruitApplyInfo($app_seq);

        $DATA["MY_APPLY"] = $my_apply;
        
        $this->load->view("consult/consult_apply_view", $DATA);
    }

    public function apply_edit($app_seq){
        $my_apply = $this->RecruitModel->getRecruitApplyInfo($app_seq);

        $DATA["MY_APPLY"] = $my_apply;
        
        $this->load->view("consult/consult_apply_edit", $DATA);

    }

    public function apply_edit_proc(){   
        $app_seq = isset($_POST["app_seq"]) ? $_POST["app_seq"] : "";
        $apply_user_name = isset($_POST["apply_user_name"]) ? $_POST["apply_user_name"] : "";
        $apply_user_birthday = isset($_POST["apply_user_birthday"]) ? $_POST["apply_user_birthday"] : "";
        $apply_user_tel = isset($_POST["apply_user_tel"]) ? $_POST["apply_user_tel"] : "";
        $apply_user_email = isset($_POST["apply_user_email"]) ? $_POST["apply_user_email"] : "";
        $apply_uni = isset($_POST["apply_uni"]) ? $_POST["apply_uni"] : "";
        $apply_major = isset($_POST["apply_major"]) ? $_POST["apply_major"] : "";
        $apply_doublemajor = isset($_POST["apply_doublemajor"]) ? $_POST["apply_doublemajor"] : "";
        $apply_grade = isset($_POST["apply_grade"]) ? $_POST["apply_grade"] : "";
        $apply_uni_status = isset($_POST["apply_uni_status"]) ? $_POST["apply_uni_status"] : "";
        $apply_grade_year = isset($_POST["apply_grade_year"]) ? $_POST["apply_grade_year"] : "";
        $apply_comp_name = isset($_POST["apply_comp_name"]) ? $_POST["apply_comp_name"] : "";
        $apply_work_start_year = isset($_POST["apply_work_start_year"]) ? $_POST["apply_work_start_year"] : "";
        $apply_work_start_month = isset($_POST["apply_work_start_month"]) ? $_POST["apply_work_start_month"] : "";
        $apply_work_end_year = isset($_POST["apply_work_end_year"]) ? $_POST["apply_work_end_year"] : "";
        $apply_work_end_month = isset($_POST["apply_work_end_month"]) ? $_POST["apply_work_end_month"] : "";
        $apply_comp_department = isset($_POST["apply_comp_department"]) ? $_POST["apply_comp_department"] : "";
        $apply_start_date = isset($_POST["apply_start_date"]) ? $_POST["apply_start_date"] : "";
        $apply_eng_skill = isset($_POST["apply_eng_skill"]) ? $_POST["apply_eng_skill"] : "";
        $apply_another_skill = isset($_POST["apply_another_skill"]) ? $_POST["apply_another_skill"] : "";
        $apply_another_skill_name = isset($_POST["apply_another_skill_name"]) ? $_POST["apply_another_skill_name"] : "";
        $apply_toeic_score = isset($_POST["apply_toeic_score"]) ? $_POST["apply_toeic_score"] : "";
        $apply_toefl_score = isset($_POST["apply_toefl_score"]) ? $_POST["apply_toefl_score"] : "";
        $apply_career = isset($_POST["apply_career"]) ? $_POST["apply_career"] : "";
        $apply_passport_flag = isset($_POST["apply_passport_flag"]) ? $_POST["apply_passport_flag"] : "";
        $apply_visa_flag = isset($_POST["apply_visa_flag"]) ? $_POST["apply_visa_flag"] : "";
        $apply_self_introduce = isset($_POST["apply_self_introduce"]) ? $_POST["apply_self_introduce"] : "";
        // $apply_user_img_edit = isset($_POST["apply_user_img_edit"]) ? $_POST["apply_user_img_edit"] : "";

        $updateArr = array(
			"APP_USER_NAME" => $apply_user_name,
			"APP_USER_BIRTHDAY" => $apply_user_birthday,
			"APP_USER_TEL" => $apply_user_tel,
			"APP_USER_EMAIL" => $apply_user_email,
			"APP_UNIVERSITY" => $apply_uni,
			"APP_MAJOR" => $apply_major,
			"APP_DOUBLEMAJOR" => $apply_doublemajor,
			"APP_GRADE" => $apply_grade,
			"APP_GRADE_TYPE" => $apply_uni_status,
			"APP_GRADE_YEAR" => $apply_grade_year,
			"APP_COMP_NAME" => $apply_comp_name,
			"APP_WORK_START_YEAR" => $apply_work_start_year,
			"APP_WORK_START_MONTH" => $apply_work_start_month,
			"APP_WORK_END_YEAR" => $apply_work_end_year,
			"APP_WORK_END_MONTH" => $apply_work_end_month,
			"APP_COMP_DEPARTMENT" => $apply_comp_department,
			"APP_START_DATE" => $apply_start_date,
			"APP_ENG_SKILL" => $apply_eng_skill,
            "APP_ETC_LANG_SKILL" => $apply_another_skill,
            "APP_ETC_LANG_NAME" => $apply_another_skill_name,
            "APP_TOEIC_SCORE" => $apply_toeic_score,
            "APP_TOEFL_SCORE" => $apply_toefl_score,
            "APP_CAREER" => $apply_career,
            "APP_PASSPORT_FLAG" => $apply_passport_flag,
            "APP_VISA_FLAG" => $apply_visa_flag,
            "APP_INTRODUCE" => $apply_self_introduce
		);
		// print_r($insertArr);
	
		$result = $this->RecruitModel->updateRecruitApply($app_seq, $updateArr);

        if (isset($_FILES["apply_user_img_edit"]) && !empty($_FILES["apply_user_img_edit"])){
            // $_FILES["abroad_origin_pic"]["name"];
            
			if ($_FILES["apply_user_img_edit"]["error"] > 0){
				echo "Error : " . $_FILES["apply_user_img_edit"]["error"];
			}else{
				if (file_exists("/upload/apply/".$_FILES["apply_user_img_edit"]["name"])){
					echo "동일한 이름의 파일이 존재합니다.";
				}else{
					$tmp = explode(".", $_FILES["apply_user_img_edit"]["name"]);
					$time = time();
					$new_name = "APPLY".$time."_".$app_seq.".".end($tmp);
					// print_r($new_name);
					/* 
						$_FILES["apply_attach"]에서

						[tmp_name] => Array
							(
								[0] => C:\xampp\tmp\phpA57A.tmp
							)
						tmp 경로에서 -> 실제 업로드 경로
					*/  
					move_uploaded_file($_FILES["apply_user_img_edit"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/apply/".$new_name);
					//array_push($file_name, preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\|\!\?\*$#<>()\[\]\{\}]/i", "",$tmp[0]).".".$tmp[count($tmp)-1]);
					$file_name = $_FILES["apply_user_img_edit"]["name"];
					$file_path = "./upload/apply/".$new_name;
					// print_r($_FILES["apply_attach"]);
				}
			}

			$thumb_file_path = "";
			
            $config['image_library'] = 'gd2';
            $config['source_image'] = $file_path;
            $config['new_image'] = "./upload/apply/"."APPLYB".$time."_".$app_seq."_USER_THUMB".".".end($tmp);
            $pathArr = explode(".",$config['new_image']);
            
            $config['width'] = 110;
            $config['height'] = 120;

            // $this->load->library('image_lib', $config);
            $this->image_lib->initialize($config);

            if($this->image_lib->resize() == false){
                echo json_encode(array("code" => "202", "error" => $this->image_lib->display_errors()));
                // print_r($this->image_lib->display_errors());
            }else{
                // array_push($thumb_file_path, $pathArr[1].".".$pathArr[2]);
                $thumb_file_path = $pathArr[1].".".$pathArr[2];
            }
			
			$this->image_lib->clear();

			$result2 = $this->RecruitModel->updateRecruitApply($app_seq, array("APP_USER_IMG" => $thumb_file_path));

        }

		if ($result == true && $result2 == true){
			echo json_encode(array("code" => "200", "app_seq" => $app_seq));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}

    }

}
