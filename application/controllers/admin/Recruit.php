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
		$this->load->library('image_lib');
		//$this->load->library('encrypt');
		$this->load->helper('download');

		$this->load->model("RecruitModel");
		$this->load->model("BasicModel");

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

		$ctg = isset($_GET["ctg"]) ? $_GET["ctg"] : "";
		$ctg2 = isset($_GET["ctg2"]) ? $_GET["ctg2"] : "";
		$ctg3 = isset($_GET["ctg3"]) ? $_GET["ctg3"] : "";
		$searchOpt = isset($_GET["searchOpt"]) ? $_GET["searchOpt"] : "";
		$searchGrp = isset($_GET["searchGrp"]) ? $_GET["searchGrp"] : "";
		$coupon = isset($_GET["coupon"]) ? $_GET["coupon"] : "";
		$display = isset($_GET["display"]) ? $_GET["display"] : "";

		$wheresql = array(
						"ctg" => $ctg,
						"ctg2" => $ctg2,
						"ctg3" => $ctg3,
						"searchOpt" => $searchOpt,
						"searchGrp" => $searchGrp,
						"coupon" => $coupon,
						"display" => $display,
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

		// $queryString = "?start_reg_date=".$start_reg_date."&end_reg_date=".$end_reg_date."&status=".$status;

		$pagination = $this->customclass->pagenavi("/admin/recruit", $listCount, 10, 5, $nowpage);
		//print_r($listCount);
		$data = array(
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

	public function recruit_apply_save(){
		$APP_SEQ = isset($_POST["APP_SEQ"]) ? $_POST["APP_SEQ"] : "";
		$APP_PRICE = isset($_POST["APP_PRICE"]) ? $_POST["APP_PRICE"] : "";
		$APP_STATUS = isset($_POST["APP_STATUS"]) ? $_POST["APP_STATUS"] : "";
		$APP_UNIVERSITY = isset($_POST["APP_UNIVERSITY"]) ? $_POST["APP_UNIVERSITY"] : "";
		$APP_MAJOR = isset($_POST["APP_MAJOR"]) ? $_POST["APP_MAJOR"] : "";
		$APP_GRADE = isset($_POST["APP_GRADE"]) ? $_POST["APP_GRADE"] : "";
		$APP_GRADE_TYPE = isset($_POST["APP_GRADE_TYPE"]) ? $_POST["APP_GRADE_TYPE"] : "";
		$APP_COMP_DEPARTMENT = isset($_POST["APP_COMP_DEPARTMENT"]) ? $_POST["APP_COMP_DEPARTMENT"] : "";
		$APP_START_DATE = isset($_POST["APP_START_DATE"]) ? $_POST["APP_START_DATE"] : "";
		$APP_ENG_SKILL = isset($_POST["APP_ENG_SKILL"]) ? $_POST["APP_ENG_SKILL"] : "";
		$APP_ETC_LANG_SKILL = isset($_POST["APP_ETC_LANG_SKILL"]) ? $_POST["APP_ETC_LANG_SKILL"] : "";
		$APP_ETC_LANG_NAME = isset($_POST["APP_ETC_LANG_NAME"]) ? $_POST["APP_ETC_LANG_NAME"] : "";
		$APP_CAREER = isset($_POST["APP_CAREER"]) ? $_POST["APP_CAREER"] : "";
		$APP_TOEIC_SCORE = isset($_POST["APP_TOEIC_SCORE"]) ? $_POST["APP_TOEIC_SCORE"] : "";
		$APP_TOEFL_SCORE = isset($_POST["APP_TOEFL_SCORE"]) ? $_POST["APP_TOEFL_SCORE"] : "";
		$APP_PASSPORT_FLAG = isset($_POST["APP_PASSPORT_FLAG"]) ? $_POST["APP_PASSPORT_FLAG"] : "";
		$APP_VISA_FLAG = isset($_POST["APP_VISA_FLAG"]) ? $_POST["APP_VISA_FLAG"] : "";
		$APP_INTRODUCE = isset($_POST["APP_INTRODUCE"]) ? $_POST["APP_INTRODUCE"] : "";
		$APP_ADMIN_MEMO = isset($_POST["APP_ADMIN_MEMO"]) ? $_POST["APP_ADMIN_MEMO"] : "";

		$wheresql = array(
			"APP_SEQ" => $APP_SEQ,
			"APP_PRICE" => $APP_PRICE,
			"APP_STATUS" => $APP_STATUS,
			"APP_UNIVERSITY" => $APP_UNIVERSITY,
			"APP_MAJOR" => $APP_MAJOR,
			"APP_GRADE" => $APP_GRADE,
			"APP_GRADE_TYPE" => $APP_GRADE_TYPE,
			"APP_COMP_DEPARTMENT" => $APP_COMP_DEPARTMENT,
			"APP_START_DATE" => $APP_START_DATE,
			"APP_ENG_SKILL" => $APP_ENG_SKILL,
			"APP_ETC_LANG_SKILL" => $APP_ETC_LANG_SKILL,
			"APP_ETC_LANG_NAME" => $APP_ETC_LANG_NAME,
			"APP_CAREER" => $APP_CAREER,
			"APP_TOEIC_SCORE" => $APP_TOEIC_SCORE,
			"APP_TOEFL_SCORE" => $APP_TOEFL_SCORE,
			"APP_PASSPORT_FLAG" => $APP_PASSPORT_FLAG,
			"APP_VISA_FLAG" => $APP_VISA_FLAG,
			"APP_INTRODUCE" => $APP_INTRODUCE,
			"APP_ADMIN_MEMO" => $APP_ADMIN_MEMO
		);

		$result = $this->RecruitModel->updateRecruitApply($APP_SEQ, $wheresql);
        
		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "저장 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
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

		$ctg = isset($_GET["ctg"]) ? $_GET["ctg"] : "";
		$ctg2 = isset($_GET["ctg2"]) ? $_GET["ctg2"] : "";
		$ctg3 = isset($_GET["ctg3"]) ? $_GET["ctg3"] : "";
		$searchOpt = isset($_GET["searchOpt"]) ? $_GET["searchOpt"] : "";
		$searchTxt = isset($_GET["searchTxt"]) ? $_GET["searchTxt"] : "";
		$searchGrp = isset($_GET["searchGrp"]) ? $_GET["searchGrp"] : "";
		$coupon = isset($_GET["coupon"]) ? $_GET["coupon"] : "";
		$display = isset($_GET["display"]) ? $_GET["display"] : "";

		$wheresql = array(
						"ctg" => $ctg,
						"ctg2" => $ctg2,
						"ctg3" => $ctg3,
						"searchOpt" => $searchOpt,
						"searchTxt" => $searchTxt,
						"searchGrp" => $searchGrp,
						"coupon" => $coupon,
						"display" => $display,
						"start" => $start,
						"limit" => $limit
						);
		// print_r($searchTxt);
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
					"ctg" => $ctg,
					"ctg2" => $ctg2,
					"ctg3" => $ctg3,
					"searchOpt" => $searchOpt,
					"searchTxt" => $searchTxt,
					"searchGrp" => $searchGrp,
					"coupon" => $coupon,
					"display" => $display,
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit
					);

		$this->load->view("./admin/recruit/recruit-abroad_list", $data);
	}

	public function recruit_abroad_new(){
		$DATA["USER_IP"] = $this->customclass->get_client_ip();
		
		$this->load->view("./admin/recruit/recruit-abroad_register", $DATA);
	}

	public function recruit_abroad_new_proc(){
		$REC_CONTENTS_CATEGORY = isset($_POST["ctg"]) ? $_POST["ctg"] : "";
		$REC_CONTENTS_SUB1_CATEGORY = isset($_POST["ctg2"]) ? $_POST["ctg2"] : "";
		$REC_CONTENTS_SUB2_CATEGORY = isset($_POST["ctg3"]) ? $_POST["ctg3"] : "";
		$REC_TITLE = isset($_POST["abroad_contents_title"]) ? $_POST["abroad_contents_title"] : "";
		$REC_STATUS = isset($_POST["abroad_status"]) ? $_POST["abroad_status"] : "";
		$REC_COUNT = isset($_POST["abroad_hit_count"]) ? $_POST["abroad_hit_count"] : "";
		$REC_ADMIN_ID = isset($_POST["abroad_manager"]) ? $_POST["abroad_manager"] : "";
		$REC_COUNTRY = isset($_POST["abroad_country"]) ? $_POST["abroad_country"] : "";
		$REC_TYPE = isset($_POST["abroad_type"]) ? $_POST["abroad_type"] : "";
		$REC_PERIOD = isset($_POST["abroad_period"]) ? $_POST["abroad_period"] : "";
		$REC_CATEGORY = isset($_POST["abroad_category"]) ? $_POST["abroad_category"] : "";
		$REC_DEADLINE = isset($_POST["abroad_deadline"]) ? $_POST["abroad_deadline"] : "";
		$REC_INTERVIEW_TYPE = isset($_POST["abroad_interview_type"]) ? $_POST["abroad_interview_type"] : "";
		$REC_INTERVIEW_DATE = isset($_POST["abroad_interview_date"]) ? $_POST["abroad_interview_date"] : "";
		$REC_PREREQUISITE = isset($_POST["abroad_prerequisite"]) ? $_POST["abroad_prerequisite"] : "";
		$REC_LODGIN = isset($_POST["abroad_accomdation"]) ? $_POST["abroad_accomdation"] : "";
		$REC_WELFARE = isset($_POST["abroad_welfare"]) ? $_POST["abroad_welfare"] : "";
		$REC_VISA = isset($_POST["abroad_visa"]) ? $_POST["abroad_visa"] : "";
		$REC_CONTENTS = isset($_POST["abroad_detail"]) ? $_POST["abroad_detail"] : "";
		$REC_REG_IP = isset($_POST["user_ip"]) ? $_POST["user_ip"] : "";
		// $REC_THUMBNAIL = isset($_POST["abroad_origin_pic"]) ? $_POST["abroad_origin_pic"] : "";

		$MANAGER = $this->BasicModel->getManagerById($REC_ADMIN_ID);

		$REC_ADMIN_SEQ = isset($MANAGER->ADMIN_SEQ) ? $MANAGER->ADMIN_SEQ : "";

		$insertArr = array(
			"REC_CONTENTS_CATEGORY" => $REC_CONTENTS_CATEGORY,
			"REC_CONTENTS_SUB1_CATEGORY" => $REC_CONTENTS_SUB1_CATEGORY,
			"REC_CONTENTS_SUB2_CATEGORY" => $REC_CONTENTS_SUB2_CATEGORY,
			"REC_TITLE" => $REC_TITLE,
			"REC_STATUS" => $REC_STATUS,
			"REC_COUNT" => $REC_COUNT,
			"REC_ADMIN_SEQ" => $REC_ADMIN_SEQ,
			"REC_COUNTRY" => $REC_COUNTRY,
			"REC_TYPE" => $REC_TYPE,
			"REC_PERIOD" => $REC_PERIOD,
			"REC_CATEGORY" => $REC_CATEGORY,
			"REC_DEADLINE" => $REC_DEADLINE,
			"REC_INTERVIEW_TYPE" => $REC_INTERVIEW_TYPE,
			"REC_INTERVIEW_DATE" => $REC_INTERVIEW_DATE,
			"REC_PREREQUISITE" => $REC_PREREQUISITE,
			"REC_LODGIN" => $REC_LODGIN,
			"REC_WELFARE" => $REC_WELFARE,
			"REC_VISA" => $REC_VISA,
			"REC_CONTENTS" => $REC_CONTENTS
		);

		// print_r($insertArr);
	
		$result = $this->RecruitModel->insertRecruitAbroad($insertArr);

		$insert_id = $this->db->insert_id();

        $file_name = array();
        $file_path = array();
		// print_r($_FILES["abroad_origin_pic"]);
		// exit;
        if (isset($_FILES["abroad_origin_pic"]) && !empty($_FILES["abroad_origin_pic"])){
            // $_FILES["abroad_origin_pic"]["name"];
            
			if ($_FILES["abroad_origin_pic"]["error"] > 0){
				echo "Error : " . $_FILES["abroad_origin_pic"]["error"];
			}else{
				if (file_exists("/upload/recruit/".$_FILES["abroad_origin_pic"]["name"])){
					echo "동일한 이름의 파일이 존재합니다.";
				}else{
					$tmp = explode(".", $_FILES["abroad_origin_pic"]["name"]);
					// print_r($tmp);
					$time = time();
					$new_name = "recruit".$time."_".$insert_id.".".end($tmp);
					// print_r($new_name);
					/* 
						$_FILES["apply_attach"]에서

						[tmp_name] => Array
							(
								[0] => C:\xampp\tmp\phpA57A.tmp
							)
						tmp 경로에서 -> 실제 업로드 경로
					*/  
					move_uploaded_file($_FILES["abroad_origin_pic"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/recruit/".$new_name);
					//array_push($file_name, preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\|\!\?\*$#<>()\[\]\{\}]/i", "",$tmp[0]).".".$tmp[count($tmp)-1]);
					$file_name = $_FILES["abroad_origin_pic"]["name"];
					$file_path = "./upload/recruit/".$new_name;
					// print_r($_FILES["apply_attach"]);
				}
			}

			$thumb_file_path = array();
			$thumb_name = array("R", "S", "M", "L");

			for($i = 0 ; $i < 4 ; $i++){
				$config['image_library'] = 'gd2';
				$config['source_image'] = $file_path;
				$config['new_image'] = "./upload/recruit/"."recruit".$time."_".$insert_id."_".$thumb_name[$i].".".end($tmp);
				$pathArr = explode(".",$config['new_image']);
				
				// $config['create_thumb'] = TRUE;
				// $config['maintain_ratio'] = TRUE;
				if($thumb_name[$i] == "R"){
					$config['width']         = 75;
					$config['height']       = 75;
				}else{
					$config['width']         = 200;
					$config['height']       = 200;
				}

				// $this->load->library('image_lib', $config);
				$this->image_lib->initialize($config);

				if($this->image_lib->resize() == false){
					echo json_encode(array("code" => "202", "error" => $this->image_lib->display_errors()));
					// print_r($this->image_lib->display_errors());
				}else{
					array_push($thumb_file_path, $pathArr[1].".".$pathArr[2]);
				}
			}

			$this->image_lib->clear();

			$update_arr = array(
				"REC_THUMBNAIL" => $file_path,
				"REC_THUMBNAIL_R" => $thumb_file_path[0],
				"REC_THUMBNAIL_S" => $thumb_file_path[1],
				"REC_THUMBNAIL_M" => $thumb_file_path[2],
				"REC_THUMBNAIL_L" => $thumb_file_path[3],
			);
			$result = $this->RecruitModel->updateRecruitAbroad($insert_id, $update_arr);

        }

		if ($result == true){
			echo json_encode(array("code" => "200", "abraod_seq" => $insert_id));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}

	}

	public function recruit_abroad_upload_contents_image(){
		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/recruit/contents";
        $config["allowed_types"] = "*";
        $config["overwrite"] = TRUE;
        $config["encrypt_name"] = TRUE;
        $config["remove_space"] = TRUE;
        $this->load->library("upload", $config);
        $this->upload->initialize($config);
        // print_r($_FILES);
		// exit;

        if (!$this->upload->do_upload("image")){
            $error = array('error' => $this->upload->display_errors());
            //print_r($error);
            echo json_encode(array("code" => "202", "msg" => $error["error"]));
        }else{
            $data = array('upload_data' => $this->upload->data());
            //print_r($data);
            //echo SITE_URL."/upload/editor/".$data["upload_data"]["file_name"];
            echo json_encode(array("code" => "200", "image_url" => "/upload/recruit/contents/".$data["upload_data"]["file_name"]));
        }
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
