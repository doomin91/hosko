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

		$reg_date_start = isset($_GET["reg_date_start"]) ? $_GET["reg_date_start"] : "";
		$reg_date_end = isset($_GET["reg_date_end"]) ? $_GET["reg_date_end"] : "";
		$last_login_start = isset($_POST["last_login_start"]) ? $_POST["last_login_start"] : "";
		$last_login_end = isset($_POST["last_login_end"]) ? $_POST["last_login_end"] : "";
		$user_type = isset($_GET["user_type"]) ? $_GET["user_type"] : "";
		$searchField = isset($_GET["searchField"]) ? $_GET["searchField"] : "";
		$searchString = isset($_GET["searchString"]) ? $_GET["searchString"] : "";

		$wheresql = array(
						"reg_date_start" => $reg_date_start,
						"reg_date_end" => $reg_date_end,
						"last_login_start" => $last_login_start,
						"last_login_end" => $last_login_end,
						"user_type" => $user_type,
						"searchField" => $searchField,
						"searchString" => $searchString,
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
					"user_type" => $user_type,
					"searchField" => $searchField,
					"searchString" => $searchString,
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

	public function user_write_proc(){
		$email = isset($_POST["email"]) ? $_POST["email"] : "";
		$password = isset($_POST["password"]) ? $_POST["password"] : "";
		$nick_name = isset($_POST["nick_name"]) ? $_POST["nick_name"] : "";
		$user_type = isset($_POST["user_type"]) ? $_POST["user_type"] : "C";

		$guide_name = isset($_POST["guide_name"]) ? $_POST["guide_name"] : "";
		$guide_gender = isset($_POST["guide_gender"]) ? $_POST["guide_gender"] : "";
		$guide_birth_year = isset($_POST["birth_year"]) ? $_POST["birth_year"] : "";
		$guide_tel = isset($_POST["guide_tel"]) ? $_POST["guide_tel"] : "";
		$guide_tel_em = isset($_POST["guide_tel_em"]) ? $_POST["guide_tel_em"] : "";
		$guide_sns = isset($_POST["guide_sns"]) ? $_POST["guide_sns"] : "";
		$guide_region_code = isset($_POST["guide_region_code"]) ? $_POST["guide_region_code"] : "";
		$guide_language = isset($_POST["guide_language"]) ? $_POST["guide_language"] : "";
		$etc_language = isset($_POST["etc_language"]) ? $_POST["etc_language"] : "";

		$service_check = isset($_POST["service_check"]) ? $_POST["service_check"] : "";
		$service_title = isset($_POST["service_title"]) ? $_POST["service_title"] : "";
		$service_contents = isset($_POST["service_contents"]) ? $_POST["service_contents"] : "";
		$service_price = isset($_POST["service_price"]) ? $_POST["service_price"] : "";
		$service_cur_type = isset($_POST["service_cur_type"]) ? $_POST["service_cur_type"] : "";
		$service_per_price = isset($_POST["service_per_price"]) ? $_POST["service_per_price"] : "";
		$service_max_cnt = isset($_POST["service_max_cnt"]) ? $_POST["service_max_cnt"] : "";
		$service_time = isset($_POST["service_time"]) ? $_POST["service_time"] : "";

		$drive_check = isset($_POST["drive_check"]) ? $_POST["drive_check"] : "";
		$drive_title = isset($_POST["drive_title"]) ? $_POST["drive_title"] : "";
		$drive_contents = isset($_POST["drive_contents"]) ? $_POST["drive_contents"] : "";
		$drive_price = isset($_POST["drive_price"]) ? $_POST["drive_price"] : "";
		$drive_cur_type = isset($_POST["drive_cur_type"]) ? $_POST["drive_cur_type"] : "";
		$drive_per_price = isset($_POST["drive_per_price"]) ? $_POST["drive_per_price"] : "";
		$drive_max_cnt = isset($_POST["drive_max_cnt"]) ? $_POST["drive_max_cnt"] : "";
		$drive_time = isset($_POST["drive_time"]) ? $_POST["drive_time"] : "";

		$homestay_check = isset($_POST["homestay_check"]) ? $_POST["homestay_check"] : "";
		$homestay_title = isset($_POST["homestay_title"]) ? $_POST["homestay_title"] : "";
		$homestay_contents = isset($_POST["homestay_contents"]) ? $_POST["homestay_contents"] : "";
		$homestay_price = isset($_POST["homestay_price"]) ? $_POST["homestay_price"] : "";
		$homestay_cur_type = isset($_POST["homestay_cur_type"]) ? $_POST["homestay_cur_type"] : "";
		$homestay_per_price = isset($_POST["homestay_per_price"]) ? $_POST["homestay_per_price"] : "";
		$homestay_max_cnt = isset($_POST["homestay_max_cnt"]) ? $_POST["homestay_max_cnt"] : "";
		$homestay_time = isset($_POST["homestay_time"]) ? $_POST["homestay_time"] : "";

		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/guide/";
		$config["allowed_types"] = "bmp|jpeg|png|gif|jpg";
		$config["overwrite"] = false;
		$config["remove_spaces"] = true;
		$this->load->library("upload", $config);

		$emailArr = explode('@', $email);
		$email_id = $emailArr[0];

		$guide_profile = "";
		if (isset($_FILES['guide_profile']['name'])) {
			if (0 < $_FILES['guide_profile']['error']) {
				echo 'Error during file upload1111' . $_FILES['guide_profile']['error'];
			} else {
				if (file_exists('uploads/guide/' . $_FILES['guide_profile']['name'])) {
					echo 'File already exists : uploads/guide/' . $_FILES['file_add']['name'];
				} else {
					$new_name = "profile_".$email_id."_".date("Ymd");
					$config["file_name"] = $new_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('guide_profile')) {
						echo json_encode(array("code" => "202", "msg" => $this->upload->display_errors()));
						exit;
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$guide_profile = $this->upload->data("file_name");
						//$file_add = $_FILES['guide_profile']['name'];
					}
				}
			}
		} else {
			//echo 'Please choose a file';
		}
		//print_r($_FILES["service_image"]);
		$service_image = "";
		if (isset($_FILES['service_image']['name']) && $_FILES['service_image']['name'] != "") {
			if (0 < $_FILES['service_image']['error']) {
				echo 'Error during file upload2222' . $_FILES['service_image']['error'];
			} else {
				if (file_exists('uploads/guide/' . $_FILES['service_image']['name'])) {
					echo 'File already exists : uploads/guide/' . $_FILES['file_add']['name'];
				} else {
					$new_name = "service_".$email_id."_".date("Ymd");
					$config["file_name"] = $new_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('service_image')) {
						echo json_encode(array("code" => "202", "msg" => "SERVICE - ".$this->upload->display_errors()));
						exit;
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$service_image = $this->upload->data("file_name");
						//$file_add = $_FILES['guide_profile']['name'];
					}
				}
			}
		} else {
			//echo 'Please choose a file';
		}

		$drive_image = "";
		if (isset($_FILES['drive_image']['name']) && $_FILES['drive_image']['name'] != "") {
			if (0 < $_FILES['drive_image']['error']) {
				echo 'Error during file upload3333' . $_FILES['drive_image']['error'];
			} else {
				if (file_exists('uploads/guide/' . $_FILES['drive_image']['name'])) {
					echo 'File already exists : uploads/guide/' . $_FILES['file_add']['name'];
				} else {
					$new_name = "drive_".$email_id."_".date("Ymd");
					$config["file_name"] = $new_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('drive_image')) {
						echo json_encode(array("code" => "202", "msg" => "DRIVE - ".$this->upload->display_errors()));
						exit;
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$drive_image = $this->upload->data("file_name");
						//$file_add = $_FILES['guide_profile']['name'];
					}
				}
			}
		} else {
			//echo 'Please choose a file';
		}

		$homestay_image = "";
		if (isset($_FILES['homestay_image']['name']) && $_FILES['homestay_image']['name'] != "") {
			if (0 < $_FILES['homestay_image']['error']) {
				echo 'Error during file upload4444' . $_FILES['homestay_image']['error'];
			} else {
				if (file_exists('uploads/guide/' . $_FILES['homestay_image']['name'])) {
					echo 'File already exists : uploads/guide/' . $_FILES['file_add']['name'];
				} else {
					$new_name = "homestay_".$email_id."_".date("Ymd");
					$config["file_name"] = $new_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('homestay_image')) {
						echo json_encode(array("code" => "202", "msg" => "HOMESTAY - ".$this->upload->display_errors()));
						exit;
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$homestay_image = $this->upload->data("file_name");
						//$file_add = $_FILES['guide_profile']['name'];
					}
				}
			}
		} else {
			//echo 'Please choose a file';
		}

		$insertData = array(
						"USER_EMAIL" => $email,
						"USER_PWD" => md5($password),
						"USER_NICK_NAME" => $nick_name,
						"USER_TYPE" => $user_type,
						"USER_REG_DATE" => date("Y-m-d H:i:s"),
						"USER_DEL_YN" => "N"
							);
		$result = $this->UserModel->insertUser($insertData);
		$user_seq = $this->db->insert_id();

		if ($user_type == "G"){
			$guide_data = array(
							"USER_SEQ" => $user_seq,
							"GUIDE_NAME" => $guide_name,
							"GUIDE_GENDER" => $guide_gender,
							"GUIDE_BIRTH_YEAR" => $guide_birth_year,
							"GUIDE_TEL" => $guide_tel,
							"GUIDE_TEL_EM" => $guide_tel_em,
							"GUIDE_SNS" => $guide_sns,
							"GUIDE_PROFILE" => $guide_profile,
							"GUIDE_REGION_CODE" => $guide_region_code,
							"GUIDE_REG_DATE" => date("Y-m-d H:i:s"),
							"GUIDE_REG_IP" => $_SERVER["REMOTE_ADDR"],
							"GUIDE_STATUS" => "A"
			);
			$result = $this->GuideModel->insertGuideInfo($guide_data);

			$guide_seq = $this->db->insert_id();

			$lan_arr = explode(",", $guide_language);
			foreach ($lan_arr as $lan):
				if ($lan == "etc"){
					$language_data = array(
										"GUIDE_SEQ" => $guide_seq,
										"LANGUAGE_TYPE" => $lan,
										"ETC_LANGUAGE" => $etc_language
					);
				}else{
					$language_data = array(
						"GUIDE_SEQ" => $guide_seq,
						"LANGUAGE_TYPE" => $lan,
						"ETC_LANGUAGE" => $etc_language
					);
				}
				$result = $this->GuideModel->insertGuideLanguage($language_data);
			endforeach;

			if ($service_check == "Y"){
				$service_arr = array(
								"GUIDE_SEQ" => $guide_seq,
								"SERVICE_TITLE" => $service_title,
								"SERVICE_CONTENTS" => $service_contents,
								"SERVICE_IMAGE" => $service_image,
								"SERVICE_PRICE" => $service_price,
								"SERVICE_CUR_TYPE" => $service_cur_type,
								"SERVICE_PER_PRICE" => $service_per_price,
								"SERVICE_MAX_CNT" => $service_max_cnt,
								"SERVICE_TIME" => $service_time,
								"SERVICE_REG_DATE" => date("Y-m-d H:i:s")
				);
				$this->GuideModel->insertGuideService($service_arr);
			}

			if ($drive_check == "Y"){
				$drive_arr = array(
								"GUIDE_SEQ" => $guide_seq,
								"DRIVE_TITLE" => $drive_title,
								"DRIVE_CONTENTS" => $drive_contents,
								"DRIVE_IMAGE" => $drive_image,
								"DRIVE_PRICE" => $drive_price,
								"DRIVE_CUR_TYPE" => $drive_cur_type,
								"DRIVE_PER_PRICE" => $drive_per_price,
								"DRIVE_MAX_CNT" => $drive_max_cnt,
								"DRIVE_TIME" => $drive_time,
								"DRIVE_REG_DATE" => date("Y-m-d H:i:s")
				);
				$this->GuideModel->insertGuideDrive($drive_arr);
			}

			if ($homestay_check == "Y"){
				$homestay_arr = array(
								"GUIDE_SEQ" => $guide_seq,
								"HOMESTAY_TITLE" => $homestay_title,
								"HOMESTAY_CONTENTS" => $homestay_contents,
								"HOMESTAY_IMAGE" => $homestay_image,
								"HOMESTAY_PRICE" => $homestay_price,
								"HOMESTAY_CUR_TYPE" => $homestay_cur_type,
								"HOMESTAY_PER_PRICE" => $homestay_per_price,
								"HOMESTAY_MAX_CNT" => $homestay_max_cnt,
								"HOMESTAY_TIME" => $homestay_time,
								"HOMESTAY_REG_DATE" => date("Y-m-d H:i:s")
				);
				$this->GuideModel->insertGuideHomestay($homestay_arr);
			}
		}

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => $result));
		}
	}

	public function user_modify($user_seq){
		$user_info = $this->UserModel->getUserInfo($user_seq);

		$data["info"] = $user_info;
		$this->load->view("admin/user/user-modify", $data);
	}

	public function user_modify_proc(){
		$seq = isset($_POST["seq"]) ? $_POST["seq"] : "";
		$email = isset($_POST["email"]) ? $_POST["email"] : "";
		$nick_name = isset($_POST["nick_name"]) ? $_POST["nick_name"] : "";
		$user_type = isset($_POST["user_type"]) ? $_POST["user_type"] : "";

		$guide_seq = isset($_POST["guide_seq"]) ? $_POST["guide_seq"] : "";
		$guide_profile_tmp = isset($_POST["guide_profile_tmp"]) ? $_POST["guide_profile_tmp"] : "";
		$guide_name = isset($_POST["guide_name"]) ? $_POST["guide_name"] : "";
		$guide_gender = isset($_POST["guide_gender"]) ? $_POST["guide_gender"] : "";
		$guide_birth_year = isset($_POST["birth_year"]) ? $_POST["birth_year"] : "";
		$guide_tel = isset($_POST["guide_tel"]) ? $_POST["guide_tel"] : "";
		$guide_tel_em = isset($_POST["guide_tel_em"]) ? $_POST["guide_tel_em"] : "";
		$guide_sns = isset($_POST["guide_sns"]) ? $_POST["guide_sns"] : "";
		$guide_region_code = isset($_POST["guide_region_code"]) ? $_POST["guide_region_code"] : "";
		$guide_language = isset($_POST["guide_language"]) ? $_POST["guide_language"] : "";
		$etc_language = isset($_POST["etc_language"]) ? $_POST["etc_language"] : "";

		$service_seq = isset($_POST["service_seq"]) ? $_POST["service_seq"] : "";
		$service_image_tmp = isset($_POST["service_image_tmp"]) ? $_POST["service_image_tmp"] : "";
		$service_check = isset($_POST["service_check"]) ? $_POST["service_check"] : "";
		$service_title = isset($_POST["service_title"]) ? $_POST["service_title"] : "";
		$service_contents = isset($_POST["service_contents"]) ? $_POST["service_contents"] : "";
		$service_price = isset($_POST["service_price"]) ? $_POST["service_price"] : "";
		$service_cur_type = isset($_POST["service_cur_type"]) ? $_POST["service_cur_type"] : "";
		$service_per_price = isset($_POST["service_per_price"]) ? $_POST["service_per_price"] : "";
		$service_max_cnt = isset($_POST["service_max_cnt"]) ? $_POST["service_max_cnt"] : "";
		$service_time = isset($_POST["service_time"]) ? $_POST["service_time"] : "";

		$drive_seq = isset($_POST["drive_seq"]) ? $_POST["drive_seq"] : "";
		$drive_image_tmp = isset($_POST["drive_image_tmp"]) ? $_POST["drive_image_tmp"] : "";
		$drive_check = isset($_POST["drive_check"]) ? $_POST["drive_check"] : "";
		$drive_title = isset($_POST["drive_title"]) ? $_POST["drive_title"] : "";
		$drive_contents = isset($_POST["drive_contents"]) ? $_POST["drive_contents"] : "";
		$drive_price = isset($_POST["drive_price"]) ? $_POST["drive_price"] : "";
		$drive_cur_type = isset($_POST["drive_cur_type"]) ? $_POST["drive_cur_type"] : "";
		$drive_per_price = isset($_POST["drive_per_price"]) ? $_POST["drive_per_price"] : "";
		$drive_max_cnt = isset($_POST["drive_max_cnt"]) ? $_POST["drive_max_cnt"] : "";
		$drive_time = isset($_POST["drive_time"]) ? $_POST["drive_time"] : "";

		$homestay_seq = isset($_POST["homestay_seq"]) ? $_POST["homestay_seq"] : "";
		$homestay_image_tmp = isset($_POST["homestay_image_tmp"]) ? $_POST["homestay_image_tmp"] : "";
		$homestay_check = isset($_POST["homestay_check"]) ? $_POST["homestay_check"] : "";
		$homestay_title = isset($_POST["homestay_title"]) ? $_POST["homestay_title"] : "";
		$homestay_contents = isset($_POST["homestay_contents"]) ? $_POST["homestay_contents"] : "";
		$homestay_price = isset($_POST["homestay_price"]) ? $_POST["homestay_price"] : "";
		$homestay_cur_type = isset($_POST["homestay_cur_type"]) ? $_POST["homestay_cur_type"] : "";
		$homestay_per_price = isset($_POST["homestay_per_price"]) ? $_POST["homestay_per_price"] : "";
		$homestay_max_cnt = isset($_POST["homestay_max_cnt"]) ? $_POST["homestay_max_cnt"] : "";
		$homestay_time = isset($_POST["homestay_time"]) ? $_POST["homestay_time"] : "";

		$config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/guide/";
		$config["allowed_types"] = "bmp|jpeg|png|gif|jpg";
		$config["overwrite"] = false;
		$config["remove_spaces"] = true;
		$this->load->library("upload", $config);

		$emailArr = explode('@', $email);
		$email_id = $emailArr[0];

		$guide_profile = "";
		if (isset($_FILES['guide_profile']['name']) && $_FILES['guide_profile']['name'] != "") {
			if (0 < $_FILES['guide_profile']['error']) {
				echo 'Error during file upload1111' . $_FILES['guide_profile']['error'];
			} else {
				if (file_exists('uploads/guide/' . $_FILES['guide_profile']['name'])) {
					echo 'File already exists : uploads/guide/' . $_FILES['file_add']['name'];
				} else {
					$new_name = "profile_".$email_id."_".date("Ymd");
					$config["file_name"] = $new_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('guide_profile')) {
						echo json_encode(array("code" => "202", "msg" => $this->upload->display_errors()));
						exit;
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$guide_profile = $this->upload->data("file_name");
						//$file_add = $_FILES['guide_profile']['name'];
					}
				}
			}
		} else {
			$guide_profile = $guide_profile_tmp;
		}
		//print_r($_FILES["service_image"]);
		$service_image = "";
		if (isset($_FILES['service_image']['name']) && $_FILES['service_image']['name'] != "") {
			if (0 < $_FILES['service_image']['error']) {
				echo 'Error during file upload2222' . $_FILES['service_image']['error'];
			} else {
				if (file_exists('uploads/guide/' . $_FILES['service_image']['name'])) {
					echo 'File already exists : uploads/guide/' . $_FILES['file_add']['name'];
				} else {
					$new_name = "service_".$email_id."_".date("Ymd");
					$config["file_name"] = $new_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('service_image')) {
						echo json_encode(array("code" => "202", "msg" => "SERVICE - ".$this->upload->display_errors()));
						exit;
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$service_image = $this->upload->data("file_name");
						//$file_add = $_FILES['guide_profile']['name'];
					}
				}
			}
		} else {
			//echo 'Please choose a file';
			$service_image = $service_image_tmp;
		}

		$drive_image = "";
		if (isset($_FILES['drive_image']['name']) && $_FILES['drive_image']['name'] != "") {
			if (0 < $_FILES['drive_image']['error']) {
				echo 'Error during file upload3333' . $_FILES['drive_image']['error'];
			} else {
				if (file_exists('uploads/guide/' . $_FILES['drive_image']['name'])) {
					echo 'File already exists : uploads/guide/' . $_FILES['file_add']['name'];
				} else {
					$new_name = "drive_".$email_id."_".date("Ymd");
					$config["file_name"] = $new_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('drive_image')) {
						echo json_encode(array("code" => "202", "msg" => "DRIVE - ".$this->upload->display_errors()));
						exit;
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$drive_image = $this->upload->data("file_name");
						//$file_add = $_FILES['guide_profile']['name'];
					}
				}
			}
		} else {
			//echo 'Please choose a file';
			$drive_image = $drive_image_tmp;
		}

		$homestay_image = "";
		if (isset($_FILES['homestay_image']['name']) && $_FILES['homestay_image']['name'] != "") {
			if (0 < $_FILES['homestay_image']['error']) {
				echo 'Error during file upload4444' . $_FILES['homestay_image']['error'];
			} else {
				if (file_exists('uploads/guide/' . $_FILES['homestay_image']['name'])) {
					echo 'File already exists : uploads/guide/' . $_FILES['file_add']['name'];
				} else {
					$new_name = "homestay_".$email_id."_".date("Ymd");
					$config["file_name"] = $new_name;
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('homestay_image')) {
						echo json_encode(array("code" => "202", "msg" => "HOMESTAY - ".$this->upload->display_errors()));
						exit;
					} else {
						//echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
						$homestay_image = $this->upload->data("file_name");
						//$file_add = $_FILES['guide_profile']['name'];
					}
				}
			}
		} else {
			//echo 'Please choose a file';
			$homestay_image = $homestay_image_tmp;
		}

		$updateArr = array(
						"USER_EMAIL" => $email,
						"USER_NICK_NAME" => $nick_name,
						"USER_TYPE" => $user_type
		);

		$result = $this->UserModel->updateUser($updateArr, $seq);

		if ($user_type == "G"){
			$guide_data = array(
							"GUIDE_NAME" => $guide_name,
							"GUIDE_GENDER" => $guide_gender,
							"GUIDE_BIRTH_YEAR" => $guide_birth_year,
							"GUIDE_TEL" => $guide_tel,
							"GUIDE_TEL_EM" => $guide_tel_em,
							"GUIDE_SNS" => $guide_sns,
							"GUIDE_PROFILE" => $guide_profile,
							"GUIDE_REGION_CODE" => $guide_region_code,
			);
			$result = $this->GuideModel->updateGuideInfo($guide_data, $guide_seq);

			$lan_arr = explode(",", $guide_language);
			$this->GuideModel->deleteGuideLanguage($guide_seq);
			foreach ($lan_arr as $lan):
				if ($lan == "etc"){
					$language_data = array(
										"GUIDE_SEQ" => $guide_seq,
										"LANGUAGE_TYPE" => $lan,
										"ETC_LANGUAGE" => $etc_language
					);
				}else{
					$language_data = array(
						"GUIDE_SEQ" => $guide_seq,
						"LANGUAGE_TYPE" => $lan,
						"ETC_LANGUAGE" => $etc_language
					);
				}
				$result = $this->GuideModel->insertGuideLanguage($language_data);
			endforeach;

			if ($service_check == "Y"){
				$service_row = $this->GuideModel->getGuideService($guide_seq);
				if (!empty($service_row)) :
					$service_arr = array(
									"SERVICE_TITLE" => $service_title,
									"SERVICE_CONTENTS" => $service_contents,
									"SERVICE_IMAGE" => $service_image,
									"SERVICE_PRICE" => $service_price,
									"SERVICE_CUR_TYPE" => $service_cur_type,
									"SERVICE_PER_PRICE" => $service_per_price,
									"SERVICE_MAX_CNT" => $service_max_cnt,
									"SERVICE_TIME" => $service_time,
					);
					$this->GuideModel->updateGuideService($service_arr, $service_seq);
				else :
					$service_arr = array(
									"GUIDE_SEQ" => $guide_seq,
									"SERVICE_TITLE" => $service_title,
									"SERVICE_CONTENTS" => $service_contents,
									"SERVICE_IMAGE" => $service_image,
									"SERVICE_PRICE" => $service_price,
									"SERVICE_CUR_TYPE" => $service_cur_type,
									"SERVICE_PER_PRICE" => $service_per_price,
									"SERVICE_MAX_CNT" => $service_max_cnt,
									"SERVICE_TIME" => $service_time,
									"SERVICE_REG_DATE" => date("Y-m-d H:i:s")
					);
					$this->GuideModel->insertGuideService($service_arr);
				endif;
			}

			if ($drive_check == "Y"){
				$drive_row = $this->GuideModel->getGuideDrive($guide_seq);
				if (!empty($drive_row)) :
					$drive_arr = array(
									"DRIVE_TITLE" => $drive_title,
									"DRIVE_CONTENTS" => $drive_contents,
									"DRIVE_IMAGE" => $drive_image,
									"DRIVE_PRICE" => $drive_price,
									"DRIVE_CUR_TYPE" => $drive_cur_type,
									"DRIVE_PER_PRICE" => $drive_per_price,
									"DRIVE_MAX_CNT" => $drive_max_cnt,
									"DRIVE_TIME" => $drive_time,
					);
					$this->GuideModel->updateGuideDrive($drive_arr, $drive_seq);
				else :
					$drive_arr = array(
									"GUIDE_SEQ" => $guide_seq,
									"DRIVE_TITLE" => $drive_title,
									"DRIVE_CONTENTS" => $drive_contents,
									"DRIVE_IMAGE" => $drive_image,
									"DRIVE_PRICE" => $drive_price,
									"DRIVE_CUR_TYPE" => $drive_cur_type,
									"DRIVE_PER_PRICE" => $drive_per_price,
									"DRIVE_MAX_CNT" => $drive_max_cnt,
									"DRIVE_TIME" => $drive_time,
									"DRIVE_REG_DATE" => date("Y-m-d H:i:s")
					);
					$this->GuideModel->insertGuideDrive($drive_arr);
				endif;
			}

			if ($homestay_check == "Y"){
				$homestay_row = $this->GuideModel->getGuideHomestay($guide_seq);
				if (!empty($homestay_row)) :
					$homestay_arr = array(
									"HOMESTAY_TITLE" => $homestay_title,
									"HOMESTAY_CONTENTS" => $homestay_contents,
									"HOMESTAY_IMAGE" => $homestay_image,
									"HOMESTAY_PRICE" => $homestay_price,
									"HOMESTAY_CUR_TYPE" => $homestay_cur_type,
									"HOMESTAY_PER_PRICE" => $homestay_per_price,
									"HOMESTAY_MAX_CNT" => $homestay_max_cnt,
									"HOMESTAY_TIME" => $homestay_time,
					);
					$this->GuideModel->updateGuideHomestay($homestay_arr, $homestay_seq);
				else :
					$homestay_arr = array(
									"GUIDE_SEQ" => $guide_seq,
									"HOMESTAY_TITLE" => $homestay_title,
									"HOMESTAY_CONTENTS" => $homestay_contents,
									"HOMESTAY_IMAGE" => $homestay_image,
									"HOMESTAY_PRICE" => $homestay_price,
									"HOMESTAY_CUR_TYPE" => $homestay_cur_type,
									"HOMESTAY_PER_PRICE" => $homestay_per_price,
									"HOMESTAY_MAX_CNT" => $homestay_max_cnt,
									"HOMESTAY_TIME" => $homestay_time,
									"HOMESTAY_REG_DATE" => date("Y-m-d H:i:s")
					);
					$this->GuideModel->insertGuideHomestay($homestay_arr);
				endif;
			}
		}

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => $result));
		}
	}

	public function user_delete_proc(){
		$seq = isset($_POST["seq"]) ? $_POST["seq"] : "";

		$result = $this->UserModel->deleteUser($seq);

		if ($result == true){
			echo json_encode(array("code" => "200"));
		}else{
			echo json_encode(array("code" => "202", "msg" => $result));
		}
	}
}
