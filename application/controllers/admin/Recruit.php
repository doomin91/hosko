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
		$this->load->model("UserModel");

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

		$apply_status = isset($_GET["apply_status"]) ? $_GET["apply_status"] : 0;
		$search_date = isset($_GET["search_date"]) ? $_GET["search_date"] : "";
		$apply_start_date = isset($_GET["apply_start_date"]) ? $_GET["apply_start_date"] : "";
		$apply_end_date = isset($_GET["apply_end_date"]) ? $_GET["apply_end_date"] : "";
		$apply_search_option = isset($_GET["apply_search_option"]) ? $_GET["apply_search_option"] : "";
		$apply_search_text = isset($_GET["apply_search_text"]) ? $_GET["apply_search_text"] : "";
		$coupon = isset($_GET["coupon"]) ? $_GET["coupon"] : "";
		$display = isset($_GET["display"]) ? $_GET["display"] : "";

		$wheresql = array(
						"apply_status" => $apply_status,						
						"apply_start_date" => $apply_start_date,
						"apply_end_date" => $apply_end_date,
						"apply_search_option" => $apply_search_option,
						"apply_search_text" => $apply_search_text,
						"start" => $start,
						"limit" => $limit
						);

		$lists = $this->RecruitModel->getRecruitApplyList($wheresql);
		// print_r($lists);
		// echo $this->db->last_query();
		$listCount = $this->RecruitModel->getRecruitApplyListCount($wheresql);
		$listCountAll = $this->RecruitModel->getRecruitApplyListCountAll();
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
					"listCountAll" => $listCountAll,
					"status" => $apply_status,
					"searchDate" => $search_date,
					"startDate" => $apply_start_date,
					"endDate" => $apply_end_date,
					"searchOption" => $apply_search_option,
					"searchText" => $apply_search_text,
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

	public function recruit_apply_view_print($apply_seq){
		$DATA["APPLY_INFO"] = $this->RecruitModel->getRecruitApplyInfo($apply_seq);

		// print_r($DATA["APPLY_INFO"]);
        
		$this->load->view("./admin/recruit/recruit-apply_view_print", $DATA);
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

	public function recruit_applies_del(){
		$seqs = isset($_POST["SEQ"]) ? $_POST["SEQ"] : "";

		$result = $this->RecruitModel->deleteRecruitApplies($seqs);

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
	}

	public function update_recruit_status(){
		$app_seq = isset($_POST["APP_SEQ"]) ? $_POST["APP_SEQ"] : "";
		$app_status = isset($_POST["APP_STATUS"]) ? $_POST["APP_STATUS"] : "";

		$where_arr = array("APP_STATUS" => $app_status);

		$result = $this->RecruitModel->updateRecruitApply($app_seq, $where_arr);

		$apply = $this->RecruitModel->getRecruitApplyInfo($app_seq);
		$user_level = 0;

		if($app_status == 1){
			$user_level = 10;
		}else if($app_status == 2){
			$user_level = 4;
		}else if($app_status == 6){
			$user_level = 3;
		}else if($app_status == 9){
			$user_level = 2;
		}else if($app_status == 11){
			$user_level = 5;
		}

		if($user_level != 0){
			$result = $this->UserModel->editUser(array("USER_LEVEL" => $user_level), $apply->USER_SEQ);
		}

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
	}

	public function update_recruits_status(){
		$app_seqs = isset($_POST["APP_SEQ"]) ? $_POST["APP_SEQ"] : "";
		$app_status = isset($_POST["APP_STATUS"]) ? $_POST["APP_STATUS"] : "";

		foreach($app_seqs as $key => $seq){
			$where_arr = array("APP_STATUS" => $app_status[$key]);
			
			$result = $this->RecruitModel->updateRecruitApply($seq, $where_arr);

			if(!$result){
				break;
			}
		}

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
	}

	public function recruit_abroad_list(){
		$limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
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
		// echo $this->db->last_query();
		$listCount = $this->RecruitModel->getRecruitAbroadListCount($wheresql);
		$listCountAll = $this->RecruitModel->getRecruitAbroadListCountAll();
		// $listCount= array();
		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*15);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/recruit/recruit_abroad_list", $listCount, 10, 5, $nowpage);
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
					"listCountAll" => $listCountAll,
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
		$REC_RECRUIT_TYPE = isset($_POST["abroad_recruit_type"]) ? $_POST["abroad_recruit_type"] : "";
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

		// $DISPLAY_ORDER = $this->RecruitModel->getRecruitAbroadListCountAll();

		$REC_ADMIN_SEQ = isset($MANAGER->ADMIN_SEQ) ? $MANAGER->ADMIN_SEQ : "";

		$insertArr = array(
			// "REC_ADMIN_SEQ" => $this->session->userdata("admin_seq"),
			"REC_CONTENTS_CATEGORY" => $REC_CONTENTS_CATEGORY,
			"REC_CONTENTS_SUB1_CATEGORY" => $REC_CONTENTS_SUB1_CATEGORY,
			"REC_CONTENTS_SUB2_CATEGORY" => $REC_CONTENTS_SUB2_CATEGORY,
			"REC_TITLE" => $REC_TITLE,
			"REC_STATUS" => $REC_STATUS,
			"REC_COUNT" => $REC_COUNT,
			"REC_ADMIN_SEQ" => $this->session->userdata("admin_seq"),
			"REC_COUNTRY" => $REC_COUNTRY,
			"REC_TYPE" => $REC_TYPE,
			"REC_PERIOD" => $REC_PERIOD,
			"REC_RECRUIT_TYPE" => $REC_RECRUIT_TYPE,
			"REC_DEADLINE" => $REC_DEADLINE,
			"REC_INTERVIEW_TYPE" => $REC_INTERVIEW_TYPE,
			"REC_INTERVIEW_DATE" => $REC_INTERVIEW_DATE,
			"REC_PREREQUISITE" => $REC_PREREQUISITE,
			"REC_LODGIN" => $REC_LODGIN,
			"REC_WELFARE" => $REC_WELFARE,
			"REC_VISA" => $REC_VISA,
			"REC_CONTENTS" => $REC_CONTENTS,
			// "REC_DISPLAY_ORDER" => $DISPLAY_ORDER+1
		);

		// print_r($insertArr);
	
		$result = $this->RecruitModel->insertRecruitAbroad($insertArr);

		$insert_id = $this->db->insert_id();

		$updateArr = array(
			"REC_DISPLAY_ORDER" => $insert_id
		);

		$result = $this->RecruitModel->updateRecruitAbroad($insert_id, $updateArr);

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
					$file_path = "/upload/recruit/".$new_name;
					// print_r($_FILES["apply_attach"]);
				}
			}

			$thumb_file_path = array();
			$thumb_name = array("R", "S", "M", "L");

			for($i = 0 ; $i < 4 ; $i++){
				$config['image_library'] = 'gd2';
				$config['source_image'] = ".".$file_path;
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
				// print_r($config);

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
			echo json_encode(array("code" => "200", "abroad_seq" => $insert_id));
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
	//http://ww4.test.com/admin/recruit/recruit_abroad_view/64
	public function recruit_abroad_view($abroad_seq){
		$DATA["ABROAD_INFO"] = $this->RecruitModel->getRecruitAbroadInfo($abroad_seq);

		// print_r($DATA["APPLY_INFO"]);
        
		$this->load->view("./admin/recruit/recruit-abroad_view", $DATA);
	}

	public function recruit_abroad_edit($abroad_seq){
		$DATA["ABROAD_INFO"] = $this->RecruitModel->getRecruitAbroadInfo($abroad_seq);
        
		$this->load->view("./admin/recruit/recruit-abroad_edit", $DATA);
	}

	public function recruit_abroad_modify_proc(){
		$REC_SEQ = isset($_POST["REC_SEQ"]) ? $_POST["REC_SEQ"] : "";
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
		$REC_RECRUIT_TYPE = isset($_POST["abroad_recruit_type"]) ? $_POST["abroad_recruit_type"] : "";
		$REC_DEADLINE = isset($_POST["abroad_deadline"]) ? $_POST["abroad_deadline"] : "";
		$REC_INTERVIEW_TYPE = isset($_POST["abroad_interview_type"]) ? $_POST["abroad_interview_type"] : "";
		$REC_INTERVIEW_DATE = isset($_POST["abroad_interview_date"]) ? $_POST["abroad_interview_date"] : "";
		$REC_PREREQUISITE = isset($_POST["abroad_prerequisite"]) ? $_POST["abroad_prerequisite"] : "";
		$REC_PAY = isset($_POST["abroad_pay"]) ? $_POST["abroad_pay"] : "";
		$REC_LODGIN = isset($_POST["abroad_accomdation"]) ? $_POST["abroad_accomdation"] : "";
		$REC_WELFARE = isset($_POST["abroad_welfare"]) ? $_POST["abroad_welfare"] : "";
		$REC_VISA = isset($_POST["abroad_visa"]) ? $_POST["abroad_visa"] : "";
		$REC_CONTENTS = isset($_POST["abroad_detail"]) ? $_POST["abroad_detail"] : "";
		// $REC_THUMBNAIL = isset($_POST["abroad_origin_pic"]) ? $_POST["abroad_origin_pic"] : "";

		$MANAGER = $this->BasicModel->getManagerById($REC_ADMIN_ID);

		// $DISPLAY_ORDER = $this->RecruitModel->getRecruitAbroadListCountAll();

		$REC_ADMIN_SEQ = isset($MANAGER->ADMIN_SEQ) ? $MANAGER->ADMIN_SEQ : "";

		$updateArr = array(
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
			"REC_RECRUIT_TYPE" => $REC_RECRUIT_TYPE,
			"REC_DEADLINE" => $REC_DEADLINE,
			"REC_INTERVIEW_TYPE" => $REC_INTERVIEW_TYPE,
			"REC_INTERVIEW_DATE" => $REC_INTERVIEW_DATE,
			"REC_PREREQUISITE" => $REC_PREREQUISITE,
			"REC_PAY" => $REC_PAY,
			"REC_LODGIN" => $REC_LODGIN,
			"REC_WELFARE" => $REC_WELFARE,
			"REC_VISA" => $REC_VISA,
			"REC_CONTENTS" => $REC_CONTENTS,
			// "REC_DISPLAY_ORDER" => $DISPLAY_ORDER+1
		);

		// print_r($insertArr);
	
		$result = $this->RecruitModel->updateRecruitAbroad($REC_SEQ, $updateArr);

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
					$new_name = "recruit".$time."_".$REC_SEQ.".".end($tmp);
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
					$file_path = "/upload/recruit/".$new_name;
					// print_r($_FILES["apply_attach"]);
				}
			}

			$thumb_file_path = array();
			$thumb_name = array("R", "S", "M", "L");

			for($i = 0 ; $i < 4 ; $i++){
				$config['image_library'] = 'gd2';
				$config['source_image'] = ".".$file_path;
				$config['new_image'] = "./upload/recruit/"."recruit".$time."_".$REC_SEQ."_".$thumb_name[$i].".".end($tmp);
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
				// print_r($config);

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
			$result = $this->RecruitModel->updateRecruitAbroad($REC_SEQ, $update_arr);

        }

		if ($result == true){
			echo json_encode(array("code" => "200", "abroad_seq" => $REC_SEQ));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}

	}

	public function recruit_abroad_edit_print($abroad_seq){
		$DATA["ABROAD_INFO"] = $this->RecruitModel->getRecruitAbroadInfo($abroad_seq);

		// print_r($DATA["APPLY_INFO"]);
        
		$this->load->view("./admin/recruit/recruit-abroad_edit_print", $DATA);
	}

	public function recruit_abroad_del($abroad_seq){
		
		$result = $this->RecruitModel->deleteRecruitAbroad($abroad_seq);

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
	}

	public function recruit_abroads_del(){
		$seqs = isset($_POST["SEQ"]) ? $_POST["SEQ"] : "";

		$result = $this->RecruitModel->deleteRecruitAbroads($seqs);

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
	}

	public function recruit_abroad_copy($abroad_seq){
		$abroad_data = $this->RecruitModel->getRecruitAbroad($abroad_seq);
		
		$data_arr = get_object_vars($abroad_data);
		$data_arr["REC_REG_DATE"] = date("YmdHis");
		unset($data_arr["REC_SEQ"]);

		$result = $this->RecruitModel->insertRecruitAbroad($data_arr);

		$insert_id = $this->db->insert_id();

		$updateArr = array(
			"REC_DISPLAY_ORDER" => $insert_id
		);

		$result = $this->RecruitModel->updateRecruitAbroad($insert_id, $updateArr);
		

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
	}

	public function recruit_abroads_copy(){
		$seqs = isset($_POST["SEQ"]) ? $_POST["SEQ"] : "";

		foreach($seqs as $seq){
			$data = $this->RecruitModel->getRecruitAbroad($seq);

			$data_arr = get_object_vars($data);
			$data_arr["REC_REG_DATE"] = date("YmdHis");
			unset($data_arr["REC_SEQ"]);

			$result = $this->RecruitModel->insertRecruitAbroad($data_arr);

			$insert_id = $this->db->insert_id();

			$updateArr = array(
				"REC_DISPLAY_ORDER" => $insert_id
			);

			$result = $this->RecruitModel->updateRecruitAbroad($insert_id, $updateArr);

			if(!$result){
				break;
			}
		}

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
	}

	public function recruit_resume_list(){
		$limit = 15;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*15;
			$nowpage = $_GET["per_page"];
		}

		$search_text = isset($_GET["resume_search_text"]) ? $_GET["resume_search_text"] : "";
		$search_option = isset($_GET["resume_search_option"]) ? $_GET["resume_search_option"] : "";

		$wheresql = array(
						"search_text" => $search_text,
						"search_option" => $search_option,
						"start" => $start,
						"limit" => $limit
					);
		// print_r($searchTxt);
		$lists = $this->RecruitModel->getRecruitResumeList($wheresql);
		// $lists = array();
		// echo $this->db->last_query();
		$listCount = $this->RecruitModel->getRecruitResumeListCount($wheresql);
		$listCountAll = $this->RecruitModel->getRecruitResumeListCountAll();
		// $listCount= array();
		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*15);
		}else{
			$pagenum = $listCount;
		}

		$queryString = "?search_option=".$search_option."&search_text=".$search_text;

		$pagination = $this->customclass->pagenavi("/admin/recurit/recruit_resume_list".$queryString, $listCount, 15, 5, $nowpage);
		//print_r($listCount);
		$data = array(
					"lists" => $lists,
					"listCount" => $listCount,
					"listCountAll" => $listCountAll,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit,
					"search_text" => $search_text,
					"search_option" => $search_option
					);

		$this->load->view("./admin/recruit/recruit-resume_list", $data);
	}

	public function recruit_resume_view($resume_seq){
		$DATA["RESUME_INFO"] = $this->RecruitModel->getRecruitResumeInfo($resume_seq);
		$DATA["RESUME_EDUCATION"] = $this->RecruitModel->getRecruitResumeEducation($resume_seq);
		$DATA["RESUME_AHIEVEMENT"] = $this->RecruitModel->getRecruitResumeAhvmnt($resume_seq);
		$DATA["RESUME_ACTIVITY"] = $this->RecruitModel->getRecruitResumeActivity($resume_seq);
		$DATA["RESUME_LANGUAGE"] = $this->RecruitModel->getRecruitResumeLanguage($resume_seq);
		$DATA["RESUME_SKILL"] = $this->RecruitModel->getRecruitResumeSkill($resume_seq);
		$DATA["RESUME_WORKING_EXP"] = $this->RecruitModel->getRecruitResumeWokringExp($resume_seq);
		
		$this->load->view("./admin/recruit/recruit-resume_view", $DATA);
	}

	public function recruit_resume_admin_create($resume_seq, $user_seq){

		$admin_resume = $this->UserModel->getAdminUserResume($user_seq);

		if($admin_resume){
			$DATA["RESUME_FLAG"] = "ADMIN";
			$DATA["RESUME_INFO"] = $admin_resume;
			$DATA["RESUME_EDU"] = $this->UserModel->getAdminUserResumeEducation($admin_resume->ADMIN_RESUME_SEQ);
			$DATA["RESUME_WEXP"] = $this->UserModel->getAdminUserResumeWorkExp($admin_resume->ADMIN_RESUME_SEQ);
			$DATA["RESUME_ACT"] = $this->UserModel->getAdminUserResumeActivity($admin_resume->ADMIN_RESUME_SEQ);
			$DATA["RESUME_ACHV"] = $this->UserModel->getAdminUserResumeAchiv($admin_resume->ADMIN_RESUME_SEQ);
			$DATA["RESUME_SKIL"] = $this->UserModel->getAdminUserResumeSkill($admin_resume->ADMIN_RESUME_SEQ);
			$DATA["RESUME_LANG"] = $this->UserModel->getAdminUserResumeLanguage($admin_resume->ADMIN_RESUME_SEQ);
			
		}else{
			$DATA["RESUME_FLAG"] = "USER";
			$user_resume = $this->UserModel->getUserResume($user_seq);
			$DATA["RESUME_INFO"] = $user_resume;
			$DATA["RESUME_EDU"] = $this->UserModel->getUserResumeEducation($user_resume->RESUME_SEQ);
			$DATA["RESUME_WEXP"] = $this->UserModel->getUserResumeWorkExp($user_resume->RESUME_SEQ);
			$DATA["RESUME_ACT"] = $this->UserModel->getUserResumeActivity($user_resume->RESUME_SEQ);
			$DATA["RESUME_ACHV"] = $this->UserModel->getUserResumeAchiv($user_resume->RESUME_SEQ);
			$DATA["RESUME_SKIL"] = $this->UserModel->getUserResumeSkill($user_resume->RESUME_SEQ);
			$DATA["RESUME_LANG"] = $this->UserModel->getUserResumeLanguage($user_resume->RESUME_SEQ);
		}
		$this->load->view("./admin/recruit/recruit-resume_admin_create", $DATA);
	}

	public function recruit_resume_admin_create_proc(){
		$admin_seq = isset($_POST["admin_seq"]) ? $_POST["admin_seq"] : "";
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
		$resume_user_computer_skill = isset($_POST["resume_user_computer_skill"]) ? $_POST["resume_user_computer_skill"] : "";

		$insertArr = array(
			"ADMIN_SEQ" => $admin_seq,
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

		$result = $this->UserModel->createAdminUserResume($insertArr);
		
		$resume_id = $this->db->insert_id();
		
		foreach ($redu_date as $key => $edu_date){
			$insertArr = array(
							"RESUME_SEQ" => $resume_id,
							"REDU_DATE" => $edu_date,
							"REDU_DESCRIPTION" => $redu_description[$key]
						);

			$this->UserModel->createAdminUserResumeEducation($insertArr);
		}
		foreach ($rwexp_date as $key => $exp_date){
			$insertArr = array(
				"RESUME_SEQ" => $resume_id,
				"RWEXP_DATE" => $exp_date,
				"RWEXP_DESCRIPTION" => $rwexp_description[$key]
			);
			
			$this->UserModel->createAdminUserResumeWorkExp($insertArr);
		}
		foreach ($ract_date as $key => $act_date){
			$insertArr = array(
				"RESUME_SEQ" => $resume_id,
				"RACT_DATE" => $act_date,
				"RACT_DESCRIPTION" => $ract_description[$key]	
			);

			$this->UserModel->createAdminUserResumeActivity($insertArr);
		}
		
		foreach ($rahcv_title as $key => $ahcv_title){
			$insertArr = array(
				"RESUME_SEQ" => $resume_id,
				"RACHV_TITLE" => $ahcv_title,
				"RACHV_DESCRIPTION" => $rahcv_description[$key]
			);

			$this->UserModel->createAdminUserResumeAchiv($insertArr);
		}
		foreach ($rskil_date as $key => $skill_date){
			$insertArr = array(
				"RESUME_SEQ" => $resume_id,
				"RSKL_DATE" => $skill_date,
				"RSKL_DESCRIPTION" => $rskil_description[$key]
			);

			$this->UserModel->createAdminUserResumeSkill($insertArr);
		}

		foreach ($rlang_name as $key => $lang_date){
			$insertArr = array(
				"RESUME_SEQ" => $resume_id,
				"RLANG_NAME" => $lang_date,
				"RLANG_SPEAKING" => $rlang_speaking[$key],
				"RLANG_WRITING" => $rlang_writing[$key]
			);

			$this->UserModel->createAdminUserResumeLanguage($insertArr);
		}

		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/resume_admin/";
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
				if (file_exists('upload/resume_admin/' . $_FILES['resume_img']['name'])) {
					echo 'File already exists : upload/resume_admin/' . $_FILES['resume_img']['name'];
				} else {
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('resume_img')) {
						echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$resume_img = $_FILES['resume_img']['name'];
						$resume_img_path = "/upload/resume_admin/".$this->upload->data("file_name");
					}
				}
			}
		} else {
			//echo 'Please choose a file';
			$resume = $this->UserModel->getUserResume($this->session->userdata("USER_SEQ"));
			$resume_img_path = $resume->RESUME_USER_PHOTO;
		}

		$updateArr = array(
						"RESUME_USER_PHOTO" => $resume_img_path
					);

		$result = $this->UserModel->updateAdminUserResume($updateArr, $resume_id);

		//echo $this->db->last_query();

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "이력서가 작성되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "이력서 작성중 문제가 생겼습니다."));
		}
	}

	public function recruit_resume_admin_update_proc(){		
		$admin_resume_seq = isset($_POST["admin_resume_seq"]) ? $_POST["admin_resume_seq"] : "";
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

		$result = $this->UserModel->updateAdminUserResume($updateArr, $admin_resume_seq);

		foreach ($redu_date as $key => $edu_date){
			if(count($redu_seq)-1 >= $key){
				$updateArr = array(
						"REDU_DATE" => $edu_date,
						"REDU_DESCRIPTION" => $redu_description[$key]
					);
				$this->UserModel->updateAdminUserResumeEducation($updateArr, $redu_seq[$key]);
			}else{
				$insertArr = array(
						"RESUME_SEQ" => $admin_resume_seq,
						"REDU_DATE" => $edu_date,
						"REDU_DESCRIPTION" => $redu_description[$key]
					);
				$this->UserModel->createAdminUserResumeEducation($insertArr);
			}	
		}
		foreach ($rwexp_date as $key => $exp_date){
			if(count($rwexp_seq)-1 >= $key){
				$updateArr = array(
						"RWEXP_DATE" => $exp_date,
						"RWEXP_DESCRIPTION" => $rwexp_description[$key]
					);
				$this->UserModel->updateAdminUserResumeWorkExp($updateArr, $rwexp_seq[$key]);
			}else{
				$insertArr = array(
						"RESUME_SEQ" => $admin_resume_seq,
						"RWEXP_DATE" => $exp_date,
						"RWEXP_DESCRIPTION" => $rwexp_description[$key]
					);
				$this->UserModel->createAdminUserResumeWorkExp($insertArr);
			}
		}
		foreach ($ract_date as $key => $act_date){
			if(count($ract_seq)-1 >= $key){
				$updateArr = array(
						"RACT_DATE" => $act_date,
						"RACT_DESCRIPTION" => $ract_description[$key]	
					);
				$this->UserModel->updateAdminUserResumeActivity($updateArr, $ract_seq[$key]);
			}else{
				$insertArr = array(
						"RESUME_SEQ" => $admin_resume_seq,
						"RACT_DATE" => $act_date,
						"RACT_DESCRIPTION" => $ract_description[$key]	
					);
				$this->UserModel->createAdminUserResumeActivity($insertArr);
			}
		}
		
		foreach ($rahcv_title as $key => $ahcv_title){
			if(count($rahcv_seq)-1 >= $key){
				$updateArr = array(
						"RACHV_TITLE" => $ahcv_title,
						"RACHV_DESCRIPTION" => $rahcv_description[$key]
					);
				$this->UserModel->updateAdminUserResumeAchiv($updateArr, $rahcv_seq[$key]);
			}else{
				$insertArr = array(
						"RESUME_SEQ" => $admin_resume_seq,
						"RACHV_TITLE" => $ahcv_title,
						"RACHV_DESCRIPTION" => $rahcv_description[$key]
					);
				$this->UserModel->createAdminUserResumeAchiv($insertArr);
			}
		}
		foreach ($rskil_date as $key => $skill_date){
			if(count($rskil_seq)-1 >= $key){
				$updateArr = array(
						"RSKL_DATE" => $skill_date,
						"RSKL_DESCRIPTION" => $rskil_description[$key]
					);
				$this->UserModel->updateAdminUserResumeSkill($updateArr, $rskil_seq[$key]);
			}else{
				$insertArr = array(
						"RESUME_SEQ" => $admin_resume_seq,
						"RSKL_DATE" => $skill_date,
						"RSKL_DESCRIPTION" => $rskil_description[$key]
					);
				$this->UserModel->createAdminUserResumeSkill($insertArr);
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
						"RESUME_SEQ" => $admin_resume_seq,
						"RLANG_NAME" => $lang_date,
						"RLANG_SPEAKING" => $rlang_speaking[$key],
						"RLANG_WRITING" => $rlang_writing[$key]
					);
				$this->UserModel->createUserResumeLanguage($insertArr);
			}
		}

		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/resume_admin/";
		$config["allowed_types"] = "jpg|png|jpeg|JPG|PNG|JPEG";
		$new_name = "resume_". $admin_resume_seq . "_img_" . date("YmdHis");
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
					echo 'File already exists : upload/resume_admin/' . $_FILES['resume_img']['name'];
				} else {
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('resume_img')) {
						echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$resume_img = $_FILES['resume_img']['name'];
						$resume_img_path = "/upload/resume_admin/".$this->upload->data("file_name");
					}
				}
			}
		} else {
			//echo 'Please choose a file';.
			$resume = $this->UserModel->getUserResume($this->session->userdata("USER_SEQ"));
			$resume_img_path = $resume->RESUME_USER_PHOTO;
		}

		$updateArr = array(
						"RESUME_USER_PHOTO" => $resume_img_path
					);

		$result = $this->UserModel->updateAdminUserResume($updateArr, $admin_resume_seq);

		//echo $this->db->last_query();

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "이력서가 수정되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "이력서 수정중 문제가 생겼습니다."));
		}
	}

	public function recruit_resume_view_print($resume_seq){
		$DATA["RESUME_INFO"] = $this->RecruitModel->getRecruitResumeInfo($resume_seq);
		$DATA["RESUME_EDUCATION"] = $this->RecruitModel->getRecruitResumeEducation($resume_seq);
		$DATA["RESUME_AHIEVEMENT"] = $this->RecruitModel->getRecruitResumeAhvmnt($resume_seq);
		$DATA["RESUME_ACTIVITY"] = $this->RecruitModel->getRecruitResumeActivity($resume_seq);
		$DATA["RESUME_LANGUAGE"] = $this->RecruitModel->getRecruitResumeLanguage($resume_seq);
		$DATA["RESUME_SKILL"] = $this->RecruitModel->getRecruitResumeSkill($resume_seq);
		$DATA["RESUME_WORKING_EXP"] = $this->RecruitModel->getRecruitResumeWokringExp($resume_seq);
        
		$this->load->view("./admin/recruit/recruit-resume_view_print", $DATA);
	}

	public function recruit_resume_del($resume_seq){
		
		$result = $this->RecruitModel->deleteRecruitResume($resume_seq);

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
	}

	public function recruit_resumes_del(){
		$seqs = isset($_POST["SEQ"]) ? $_POST["SEQ"] : "";

		$result = $this->RecruitModel->deleteRecruitResumes($seqs);

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
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

	public function recruit_abroad_display_up(){
		$RecruitSeq = isset($_POST["RecruitSeq"]) ? $_POST["RecruitSeq"] : "";
		$RecruitDisplayOrder = isset($_POST["RecruitDisplayOrder"]) ? $_POST["RecruitDisplayOrder"] : "";
		$RecruitPrevSeq = isset($_POST["RecruitPrevSeq"]) ? $_POST["RecruitPrevSeq"] : "";

		$current = $this->RecruitModel->getRecruitAbroad($RecruitSeq);
		$prev = $this->RecruitModel->getRecruitAbroad($RecruitPrevSeq);

		$currentOrder = $current->REC_DISPLAY_ORDER;
		$prevOrder = $prev->REC_DISPLAY_ORDER;

		$result = $this->RecruitModel->updateRecruitAbroad($RecruitSeq, array("REC_DISPLAY_ORDER" => $prevOrder));
		$result = $this->RecruitModel->updateRecruitAbroad($RecruitPrevSeq, array("REC_DISPLAY_ORDER" => $currentOrder));

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "다시 시도해주세요"));
		}
	}

	public function recruit_abroad_display_down(){
		$RecruitSeq = isset($_POST["RecruitSeq"]) ? $_POST["RecruitSeq"] : "";
		$RecruitDisplayOrder = isset($_POST["RecruitDisplayOrder"]) ? $_POST["RecruitDisplayOrder"] : "";
		$RecruitAfterSeq = isset($_POST["RecruitAfterSeq"]) ? $_POST["RecruitAfterSeq"] : "";

		$current = $this->RecruitModel->getRecruitAbroad($RecruitSeq);
		$after = $this->RecruitModel->getRecruitAbroad($RecruitAfterSeq);

		$currentOrder = $current->REC_DISPLAY_ORDER;
		$afterOrder = $after->REC_DISPLAY_ORDER;

		$result = $this->RecruitModel->updateRecruitAbroad($RecruitSeq, array("REC_DISPLAY_ORDER" => $afterOrder));
		$result = $this->RecruitModel->updateRecruitAbroad($RecruitAfterSeq, array("REC_DISPLAY_ORDER" => $currentOrder));

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "다시 시도해주세요"));
		}
	}

	public function recruit_document_list(){
		$limit = 15;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*15;
			$nowpage = $_GET["per_page"];
		}

		$search_text = isset($_GET["document_search_text"]) ? $_GET["document_search_text"] : "";
		$search_option = isset($_GET["document_search_option"]) ? $_GET["document_search_option"] : "";
		$start_date = isset($_GET["start_date"]) ? $_GET["start_date"] : "";
		$end_date = isset($_GET["end_date"]) ? $_GET["end_date"] : "";
		$user_level = isset($_GET["user_level"]) ? $_GET["user_level"] : "";
		$doc_status = isset($_GET["doc_status"]) ? $_GET["doc_status"] : "";

		$wheresql = array(
						"search_text" => $search_text,
						"search_option" => $search_option,
						"start_date" => $start_date,
						"end_date" => $end_date,
						"user_level" => $user_level,
						"doc_status" => $doc_status,
						"start" => $start,
						"limit" => $limit
					);
		// print_r($searchTxt);
		$lists = $this->UserModel->getUserWithDocument($wheresql);
		// $lists = array();
		// echo $this->db->last_query();
		$listCount = $this->UserModel->getUserWithDocumentCount($wheresql);
		$listCountAll = $this->UserModel->getUserWithDocumentCountAll($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*15);
		}else{
			$pagenum = $listCount;
		}

		$queryString = "?document_search_option=".$search_option."&document_search_text=".$search_text."&start_date=".$start_date."&end_date=".$end_date."&user_level=".$user_level."&doc_status=".$doc_status;

		$pagination = $this->customclass->pagenavi("/admin/recruit/recruit_document_list".$queryString, $listCount, 15, 5, $nowpage);
		//print_r($listCount);
		$data = array(
					"lists" => $lists,
					"listCount" => $listCount,
					"listCountAll" => $listCountAll,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit,
					"search_text" => $search_text,
					"search_option" => $search_option,
					"start_date" => $start_date,
					"end_date" => $end_date,
					"user_level" => $user_level,
					"doc_status" => $doc_status,
					);

		$this->load->view("./admin/recruit/recruit-document_list", $data);
	}
	
	public function getUserDocument(){
		$seq = isset($_POST["DOC_SEQ"]) ? $_POST["DOC_SEQ"] : "";

		$document = $this->UserModel->getUserDocumentByDocSeq($seq);

		if ($document){
			echo json_encode(array("code" => "200", "document" => $document ));
		}else{
			echo json_encode(array("code" => "202", "msg" => "문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
	}

	public function saveUserDocument(){
		$seq = isset($_POST["DOC_SEQ"]) ? $_POST["DOC_SEQ"] : "";
		$status = isset($_POST["DOC_STATUS"]) ? $_POST["DOC_STATUS"] : "";
		$eq = isset($_POST["DOC_EQ_FLAG"]) ? $_POST["DOC_EQ_FLAG"] : "";
		$cl = isset($_POST["DOC_CL_FLAG"]) ? $_POST["DOC_CL_FLAG"] : "";
		$ec = isset($_POST["DOC_EC_FLAG"]) ? $_POST["DOC_EC_FLAG"] : "";
		$pp = isset($_POST["DOC_PASSPORT_FLAG"]) ? $_POST["DOC_PASSPORT_FLAG"] : "";
		$sc = isset($_POST["DOC_SC_FLAG"]) ? $_POST["DOC_SC_FLAG"] : "";
		$ph = isset($_POST["DOC_PHOTO_FLAG"]) ? $_POST["DOC_PHOTO_FLAG"] : "";
		$rod = isset($_POST["DOC_ROD_FLAG"]) ? $_POST["DOC_ROD_FLAG"] : "";
		$tran = isset($_POST["DOC_TRANSCRIPT_FLAG"]) ? $_POST["DOC_TRANSCRIPT_FLAG"] : "";
		$rec = isset($_POST["DOC_RECOMMENDATION_FLAG"]) ? $_POST["DOC_RECOMMENDATION_FLAG"] : "";
		$rec2 = isset($_POST["DOC_RECOMMENDATION2_FLAG"]) ? $_POST["DOC_RECOMMENDATION2_FLAG"] : "";
		$ms = isset($_POST["DOC_MS_FLAG"]) ? $_POST["DOC_MS_FLAG"] : "";
		$ee = isset($_POST["DOC_CERTIFICATE_EE_FLAG"]) ? $_POST["DOC_CERTIFICATE_EE_FLAG"] : "";

		$updateArr = array(
			"DOC_STATUS" => $status,
			"DOC_EQ_FLAG" => $eq,
			"DOC_CL_FLAG" => $cl,
			"DOC_EC_FLAG" => $ec,
			"DOC_PASSPORT_FLAG" => $pp,
			"DOC_SC_FLAG" => $sc,
			"DOC_PHOTO_FLAG" => $ph,
			"DOC_ROD_FLAG" => $rod,
			"DOC_TRANSCRIPT_FLAG" => $tran,
			"DOC_RECOMMENDATION_FLAG" => $rec,
			"DOC_RECOMMENDATION2_FLAG" => $rec2,
			"DOC_MS_FLAG" => $ms,
			"DOC_CERTIFICATE_EE_FLAG" => $ee,
			"DOC_LAST_CHECK_DATE" => date("YmdHis")
		);


		$result = $this->UserModel->updateUserDocument($updateArr, $seq);

		if ($result){
			echo json_encode(array("code" => "200", "msg" => "저장되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
	}

	public function DocumentDown($doc_seq, $flag){
		$doc_info = $this->UserModel->getUserDocumentByDocSeq($doc_seq);
		if($flag == "eq"){
			$path = $doc_info->DOC_EQ;
			$name = $doc_info->DOC_EQ_FILE_NAME;
		}else if($flag == "cl"){
			$path = $doc_info->DOC_CL;
			$name = $doc_info->DOC_CL_FILE_NAME;
		}else if($flag == "ec"){
			$path = $doc_info->DOC_EC;	
			$name = $doc_info->DOC_EC_FILE_NAME;
		}else if($flag == "pp"){
			$path = $doc_info->DOC_PASSPORT;
			$name = $doc_info->DOC_PASSPORT_FILE_NAME;
		}else if($flag == "sc"){
			$path = $doc_info->DOC_SC;
			$name = $doc_info->DOC_SC_FILE_NAME;
		}else if($flag == "ph"){
			$path = $doc_info->DOC_PHOTO;
			$name = $doc_info->DOC_PHOTO_FILE_NAME;
		}else if($flag == "rod"){
			$path = $doc_info->DOC_ROD;
			$name = $doc_info->DOC_ROD_FILE_NAME;
		}else if($flag == "tran"){
			$path = $doc_info->DOC_TRANSCRIPT;
			$name = $doc_info->DOC_TRANSCRIPT_FILE_NAME;
		}else if($flag == "rec"){
			$path = $doc_info->DOC_RECOMMENDATION;
			$name = $doc_info->DOC_RECOMMENDATION_FILE_NAME;
		}else if($flag == "rec2"){
			$path = $doc_info->DOC_RECOMMENDATION2;
			$name = $doc_info->DOC_RECOMMENDATION2_FILE_NAME;
		}else if($flag == "ms"){
			$path = $doc_info->DOC_MS;
			$name = $doc_info->DOC_MS_FILE_NAME;
		}else if($flag == "ee"){
			$path = $doc_info->DOC_CERTIFICATE_EE;
			$name = $doc_info->DOC_CERTIFICATE_EE_FILE_NAME;
		}
		
        $data = file_get_contents($_SERVER['DOCUMENT_ROOT'].$path);
        // force_download($atach_info->FILE_NAME, $data);
        force_download(mb_convert_encoding($name, 'euc-kr', 'utf-8'), $data);
    }

	public function recruit_certificate_list(){
		$limit = 15;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*15;
			$nowpage = $_GET["per_page"];
		}

		$search_text = isset($_GET["document_search_text"]) ? $_GET["document_search_text"] : "";
		$search_option = isset($_GET["document_search_option"]) ? $_GET["document_search_option"] : "";
		$user_level = isset($_GET["user_level"]) ? $_GET["user_level"] : "";


		$wheresql = array(
						"search_text" => $search_text,
						"search_option" => $search_option,
						"user_level" => $user_level,
						"start" => $start,
						"limit" => $limit
					);
		// print_r($searchTxt);
		$lists = $this->UserModel->getUserWithCertifiCate($wheresql);
		// $lists = array();
		// echo $this->db->last_query();
		$listCount = $this->UserModel->getUserWithCertificatetCount($wheresql);
		$listCountAll = $this->UserModel->getUserWithCertificateCountAll($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*15);
		}else{
			$pagenum = $listCount;
		}

		$queryString = "?search_option=".$search_option."&search_text=".$search_text."&user_level=".$user_level;

		$pagination = $this->customclass->pagenavi("/admin/recruit/recruit_certificate_list".$queryString, $listCount, 15, 5, $nowpage);
		//print_r($listCount);
		$data = array(
					"lists" => $lists,
					"listCount" => $listCount,
					"listCountAll" => $listCountAll,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit,
					"search_text" => $search_text,
					"search_option" => $search_option,
					"user_level" => $user_level,
					);

			$this->load->view("./admin/recruit/recruit-certificate_list", $data);
		}
	public function uploadUserCertificate(){
		$user_seq = isset($_POST["USER_SEQ"]) ? $_POST["USER_SEQ"] : "";

		$cert_info = $this->UserModel->getUserCertificate($user_seq);

		if($cert_info){
			$cert_seq = $cert_info->CERT_SEQ;
		}else{
			$insertArr = array(
				"USER_SEQ" => $user_seq
			);
			$this->UserModel->createUserCertificate($insertArr);
			$cert_seq = $this->db->insert_id();
		}

		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/certificate/";
		$config["allowed_types"] = '*';
		$new_name = "cert_". $user_seq . "_" . date("YmdHis");
		$config["file_name"] = $new_name;
		$this->load->library("upload", $config);

		$this->upload->initialize($config);

		$certfile = "";
		$certfile_path = "";
		if (isset($_FILES['certificate']['name'])) {
			if (0 < $_FILES['certificate']['error']) {
				echo 'Error during file upload' . $_FILES['certificate']['error'];
			} else {
				if (file_exists('upload/certificate/' . $_FILES['certificate']['name'])) {
					echo 'File already exists : upload/certificate/' . $_FILES['certificate']['name'];
				} else {
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('certificate')) {
						echo $this->upload->display_errors();
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$certfile = $_FILES['certificate']['name'];
						$certfile_path = "/upload/certificate/".$this->upload->data("file_name");
					}
				}
			}
		} else {
			echo 'Please choose a file';
		}

		$updateArr = array(
						'CERT_PATH' => $certfile_path,
						"CERT_NAME" => $certfile,
						"CERT_REG_DATE" => date("YmdHis")
					);

		$result = $this->UserModel->updateUserCertificate($updateArr, $cert_seq);
		

		if ($result){
			echo json_encode(array("code" => "200", "msg" => "저장되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
	}

	public function CertificateDown($cert_seq){
		$cert_info = $this->UserModel->getUserCertificateByCertSeq($cert_seq);
        $data = file_get_contents($_SERVER['DOCUMENT_ROOT'].$cert_info->CERT_PATH);
        // force_download($atach_info->FILE_NAME, $data);
        force_download(mb_convert_encoding($cert_info->CERT_NAME, 'euc-kr', 'utf-8'), $data);
    }


	
}

