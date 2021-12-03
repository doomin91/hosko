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
        $this->load->helper('download');

        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('CustomClass');
        $this->load->library('image_lib');

        $this->load->model("UserModel");
		$this->load->model("ConsultModel");
        $this->load->model("RecruitModel");

        date_default_timezone_set('Asia/Seoul');
    }

    public function index(){
        $CATEGORY = isset($_GET["ctg"]) ? $_GET["ctg"] : 1;

        $limit = 10;
        $nowpage = "";
        // print_r($_GET);
        if (!isset($_GET["per_page"])){
            $start = 0;
        }else{
            $start = ($_GET["per_page"]-1)*$limit;
            $nowpage = $_GET["per_page"];
        }

        $searchField = isset($_GET["search_field"]) ? $_GET["search_field"] : "";
        $searchString = isset($_GET["search_string"]) ? $_GET["search_string"] : "";

        $wheresql = array(
            "searchField" => $searchField,
            "searchString" => $searchString,
            "start" => $start,
            "limit" => $limit
        );

        if($CATEGORY == 1){
            $REC_LIST = $this->RecruitModel->getRecruitInternShipList($wheresql);
            // print_r($this->db->last_query());
            $REC_LIST_COUNT = $this->RecruitModel->getRecruitInternShipListCount($wheresql);
        }else if( $CATEGORY == 2){
            $REC_LIST = $this->RecruitModel->getRecruitJobList($wheresql);
            // print_r($this->db->last_query());
            $REC_LIST_COUNT = $this->RecruitModel->getRecruitJobListCount($wheresql);
        }

        if ($nowpage != ""){
            $pagenum = $REC_LIST_COUNT-(($nowpage-1)*$limit);
        }else{
            $pagenum = $REC_LIST_COUNT;
        }

        $queryString = "&search_field=". $searchField. "&search_string=".$searchString;
        // $pagination = $this->customclass->pagenavi("/admin/recruit/recruit_certificate_list".$queryString, $listCount, 15, 5, $nowpage);
        $pagination = $this->customclass->front_pagenavi("/recruit?ctg=".$CATEGORY.$queryString, $REC_LIST_COUNT, $limit, 5, $nowpage);

        $DATA["CATEGORY"] = $CATEGORY;
        $DATA["REC_LIST"] = $REC_LIST;
        $DATA["REC_LIST_COUNT"] = $REC_LIST_COUNT;
        $DATA["searchField"] = $searchField;
        $DATA["searchString"] = $searchString;
        $DATA["pagination"] = $pagination;
        $DATA["pagenum"] = $pagenum;
        $DATA["start"] = $start;
        $DATA["limit"] = $limit;

        $this->load->view("recruit/recruit_list", $DATA);
    }

    public function recruit_view($category, $rec_seq){
        // print_r($rec_seq);
        $CATEGORY = $category;
        $RECRUIT = $this->RecruitModel->getRecruitAbroad($rec_seq);
        // print_r($RECRUIT);

        $DATA["CATEGORY"] = $CATEGORY;
        $DATA["RECRUIT"] = $RECRUIT;

        $this->customclass->addRecruitVisitCount($rec_seq);

        $this->load->view("recruit/recruit_view", $DATA);
    }

    public function recruit_new($category, $rec_seq){
        $CATEGORY = $category;
        $USER = $this->UserModel->getUserInfo($this->session->userdata("USER_SEQ"));
        $RECRUIT = $this->RecruitModel->getRecruitAbroad($rec_seq);

        $DATA["CATEGORY"] = $CATEGORY;
        $DATA["RECRUIT"] = $RECRUIT;
        $DATA["USER"] = $USER;

        $this->load->view("recruit/recruit_new", $DATA);
    }

    public function recruit_new_proc(){
        $rec_seq = isset($_POST["rec_seq"]) ? $_POST["rec_seq"] : "";
        $user_seq = isset($_POST["user_seq"]) ? $_POST["user_seq"] : "";
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

        $insertArr = array(
            "REC_SEQ" => $rec_seq,
            "USER_SEQ" => $user_seq,
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
	
		$result = $this->RecruitModel->insertRecruitApply($insertArr);

        $insert_id = $this->db->insert_id();

        if (isset($_FILES["apply_user_img"]) && !empty($_FILES["apply_user_img"])){
            // $_FILES["abroad_origin_pic"]["name"];
            
			if ($_FILES["apply_user_img"]["error"] > 0){
				echo "Error : " . $_FILES["apply_user_img"]["error"];
			}else{
				if (file_exists("/upload/apply/".$_FILES["apply_user_img"]["name"])){
					echo "동일한 이름의 파일이 존재합니다.";
				}else{
					$tmp = explode(".", $_FILES["apply_user_img"]["name"]);
					$time = time();
					$new_name = "APPLY".$time."_".$insert_id.".".end($tmp);
					// print_r($new_name);
					/* 
						$_FILES["apply_attach"]에서

						[tmp_name] => Array
							(
								[0] => C:\xampp\tmp\phpA57A.tmp
							)
						tmp 경로에서 -> 실제 업로드 경로
					*/  
					move_uploaded_file($_FILES["apply_user_img"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/upload/apply/".$new_name);
					//array_push($file_name, preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\|\!\?\*$#<>()\[\]\{\}]/i", "",$tmp[0]).".".$tmp[count($tmp)-1]);
					$file_name = $_FILES["apply_user_img"]["name"];
					$file_path = "./upload/apply/".$new_name;
					// print_r($_FILES["apply_attach"]);
				}
			}

			$thumb_file_path = "";
			
            $config['image_library'] = 'gd2';
            $config['source_image'] = $file_path;
            $config['new_image'] = "./upload/apply/"."APPLY".$time."_".$insert_id."_USER_THUMB".".".end($tmp);
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

			$result2 = $this->RecruitModel->updateRecruitApply($insert_id, array("APP_USER_IMG" => $thumb_file_path));
            
        }else{
            $user_info = $this->UserModel->getUserInfo($this->session->userdata("USER_SEQ"));
            // print_r($user_info);
            if($user_info->USER_PROFILE && $user_info->USER_PROFILE != ""){
                $time = time();
                $tmp = explode(".", $user_info->USER_PROFILE);

                $thumb_file_path = "";
                
                $config['image_library'] = 'gd2';
                $config['source_image'] = ".".$user_info->USER_PROFILE;
                $config['new_image'] = "./upload/apply/"."APPLY".$time."_".$insert_id."_USER_THUMB".".".end($tmp);
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

                $result2 = $this->RecruitModel->updateRecruitApply($insert_id, array("APP_USER_IMG" => $thumb_file_path));
            }
            

        }

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => "삭제 중 문제가 생겼습니다. 관리자에게 문의해주세요."));
		}
    }

    

    

}
