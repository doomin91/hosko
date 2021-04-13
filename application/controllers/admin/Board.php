<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Board extends CI_Controller {

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
		$this->load->model("BoardModel");
	}

	/////////////////////
	// 게시판 생성 관리 //
	/////////////////////

	public function board_list(){
		$this->load->view("./admin/board/board-list");
	}

	public function board_write(){
		$this->load->view("./admin/board/board-write");
	}

	public function board_view($BOARD_SEQ){
		$DATA["BOARD"] = $this->BoardModel->getBoard($BOARD_SEQ);
		$this->load->view("./admin/board/board-modify", $DATA);
	}


	public function get_boards(){
		$result = $this->BoardModel->getBoards();
		echo json_encode($result);
	}

	public function del_board(){
		$board_seq = $this->input->post("BOARD_SEQ");

		$result = $this->BoardModel->delBoard($board_seq);

		echo json_encode($result);
	}

	public function regist_board(){
		$board_cate = $this->input->post("board_cate");
		$board_memo = $this->input->post("board_memo");
		$board_name = $this->input->post("board_name");
		$board_name_kor = $this->input->post("board_name_kor");
		$board_group = $this->input->post("board_group");
		$board_admin = $this->input->post("board_admin");
		$auth = $this->input->post("auth_list") . "," . $this->input->post("auth_content") . "," . 
			$this->input->post("auth_write") . "," . 
			$this->input->post("auth_repost") . "," . 
			$this->input->post("auth_reply");
		$warn_message = $this->input->post("warn_message");
		$redirect_url = $this->input->post("redirect_url");
		$write_btn = $this->input->post("show_write_btn");
		$align_img = $this->input->post("align_img");
		$fn_secret = $this->input->post("fn_secret");
		$fn_recommand = $this->input->post("fn_recommand");
		$fn_viewpage = $this->input->post("fn_viewpage");
		$fn_spamcheck = $this->input->post("fn_spamcheck");
		$fn_reply = $this->input->post("fn_reply");
		$file_upload = $this->input->post("file_upload");
		$list_view = $this->input->post("list_view");
		$new_period = $this->input->post("new_period");
		$hot_period = $this->input->post("hot_period");
		$ip_address = $this->customclass->get_client_ip();

		$chk = $this->BoardModel->checkBoardName($board_name);

		if(empty($board_name) || empty($board_name_kor)){
			$resultMsg = array(
				"code" => 202,
				"msg" => "게시판명을 입력해주세요."
			);
			echo json_encode($resultMsg);
			exit;		
		}

		if($chk) {
			$resultMsg = array(
				"code" => 202,
				"msg" => "중복된 게시판명이 존재합니다."
			);
			echo json_encode($resultMsg);
			exit;
		}
		$chk = $this->BoardModel->checkBoardKorName($board_name_kor);
		if($chk) {
			$resultMsg = array(
				"code" => 202,
				"msg" => "중복된 한글 게시판명이 존재합니다."
			);
			echo json_encode($resultMsg);
			exit;
		}

		$DATA = array(
			"BOARD_CATEGORY" => $board_cate,
			"BOARD_MEMO" => $board_memo,
			"BOARD_NAME" => $board_name,
			"BOARD_KOR_NAME" => $board_name_kor,
			"BOARD_GROUP" => $board_group,
			"BOARD_AUTH" => $auth,
			"BOARD_AUTH_REDIRECT" => $warn_message, 
			"BOARD_PERIOD_NEW" => $new_period,
			"BOARD_PERIOD_HOT" => $hot_period,
			"BOARD_AUTH_MSG" => $redirect_url,
			"BOARD_ADMIN_ID" => $board_admin,
			"BOARD_ALIGN_IMG" => $align_img,
			"BOARD_FILEUPLOAD_COUNT" => $file_upload,
			"BOARD_LIST_COUNT" => $list_view,
			"BOARD_REG_IP" => $ip_address
		);
<<<<<<< HEAD
		
		$DATA["BOARD_WRITE"] = $write_btn == 'Y' ? $write_btn : 'N';
=======

>>>>>>> origin/develop
		$DATA["BOARD_SECRET_FLAG"] = $fn_secret == 'Y' ? $fn_secret : 'N';
		$DATA["BOARD_RECOMMAND_FLAG"] =  $fn_recommand == 'Y' ? $fn_recommand : 'N';
		$DATA["BOARD_BOTTOM_LIST_FLAG"] =  $fn_viewpage == 'Y' ? $fn_viewpage : 'N';
		$DATA["BOARD_SPAM_CHECK_FLAG"] =  $fn_spamcheck == 'Y' ? $fn_spamcheck : 'N';
		$DATA["BOARD_COMMENT_FLAG"] =  $fn_reply == 'Y' ? $fn_reply : 'N';

		$return = $this->BoardModel->writeBoard($DATA);

		if($return){
			$resultMsg = array(
				"code" => 200,
				"msg" => "\"" . $board_name . "\" 게시판 등록이 완료되었습니다."
			);
		} else {
			$resultMsg = array(
				"code" => 201,
				"msg" => "등록에 실패했습니다. 관리자에게 문의해주세요."
			);
		}

		echo json_encode($resultMsg);
	}

	///////////////////////
	// 생성된 게시판 관리 //
	///////////////////////

	public function post_list($BOARD_SEQ){
		$BOARD_INFO = $this->BoardModel->getBoard($BOARD_SEQ);
		$searchField = $this->input->get("searchField");
		$searchString = $this->input->get("searchString");

		$limit = $BOARD_INFO->BOARD_LIST_COUNT;
        $nowpage = "";
        if (!isset($_GET["per_page"])){
            $start = 0;
        }else{
            $start = ($_GET["per_page"]-1)*$limit;
            $nowpage = $_GET["per_page"];
        }

        $wheresql = array(
						"searchField" => $searchField,
                        "searchString" => $searchString,
                        "start" => $start,
                        "limit" => $limit
                        );

        $lists = $this->BoardModel->getPosts($BOARD_SEQ, $wheresql);
        //echo $this->db->last_query();
        $listCount = $this->BoardModel->getPostsCnt($BOARD_SEQ, $wheresql);
        if ($nowpage != ""){
            $pagenum = $listCount-(($nowpage-1)*$limit);
        }else{
            $pagenum = $listCount;
        }

        $queryString = "?searchField=". $searchField. "&searchString=".$searchString;
        $pagination = $this->customclass->pagenavi("/admin/board/post_list/$BOARD_SEQ".$queryString, $listCount, $limit, 3, $nowpage);

		$DATA["LIST"] = $lists;
		$DATA["LIST_CNT"] = $listCount;
		$DATA["BOARD_INFO"] = $BOARD_INFO;
		$DATA["searchField"] = $searchField;
        $DATA["searchString"] = $searchString;
        $DATA["lists"] = $lists;
        $DATA["listCount"] = $listCount;
        $DATA["pagination"] = $pagination;
        $DATA["pagenum"] = $pagenum;
        $DATA["start"] = $start;
        $DATA["limit"] = $limit;

		$this->load->view("./admin/board/post-list", $DATA);
	}

	public function post_view($POST_SEQ){

		$POST_INFO = $this->BoardModel->getBoardSeqByPost($POST_SEQ);

		$DATA = array(
			"POST_VIEW_CNT"	=> $POST_INFO->POST_VIEW_CNT + 1
		);
		$this->BoardModel->addPostViewCnt($POST_SEQ, $DATA);


		$DATA["COMMENTS"] = $this->BoardModel->getComments($POST_SEQ);
		$DATA["RECOMMAND"] = $this->BoardModel->getRecommand($POST_SEQ);

		$DATA["BOARD_INFO"] = $this->BoardModel->getBoard($POST_INFO->POST_BOARD_SEQ);
		$DATA["POST_INFO"] = $POST_INFO;
		// $DATA["POST_INFO"] = $POST_INFO;
		$this->load->view("./admin/board/post-view", $DATA);
	}

	// 게시글 등록 화면
	public function post_write($BOARD_SEQ){
		$DATA["BOARD_INFO"] = $this->BoardModel->getBoard($BOARD_SEQ);

		$this->load->view("./admin/board/post-write", $DATA);
	}

	// 게시글 수정 화면
	public function post_modify($POST_SEQ){
		$POST_INFO = $this->BoardModel->getBoardSeqByPost($POST_SEQ);
		$BOARD_INFO = $this->BoardModel->getBoard($POST_INFO->POST_BOARD_SEQ);

		$DATA["POST_INFO"] = $POST_INFO;
		$DATA["BOARD_INFO"] = $BOARD_INFO;
		$this->load->view("admin/board/post-modify", $DATA);
	}

	public function upt_post_info(){
		$POST_SEQ = $this->input->get("post_seq");
		$POST_SUBJECT = $this->input->post("post_title");
		$POST_CONTENTS = $this->input->post("post_contents");
		$POST_NOTICE_CHK = $this->input->post("post_notice_chk");
		$POST_SECRET_CHK = $this->input->post("post_secret_chk");
		$SPAM_CHECK = $this->rpHash($this->input->post("defaultReal"));
		$SPAM_CHECK_HASH = $this->input->post("defaultRealHash");
<<<<<<< HEAD
=======

>>>>>>> origin/develop


		$POST_INFO = $this->BoardModel->getBoardSeqByPost($POST_SEQ);
		$BOARD_INFO = $this->BoardModel->getBoard($POST_INFO->POST_BOARD_SEQ);

		if($BOARD_INFO->BOARD_SPAM_CHECK_FLAG == 'Y'){
			if($SPAM_CHECK != $SPAM_CHECK_HASH){
				$returnMsg = array(
					"code" => 202,
					"msg" => "자동입력방지 값이 다릅니다."
				);
				echo json_encode($returnMsg);
				exit;
			}
		}

		if(empty($POST_SUBJECT) || empty($POST_CONTENTS)){
			$returnMsg = array(
				"code" => 202,
				"msg" => "값을 입력해주세요."
			);
			echo json_encode($returnMsg);
			exit;
		}

<<<<<<< HEAD
		$DATA = array(
			"POST_USER_SEQ" => $this->session->userdata("USER_SEQ"),
			"POST_SUBJECT" => $POST_SUBJECT,
			"POST_CONTENTS" => $POST_CONTENTS,
			"POST_REG_IP" => $this->customclass->get_client_ip(),
			"POST_NOTICE_YN" => isset($POST_NOTICE_CHK) ? "Y" : "N",
			"POST_SECRET_YN" => isset($POST_SECRET_CHK) ? "Y" : "N"
=======
        $config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/attach/";
        $config["allowed_types"] = "xls|xlsx|ppt|pptx|gif|jpg|png|hwp|doc|bmp|jpeg|zip|GIF|JPG|PNG|JPEG";
        $new_name = $BOARD_INFO->BOARD_NAME . "_" . date("YmdHis");
        $config["file_name"] = $new_name;
        $this->load->library("upload", $config);

        $post_file_name = "";
        $post_file_path = "";
        if (isset($_FILES['post_file_name']['name'])) {
            if (0 < $_FILES['post_file_name']['error']) {
                echo 'Error during file upload' . $_FILES['post_file_name']['error'];
            } else {
                if (file_exists('upload/attach' . $_FILES['post_file_name']['name'])) {
                    echo 'File already exists : upload/attach' . $_FILES['post_file_name']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('post_file_name')) {
                        echo $this->upload->display_errors();
                    } else {
                        //echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
                        $post_file_name = $_FILES['post_file_name']['name'];
                        $post_file_path = "/upload/attach/".$this->upload->data("file_name");
                    }
                }
            }
        } else {
            //echo 'Please choose a file';
        }

        $insert_arr = array(
			"ATTACH_POST_SEQ" => $BOARD_SEQ,
			"ATTACH_FILE_NAME" => $post_file_name,
			"ATTACH_FILE_PATH" => $post_file_path
>>>>>>> origin/develop
		);

		$result = $this->BoardModel->uptPost($POST_SEQ, $DATA);
		if($result){
			$returnMsg = array(
				"code" => 200,
				"msg" => "수정되었습니다."
			);
		} else {
			$returnMsg = array(
				"code" => 201,
				"msg" => "수정 실패하였습니다."
			);
		}

		echo json_encode($returnMsg);
	}

	// 게시글 등록 함수
	public function set_post_info(){
		$BOARD_SEQ = $this->input->get("board_seq");
		$POST_SUBJECT = $this->input->post("post_title");
		$POST_CONTENTS = $this->input->post("post_contents");
		$POST_NOTICE_CHK = $this->input->post("post_notice_chk");
		$POST_SECRET_CHK = $this->input->post("post_secret_chk");
		$SPAM_CHECK = $this->rpHash($this->input->post("defaultReal"));
		$SPAM_CHECK_HASH = $this->input->post("defaultRealHash");
		$BOARD_INFO = $this->BoardModel->getBoard($BOARD_SEQ);

		if($BOARD_INFO->BOARD_SPAM_CHECK_FLAG == 'Y'){
			if($SPAM_CHECK != $SPAM_CHECK_HASH){
				$returnMsg = array(
					"code" => 202,
					"msg" => "자동입력방지 값이 다릅니다."
				);
				echo json_encode($returnMsg);
				exit;
			}
		}

		if(empty($POST_SUBJECT) || empty($POST_CONTENTS)){
			$returnMsg = array(
				"code" => 202,
				"msg" => "값을 입력해주세요."
			);
			echo json_encode($returnMsg);
			exit;
		}

		$filepath = $_SERVER['DOCUMENT_ROOT'] . "/upload/attach/";
		
        // $new_name = $BOARD_INFO->BOARD_NAME . "_" . date("YmdHis");
        // $config["file_name"] = $new_name;
		$i = 1;
		foreach($_FILES as $key => $file){
			if(!empty($file["name"])){
				$new_name = time();
				$filetype = end(explode(".", $file["name"]));
				$filename = $filepath . $new_name . "." . $filetype;
				
				while(!file_exist($filename)){
					$num = 1;
				}
				move_uploaded_file($file["tmp_name"], $filename);

				$insert_arr = array(
					"ATTACH_POST_SEQ" => $BOARD_SEQ,
					"ATTACH_FILE_PRIORITY" => $i,
					"ATTACH_FILE_NAME" => $file["name"],
					"ATTACH_FILE_PATH" => $filename
				);
				$result = $this->BoardModel->insertPostAttach($insert_arr);
			}
			$i = $i + 1;
		}
		exit;

		$DATA = array(
			"POST_BOARD_SEQ" => $BOARD_SEQ,
			"POST_ADMIN_SEQ" => $BOARD_INFO->BOARD_ADMIN_ID,
			"POST_USER_SEQ" => $this->session->userdata("USER_SEQ"),
			"POST_SUBJECT" => $POST_SUBJECT,
			"POST_CONTENTS" => $POST_CONTENTS,
			"POST_REG_IP" => $this->customclass->get_client_ip(),
			"POST_NOTICE_YN" => isset($POST_NOTICE_CHK) ? "Y" : "N",
			"POST_SECRET_YN" => isset($POST_SECRET_CHK) ? "Y" : "N"
		);

		$result = $this->BoardModel->setPost($DATA);
		if($result){
			$returnMsg = array(
				"code" => 200,
				"msg" => "등록되었습니다."
			);
		} else {
			$returnMsg = array(
				"code" => 201,
				"msg" => "등록 실패하였습니다."
			);
		}

		echo json_encode($returnMsg);
	}

	// 글 추천 기능 함수 //
	public function post_recommand(){
		$POST_SEQ = $this->input->get("post_seq");
		$USER_SEQ = 1;
		$chk = $this->BoardModel->getPostRecommand($USER_SEQ, $POST_SEQ);

		if(!$chk){
			$DATA = array(
				"RMD_USER_SEQ" => 1,
				"RMD_POST_SEQ" => $POST_SEQ,
			);
			$this->BoardModel->setPostRecommand($DATA);
			$resultMsg = array(
				"code" => 200,
				"msg" => "추천되었습니다."
			);
		} else {
			$this->BoardModel->delPostRecommand($chk->RMD_SEQ);
			$resultMsg = array(
				"code" => 201,
				"msg" => "추천 취소되었습니다."
			);
		}

		echo json_encode($resultMsg);
	}

	// 댓글 기능 함수 //
	public function comment_regist(){
		$POST_SEQ = $this->input->post("post_seq");
		$COMMENT = $this->input->post("comment_content");

		$DATA = array(
			"COM_POST_SEQ" => $POST_SEQ,
			"COM_USER_SEQ" => 1,
			"COM_CONTENTS" => $COMMENT
		);

		$result = $this->BoardModel->setComment($DATA);

		echo json_encode($result);
	}

<<<<<<< HEAD
	// 자동 입력 방지 해쉬 함수 //
	function rpHash($value) { 
		$hash = 5381; 
		$value = strtoupper($value); 
		for($i = 0; $i < strlen($value); $i++) { 
			$hash = ($this->leftShift32($hash, 5) + $hash) + ord(substr($value, $i)); 
		} 
		return $hash; 
	} 
	 
	// Perform a 32bit left shift 
	function leftShift32($number, $steps) { 
		// convert to binary (string) 
		$binary = decbin($number); 
		// left-pad with 0's if necessary 
		$binary = str_pad($binary, 32, "0", STR_PAD_LEFT); 
		// left shift manually 
		$binary = $binary.str_repeat("0", $steps); 
		// get the last 32 bits 
		$binary = substr($binary, strlen($binary) - 32); 
		// if it's a positive number return it 
		// otherwise return the 2's complement 
		return ($binary{0} == "0" ? bindec($binary) : 
			-(pow(2, 31) - bindec(substr($binary, 1)))); 
	} 
=======
	function rpHash($value) {
		$hash = 5381;
		$value = strtoupper($value);
		for($i = 0; $i < strlen($value); $i++) {
			$hash = ($this->leftShift32($hash, 5) + $hash) + ord(substr($value, $i));
		}
		return $hash;
	}

	// Perform a 32bit left shift
	function leftShift32($number, $steps) {
		// convert to binary (string)
		$binary = decbin($number);
		// left-pad with 0's if necessary
		$binary = str_pad($binary, 32, "0", STR_PAD_LEFT);
		// left shift manually
		$binary = $binary.str_repeat("0", $steps);
		// get the last 32 bits
		$binary = substr($binary, strlen($binary) - 32);
		// if it's a positive number return it
		// otherwise return the 2's complement
		/*
		return ($binary{0} == "0" ? bindec($binary) :
			-(pow(2, 31) - bindec(substr($binary, 1))));
			*/
	}
>>>>>>> origin/develop

}
