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
		$this->load->model("GroupModel");
		$this->load->model("UserModel");

	}

	/////////////////////
	// 게시판 생성 관리 //
	/////////////////////

	public function board_list(){
		$this->load->view("./admin/board/board-list");
	}

	public function board_write(){
		$DATA["GROUP"] = $this->GroupModel->getGroupList();
		$DATA["USER_LEVEL"] = $this->UserModel->getUserLevelAll();
		$this->load->view("./admin/board/board-write", $DATA);
	}

	public function board_view($BOARD_SEQ){
		$DATA["GROUP"] = $this->GroupModel->getGroupList();
		$DATA["USER_LEVEL"] = $this->UserModel->getUserLevelAll();
		$DATA["BOARD"] = $this->BoardModel->getBoard($BOARD_SEQ);
		$this->load->view("./admin/board/board-modify", $DATA);
	}

	public function get_boards(){
		$board_info = $this->BoardModel->getBoards();
		$group_info = $this->GroupModel->getGroupList();

		$returnMsg = array(
			"group" => $group_info,
			"board" => $board_info
		);
		echo json_encode($returnMsg);
	}

	public function del_board(){
		$board_seq = $this->input->post("BOARD_SEQ");

		$result = $this->BoardModel->delBoard($board_seq);

		echo json_encode($result);
	}

	public function board_write_proc(){
		$board_type = $this->input->post("board_type");
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
		$thumbnail_size = $this->input->post("thumbnail_size");
		$detail_size = $this->input->post("detail_size");
		$attach_img_view = $this->input->post("attach_img_view");
		$fn_secret = $this->input->post("fn_secret");
		$fn_recommand = $this->input->post("fn_recommand");
		$fn_viewpage = $this->input->post("fn_viewpage");
		$fn_spamcheck = $this->input->post("fn_spamcheck");
		$fn_reply = $this->input->post("fn_reply");
		$file_upload = $this->input->post("file_upload");
		$list_view = $this->input->post("list_view");
		$new_period = $this->input->post("new_period");
		$hot_period = $this->input->post("hot_period");
		$fn_filter = $this->input->post("fn_filter");
		$fn_filter_words = $this->input->post("fn_filter_words");
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
			"BOARD_TYPE" => $board_type,
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
			// "BOARD_IMAGE_SIZE_LIST" => $thumbnail_size,
			// "BOARD_IMAGE_SIZE_VIEW" => $detail_size,
			"BOARD_WRITE_BTN_VIEW" => $write_btn == 'Y' ? $write_btn : 'N',
			"BOARD_ATTACH_IMG_YN" => $attach_img_view == 'Y' ? $attach_img_view : 'N',
			"BOARD_SECRET_FLAG" => $fn_secret == 'Y' ? $fn_secret : 'N',
			"BOARD_RECOMMAND_FLAG" => $fn_recommand == 'Y' ? $fn_recommand : 'N',
			"BOARD_BOTTOM_LIST_FLAG" => $fn_viewpage == 'Y' ? $fn_viewpage : 'N',
			"BOARD_SPAM_CHECK_FLAG" => $fn_spamcheck == 'Y' ? $fn_spamcheck : 'N',
			"BOARD_COMMENT_FLAG" => $fn_reply == 'Y' ? $fn_reply : 'N',
			"BOARD_FILEUPLOAD_COUNT" => $file_upload,
			"BOARD_LIST_COUNT" => $list_view,
			"BOARD_REG_IP" => $ip_address,
			"BOARD_FILTER_YN" => $fn_filter == 'Y' ? $fn_filter : 'N',
			"BOARD_FILTER_WORDS" => $fn_filter_words
		);

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


	public function board_modify_proc(){
		$board_seq = $this->input->post("board_seq");
		// $board_type = $this->input->post("board_type");
		$board_cate = $this->input->post("board_cate");
		$board_memo = $this->input->post("board_memo");
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
		$thumbnail_size = $this->input->post("thumbnail_size");
		$detail_size = $this->input->post("detail_size");
		$attach_img_view = $this->input->post("attach_img_view");
		$fn_secret = $this->input->post("fn_secret");
		$fn_recommand = $this->input->post("fn_recommand");
		$fn_viewpage = $this->input->post("fn_viewpage");
		$fn_spamcheck = $this->input->post("fn_spamcheck");
		$fn_reply = $this->input->post("fn_reply");
		$file_upload = $this->input->post("file_upload");
		$list_view = $this->input->post("list_view");
		$new_period = $this->input->post("new_period");
		$hot_period = $this->input->post("hot_period");
		$fn_filter = $this->input->post("fn_filter");
		$fn_filter_words = $this->input->post("fn_filter_words");
		$ip_address = $this->customclass->get_client_ip();

		if(empty($board_name_kor)){
			$resultMsg = array(
				"code" => 202,
				"msg" => "게시판명을 입력해주세요."
			);
			echo json_encode($resultMsg);
			exit;		
		}

		$chk = $this->BoardModel->checkBoardKorName($board_name_kor);
		if($chk && $chk->BOARD_KOR_NAME != $board_name_kor) {
			$resultMsg = array(
				"code" => 202,
				"msg" => "중복된 한글 게시판명이 존재합니다."
			);
			echo json_encode($resultMsg);
			exit;
		}

		$DATA = array(
			// "BOARD_TYPE" => $board_type,
			"BOARD_CATEGORY" => $board_cate,
			"BOARD_MEMO" => $board_memo,
			// "BOARD_NAME" => $board_name,
			"BOARD_KOR_NAME" => $board_name_kor,
			"BOARD_GROUP" => $board_group,
			"BOARD_AUTH" => $auth,
			"BOARD_AUTH_REDIRECT" => $warn_message, 
			"BOARD_PERIOD_NEW" => $new_period,
			"BOARD_PERIOD_HOT" => $hot_period,
			"BOARD_AUTH_MSG" => $redirect_url,
			"BOARD_ADMIN_ID" => $board_admin,
			"BOARD_ALIGN_IMG" => $align_img,
			// "BOARD_IMAGE_SIZE_LIST" => $thumbnail_size,
			// "BOARD_IMAGE_SIZE_VIEW" => $detail_size,
			"BOARD_WRITE_BTN_VIEW" => $write_btn == 'Y' ? $write_btn : 'N',
			"BOARD_ATTACH_IMG_YN" => $attach_img_view == 'Y' ? $attach_img_view : 'N',
			"BOARD_SECRET_FLAG" => $fn_secret == 'Y' ? $fn_secret : 'N',
			"BOARD_RECOMMAND_FLAG" => $fn_recommand == 'Y' ? $fn_recommand : 'N',
			"BOARD_BOTTOM_LIST_FLAG" => $fn_viewpage == 'Y' ? $fn_viewpage : 'N',
			"BOARD_SPAM_CHECK_FLAG" => $fn_spamcheck == 'Y' ? $fn_spamcheck : 'N',
			"BOARD_COMMENT_FLAG" => $fn_reply == 'Y' ? $fn_reply : 'N',
			"BOARD_FILEUPLOAD_COUNT" => $file_upload,
			"BOARD_LIST_COUNT" => $list_view,
			"BOARD_REG_IP" => $ip_address,
			"BOARD_FILTER_YN" => $fn_filter == 'Y' ? $fn_filter : 'N',
			"BOARD_FILTER_WORDS" => $fn_filter_words
		);

		$return = $this->BoardModel->modifyBoard($board_seq, $DATA);

		if($return){
			$resultMsg = array(
				"code" => 200,
				"msg" => "\"" . $board_name_kor . "\" 게시판이 수정되었습니다."
			);
		} else {
			$resultMsg = array(
				"code" => 201,
				"msg" => "수정에 실패했습니다. 관리자에게 문의해주세요."
			);
		}

		echo json_encode($resultMsg);
	}

	///////////////////////
	// 생성된 게시판 관리 //
	///////////////////////

	public function post_list($BOARD_SEQ){
		$BOARD_INFO = $this->BoardModel->getBoard($BOARD_SEQ);
		$regDateStart = $this->input->get("regDateStart");
		$regDateEnd = $this->input->get("regDateEnd");
		$searchField = $this->input->get("search_field");
		$searchString = $this->input->get("search_string");
		$limit = $BOARD_INFO->BOARD_LIST_COUNT;
        $nowpage = "";
        if (!isset($_GET["per_page"])){
            $start = 0;
        }else{
            $start = ($_GET["per_page"]-1)*$limit;
            $nowpage = $_GET["per_page"];
        }


        $wheresql = array(
						"reg_date_start" => $regDateStart,
						"reg_date_end" => $regDateEnd,
						"searchField" => $searchField,
                        "searchString" => $searchString,
                        "start" => $start,
                        "limit" => $limit
                        );
        $lists = $this->BoardModel->getPosts($BOARD_SEQ, $wheresql);
        $listCount = $this->BoardModel->getPostsCnt($BOARD_SEQ, $wheresql);

        if ($nowpage != ""){
            $pagenum = $listCount-(($nowpage-1)*$limit);
        }else{
            $pagenum = $listCount;
        }

        $queryString = "?regDateStart=".$regDateStart."&regDateEnd=".$regDateEnd."&searchField=". $searchField. "&searchString=".$searchString;
        $pagination = $this->customclass->pagenavi("/admin/board/post_list/$BOARD_SEQ" . $queryString, $listCount, $limit, 3, $nowpage);

		$DATA["BOARD_INFO"] = $BOARD_INFO;
		$DATA["lists"] = $lists;
        $DATA["listCount"] = $listCount;
		$DATA["startDate"] = $regDateStart;
		$DATA["endDate"] = $regDateEnd;
		$DATA["searchField"] = $searchField;
        $DATA["searchString"] = $searchString;
        $DATA["pagination"] = $pagination;
        $DATA["pagenum"] = $pagenum;
        $DATA["start"] = $start;

        $DATA["limit"] = $limit;

		$this->load->view("./admin/board/post-list", $DATA);
	}

	public function post_view($POST_SEQ){
		$POST_INFO = $this->BoardModel->getBoardSeqByPost($POST_SEQ);

		// 조회수
		$DATA = array(
			"POST_VIEW_CNT"	=> $POST_INFO->POST_VIEW_CNT + 1
		);
		$this->BoardModel->addPostViewCnt($POST_SEQ, $DATA);

		$DATA["BOTTOM_LIST"] = $this->BoardModel->getBoardBottom($POST_SEQ, $POST_INFO->POST_BOARD_SEQ);
		// $listCount = $this->BoardModel->getBoardBottomCnt($POST_SEQ, $POST_INFO->POST_BOARD_SEQ);
        // if ($nowpage != ""){
        //     $pagenum = $listCount-(($nowpage-1)*$limit);
        // }else{
        //     $pagenum = $listCount;
        // }

		$DATA["COMMENTS"] = $this->BoardModel->getComments($POST_SEQ);
		$DATA["RECOMMAND"] = $this->BoardModel->getRecommand($POST_SEQ);
		$DATA["BOARD_INFO"] = $this->BoardModel->getBoard($POST_INFO->POST_BOARD_SEQ);
		$DATA["ATTACH_FILES"] = $this->BoardModel->getPostAttach($POST_SEQ);
		$DATA["POST_INFO"] = $POST_INFO;
        // $DATA["pagenum"] = $pagenum;
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
		$DATA["ATTACH_INFO"] = $this->BoardModel->getPostAttach($POST_SEQ);
		$DATA["BOARD_INFO"] = $BOARD_INFO;
		$this->load->view("admin/board/post-modify", $DATA);
	}

	public function upt_post_info(){
		$POST_SEQ = $this->input->get("post_seq");
		$POST_SUBJECT = $this->input->post("post_title");
		$POST_CONTENTS = $this->input->post("post_contents");
		$POST_NOTICE_CHK = $this->input->post("post_notice_chk");
		$POST_SECRET_CHK = $this->input->post("post_secret_chk");
		// $SPAM_CHECK = $this->rpHash($this->input->post("defaultReal"));
		// $SPAM_CHECK_HASH = $this->input->post("defaultRealHash");

		$POST_INFO = $this->BoardModel->getBoardSeqByPost($POST_SEQ);
		$BOARD_INFO = $this->BoardModel->getBoard($POST_INFO->POST_BOARD_SEQ);
		if(empty($POST_SUBJECT) || empty($POST_CONTENTS)){
			$returnMsg = array(
				"code" => 202,
				"msg" => "값을 입력해주세요."
			);
			echo json_encode($returnMsg);
			exit;
		}

		$DATA = array(
			"POST_USER_SEQ" => $this->session->userdata("USER_SEQ"),
			"POST_SUBJECT" => $POST_SUBJECT,
			"POST_CONTENTS" => $POST_CONTENTS,
			"POST_REG_IP" => $this->customclass->get_client_ip(),
			"POST_NOTICE_YN" => isset($POST_NOTICE_CHK) ? "Y" : "N",
			"POST_SECRET_YN" => isset($POST_SECRET_CHK) ? "Y" : "N");
			
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
			"ATTACH_POST_SEQ" => $POST_SEQ,
			"ATTACH_FILE_NAME" => $post_file_name,
			"ATTACH_FILE_PATH" => $post_file_path
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
		$FILE_SEQ = explode(",", $this->input->post("file_seq"));
		$BOARD_SEQ = $this->input->get("board_seq");
		$POST_SUBJECT = $this->input->post("post_title");
		$POST_CONTENTS = $this->input->post("post_contents");
		$POST_NOTICE_CHK = $this->input->post("post_notice_chk");
		$POST_SECRET_CHK = $this->input->post("post_secret_chk");
		$SPAM_CHECK = $this->rpHash($this->input->post("defaultReal"));
		$SPAM_CHECK_HASH = $this->input->post("defaultRealHash");
		$BOARD_INFO = $this->BoardModel->getBoard($BOARD_SEQ);
		$filepath = $_SERVER['DOCUMENT_ROOT'] . "/upload/attach/";
		
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

		$DATA = array(
			"POST_BOARD_SEQ" => $BOARD_SEQ,
			"POST_ADMIN_SEQ" => $BOARD_INFO->BOARD_ADMIN_ID,
			"POST_USER_SEQ" => $this->session->userdata("admin_seq"),
			"POST_SUBJECT" => $POST_SUBJECT,
			"POST_CONTENTS" => $POST_CONTENTS,
			"POST_REG_IP" => $this->customclass->get_client_ip(),
			"POST_NOTICE_YN" => isset($POST_NOTICE_CHK) ? "Y" : "N",
			"POST_SECRET_YN" => isset($POST_SECRET_CHK) ? "Y" : "N"
		);

		if($BOARD_INFO->BOARD_TYPE == 1):
			if(!empty($_FILES["thumnail_img"]["name"])){
				$new_name = time();
				$temp = explode(".", $_FILES["thumnail_img"]["name"]);
				$filetype = end($temp);
				$filename = $filepath . $new_name . "." . $filetype;
				
				move_uploaded_file($_FILES["thumnail_img"]["tmp_name"], $filename);

				$DATA["POST_THUMB_PATH"] = "/upload/attach/" . $new_name . "." . $filetype;
				$DATA["POST_THUMB_NAME"] = $_FILES["thumnail_img"]["name"];
			}
		endif;
		
		if($BOARD_INFO->BOARD_TYPE == 2):
			$YOUTUBE_URL = $this->input->post("youtube_url");
			$DATA["POST_YOUTUBE_URL"] = $YOUTUBE_URL;
		endif;

		$POST_SEQ = $this->BoardModel->setPost($DATA);
		foreach($FILE_SEQ as $seq){
			$DATA = array(
				"ATTACH_POST_SEQ" => $POST_SEQ
			);
			$this->BoardModel->updatePostAttach($seq, $DATA);
		}

		if($POST_SEQ){
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

	public function post_check_auth(){
		$POST_SEQ = $this->input->get("post_seq");
		$chk = $this->BoardModel->getPost($POST_SEQ);
		if($chk->POST_SECRET_YN == "N" || $this->session->userdata("admin_id") || $this->session->userdata("user_id") == $chk->POST_ADMIN_SEQ){
			$returnMsg = array(
				"auth" => "Y",
				"url" => "",
				"msg" => ""
			);
			echo json_encode($returnMsg);
		} else {
			$returnMsg = array(
				"auth" => "N",
				"url" => $chk->BOARD_AUTH_REDIRECT,
				"msg" => $chk->BOARD_AUTH_MSG
			);
			echo json_encode($returnMsg);
		}
		exit;
	}

	public function downalod_attach($SEQ){
		$attach = $this->BoardModel->getPostAttachByAttachSeq($SEQ);
		$name = $attach->ATTACH_FILE_NAME;
		$data = file_get_contents($attach->ATTACH_FILE_PATH);
		force_download($name, $data);
	}

	// 댓글 기능 함수 //
	public function comment_regist(){
		$POST_SEQ = $this->input->post("post_seq");
		$COMMENT = $this->input->post("comment_content");
		if ($this->session->userdata("admin_seq")){
			$USER_SEQ = $this->session->userdata("admin_seq");
		} else {
			$USER_SEQ = $this->session->userdata("user_seq");
		}
		$DATA = array(
			"COM_POST_SEQ" => $POST_SEQ,
			"COM_USER_SEQ" => $USER_SEQ,
			"COM_CONTENTS" => $COMMENT
		);

		$result = $this->BoardModel->setComment($DATA);

		echo json_encode($result);
	}

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
		
		return ($binary[0] == "0" ? bindec($binary) :
			-(pow(2, 31) - bindec(substr($binary, 1))));
		
	}

	public function CheckUrlAndSave(){
		$yurl = $this->input->post("youtube_url");
		$video_id = $this->getUrlParameter($yurl, 'v');
		$content = file_get_contents("https://www.youtube.com/get_video_info?video_id={$video_id}&eurl=https://youtube.googleapis.com/v/onz2k4zoLjQ&html5=1&c=TVHTML5&cver=6.20180913");
		parse_str($content, $data);
		if(isset($data["player_response"])) {
			$resultMsg = array(
				"code" => 200,
				"msg" => "동영상 불러오기 성공",
				"video_id" => $video_id
			);
		} else {
			$resultMsg = array(
				"code" => 201,
				"msg" => "해당 링크의 동영상을 찾을 수 없습니다."
			);
		}

		echo json_encode($resultMsg);
	}
	
	public function getUrlParameter($url, $sch_tag) {
		$parts = parse_url($url);
		if(isset($parts['host'])){
			if($parts['host'] == "www.youtube.com"){
				if(isset($parts['query'])){
					parse_str($parts['query'], $query);
					return $query[$sch_tag];
				}
			}
		}
		return false;
	}

	public function FileUploadAjax()
	{
	    $post_attach = isset($_POST["post_attach"]) ? $_POST["post_attach"] : "";
	    $file_name = array();
	    $file_path = array();
		$new_folder = "upload/attach/" . date("Ymd", time());
		
		if(!file_exists($new_folder)){
			mkdir($new_folder, 0777, true);
		}

	    if (isset($_FILES["post_attach"]) && !empty($_FILES["post_attach"])){
	        $no_files = count($_FILES["post_attach"]["name"]);
	        for ($i=0; $i<$no_files; $i++){
	            if ($_FILES["post_attach"]["error"][$i] > 0){
	                $ErrMsg = "Error : " . $_FILES["post_attach"]["error"][$i];
	                $return  = array(
	                    "code"=>"201",
	                    "msg"=>$ErrMsg
	                );
	                echo json_encode($return);
	            }else{
	                if (file_exists("/$new_folder/".$_FILES["post_attach"]["name"][$i])){
	                    $ErrMsg = "동일한 이름의 파일이 존재합니다.";
	                    $return  = array(
	                        "code"=>"202",
	                        "msg"=>$ErrMsg
	                    ); 
	                    
	                    echo json_encode($return);
	                }else{
	                    $tmp = explode(".", $_FILES["post_attach"]["name"][$i]);
	                    $new_name = time().$i.".".end($tmp);
	                    move_uploaded_file($_FILES["post_attach"]["tmp_name"][$i], $_SERVER['DOCUMENT_ROOT']."/$new_folder/".$new_name);
	                    //array_push($file_name, preg_replace("/[ #\&\+\-%@=\/\\\:;,\.'\"\^`~\|\!\?\*$#<>()\[\]\{\}]/i", "",$tmp[0]).".".$tmp[count($tmp)-1]);
	                    array_push($file_name, $_FILES["post_attach"]["name"][$i]);
	                    array_push($file_path, "/$new_folder/".$new_name);
	                }
	            }
	        }
	        
	        $file_data = array();
	        for ($num=0; $num<count($file_name); $num++){
	            $insert_attach = array(
	                "ATTACH_SEQ" => $post_attach,
	                "ATTACH_FILE_NAME" => $file_name[$num],
	                "ATTACH_FILE_PATH" => $file_path[$num]
	            );
	            $this->BoardModel->insertPostAttach($insert_attach);
	            array_push($file_data, array("file_seq"=>$this->db->insert_id(), "file_name" => $file_name[$num]));
	        }
	        echo json_encode(array("code" => "200", "file_list" => $file_data));
	        
	    }
	}
	
	public function FileDeleteAjax(){
	    $file_seq = $this->input->post("file_seq");
	    $result = $this->BoardModel->deletePostAttach($file_seq);
	    if($result){
	        echo json_encode(array("code"=>"200"));
	    }
	}


}
