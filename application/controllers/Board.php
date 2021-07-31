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
        $this->load->helper('download');

        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->library('CustomClass');
        $this->load->model("BoardModel");
        $this->load->model("GroupModel");
        //$this->load->library('encrypt');

    }

    function q($seq){
        $group_info = $this->GroupModel->getGroup($seq);
        $boards_info = $this->BoardModel->getBoardInGroup($seq);
            
        if(count($boards_info) > 0){
            if(isset($_GET["seq"])){
                $board_seq = $this->input->get("seq");
            } else {
                $board_seq = $boards_info[0]->BOARD_SEQ;
            }

            $board_info = $this->BoardModel->getBoard($board_seq);
            $searchField = $this->input->get("search_field");
            $searchString = $this->input->get("search_string");
            $limit = $board_info->BOARD_LIST_COUNT;
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

            $lists = $this->BoardModel->getPosts($board_seq, $wheresql);
            $listCount = $this->BoardModel->getPostsCnt($board_seq, $wheresql);
    
            if ($nowpage != ""){
                $pagenum = $listCount-(($nowpage-1)*$limit);
            }else{
                $pagenum = $listCount;
            }
    
            $queryString = "search_field=". $searchField. "&search_string=".$searchString;
            $pagination = $this->customclass->front_pagenavi("/Board/q/$seq?seq=$board_seq&" . $queryString, $listCount, $limit, 3, $nowpage);
    
            $DATA["BOARD_SEQ"] = $board_seq;
            $DATA["BOARD_INFO"] = $board_info;
            $DATA["lists"] = $lists;
            $DATA["listCount"] = $listCount;
            $DATA["searchField"] = $searchField;
            $DATA["searchString"] = $searchString;
            $DATA["pagination"] = $pagination;
            $DATA["pagenum"] = $pagenum;
            $DATA["start"] = $start;
            $DATA["limit"] = $limit;

        } else {
            $searchField = $this->input->get("search_field");
            $searchString = $this->input->get("search_string");
        }

        $DATA["searchField"] = $searchField;
        $DATA["searchString"] = $searchString;
        $DATA["GROUP_INFO"] = $group_info;
        $DATA["BOARDS_INFO"] = $boards_info;
        $this->load->view("board_list", $DATA);
    }

    function g($seq){
        $group_info = $this->GroupModel->getGroup($seq);
        $boards_info = $this->BoardModel->getBoardInGroup($seq);
            
        if(count($boards_info) > 0){
            if(isset($_GET["seq"])){
                $board_seq = $this->input->get("seq");
            } else {
                $board_seq = $boards_info[0]->BOARD_SEQ;
            }

            $board_info = $this->BoardModel->getBoard($board_seq);
            $searchField = $this->input->get("search_field");
            $searchString = $this->input->get("search_string");
            $limit = $board_info->BOARD_LIST_COUNT;
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

            $lists = $this->BoardModel->getPosts($board_seq, $wheresql);
            $listCount = $this->BoardModel->getPostsCnt($board_seq, $wheresql);
    
            if ($nowpage != ""){
                $pagenum = $listCount-(($nowpage-1)*$limit);
            }else{
                $pagenum = $listCount;
            }
    
            $queryString = "search_field=". $searchField. "&search_string=".$searchString;
            $pagination = $this->customclass->front_pagenavi("/Board/g/$seq?seq=$board_seq&" . $queryString, $listCount, $limit, 3, $nowpage);
    
            $DATA["BOARD_INFO"] = $board_info;
            $DATA["lists"] = $lists;
            $DATA["listCount"] = $listCount;
            $DATA["searchField"] = $searchField;
            $DATA["searchString"] = $searchString;
            $DATA["pagination"] = $pagination;
            $DATA["pagenum"] = $pagenum;
            $DATA["start"] = $start;
            $DATA["limit"] = $limit;

        } else {
            $searchField = $this->input->get("search_field");
            $searchString = $this->input->get("search_string");
        }

        $DATA["searchField"] = $searchField;
        $DATA["searchString"] = $searchString;
        $DATA["GROUP_INFO"] = $group_info;
        $DATA["BOARDS_INFO"] = $boards_info;
        $this->load->view("board_gallery_list", $DATA);
    }

    function v($seq){
        $group_info = $this->GroupModel->getGroup($seq);
        $boards_info = $this->BoardModel->getBoardInGroup($seq);
            
        if(count($boards_info) > 0){
            if(isset($_GET["seq"])){
                $board_seq = $this->input->get("seq");
            }else {
                $board_seq = $boards_info[0]->BOARD_SEQ;
            }

            $board_info = $this->BoardModel->getBoard($board_seq);
            $searchField = $this->input->get("search_field");
            $searchString = $this->input->get("search_string");
            $limit = $board_info->BOARD_LIST_COUNT;
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

            $lists = $this->BoardModel->getPosts($board_seq, $wheresql);
            $listCount = $this->BoardModel->getPostsCnt($board_seq, $wheresql);
    
            if ($nowpage != ""){
                $pagenum = $listCount-(($nowpage-1)*$limit);
            }else{
                $pagenum = $listCount;
            }
    
            $queryString = "search_field=". $searchField. "&search_string=".$searchString;
            $pagination = $this->customclass->front_pagenavi("/Board/v/$seq?seq=$board_seq&" . $queryString, $listCount, $limit, 3, $nowpage);
    
            $DATA["BOARD_INFO"] = $board_info;
            $DATA["lists"] = $lists;
            $DATA["listCount"] = $listCount;
            $DATA["searchField"] = $searchField;
            $DATA["searchString"] = $searchString;
            $DATA["pagination"] = $pagination;
            $DATA["pagenum"] = $pagenum;
            $DATA["start"] = $start;
            $DATA["limit"] = $limit;

        } else {
            $searchField = $this->input->get("search_field");
            $searchString = $this->input->get("search_string");
        }

        $DATA["searchField"] = $searchField;
        $DATA["searchString"] = $searchString;
        $DATA["GROUP_INFO"] = $group_info;
        $DATA["BOARDS_INFO"] = $boards_info;
        $this->load->view("board_movie_list", $DATA);
    }

    function board_view($post_seq){
        $post_info = $this->BoardModel->getPost($post_seq);
        if($post_info->POST_DEL_YN == "Y"){
            echo "<script>
            alert('삭제된 게시글입니다.');
            history.back();
            </script>";
            exit;
        }
        $board_seq = $post_info->POST_BOARD_SEQ;
        $board_info = $this->BoardModel->getBoard($board_seq);
        if($board_info->BOARD_SECRET_FLAG == "Y" && $post_info->POST_SECRET_YN == "Y"){
            if($this->session->userdata("admin_id") || ($this->session->userdata("USER_SEQ") == $post_info->POST_USER_SEQ)){
            } else {
                echo "<script>
                alert('권한이 없습니다');
                history.back();
                </script>";
                exit;
            }
        }; 
        // 조회수
		$DATA = array(
			"POST_VIEW_CNT"	=> $post_info->POST_VIEW_CNT + 1
		);

		$this->BoardModel->addPostViewCnt($post_seq, $DATA);
        $group_seq = $board_info->BOARD_GROUP;
        $group_info = $this->GroupModel->getGroup($group_seq);
        $boards_info = $this->BoardModel->getBoardInGroup($group_seq);

        $bottom_list = $this->BoardModel->getFrontBoardBottom($post_seq, $board_seq);
        $comments = $this->BoardModel->getComments($post_seq);
        $recommand = $this->BoardModel->getRecommand($post_seq);
        $attach = $this->BoardModel->getPostAttach($post_seq);

        switch($board_info->BOARD_TYPE){
            case 0:
                $DATA["BOARD_TYPE"] = "q";
                break;
            case 1:
                $DATA["BOARD_TYPE"] = "g";
                break;
            case 2:
                $DATA["BOARD_TYPE"] = "v";
                break;
        }
        $DATA["GROUP_INFO"] = $group_info;
        $DATA["POST_INFO"] = $post_info;
        $DATA["BOARD_INFO"] = $board_info;
        $DATA["BOARDS_INFO"] = $boards_info;
        $DATA["BOTTOM_LIST"] = $bottom_list;
        $DATA["ATTACH"] = $attach;
        $DATA["COMMENTS"] = $comments;
        $this->load->view("board_view", $DATA);
    }

    function board_write($group_seq){
        $board_seq = $this->input->get("seq");
        $group_info = $this->GroupModel->getGroup($group_seq);
        $boards_info = $this->BoardModel->getBoardInGroup($group_seq);
        $board_info = $this->BoardModel->getBoard($board_seq);
        switch($board_info->BOARD_TYPE){
            case 0:
                $DATA["BOARD_TYPE"] = "q";
                break;
            case 1:
                $DATA["BOARD_TYPE"] = "g";
                break;
            case 2:
                $DATA["BOARD_TYPE"] = "v";
                break;
        }
        $DATA["BOARD_INFO"] = $board_info;
        $DATA["GROUP_INFO"] = $group_info;
        $DATA["BOARDS_INFO"] = $boards_info;
        $this->load->view("board_write", $DATA);
    }

    function board_reply($post_seq){
        $post_info = $this->BoardModel->getPostInfo($post_seq);
        $board_seq = $post_info->BOARD_SEQ;
        $group_seq =  $post_info->GP_SEQ;

        $group_info = $this->GroupModel->getGroup($group_seq);
        $boards_info = $this->BoardModel->getBoardInGroup($group_seq);
        $board_info = $this->BoardModel->getBoard($board_seq);
        switch($board_info->BOARD_TYPE){
            case 0:
                $DATA["BOARD_TYPE"] = "q";
                break;
            case 1:
                $DATA["BOARD_TYPE"] = "g";
                break;
            case 2:
                $DATA["BOARD_TYPE"] = "v";
                break;
        }
        $DATA["BOARD_INFO"] = $board_info;
        $DATA["GROUP_INFO"] = $group_info;
        $DATA["BOARDS_INFO"] = $boards_info;
        $DATA["POST_INFO"] = $post_info;
        $this->load->view("board_reply", $DATA);
    }

    function board_modify($post_seq){
        $post_info = $this->BoardModel->getPostInfo($post_seq);
        // 링크 직접 호출 시 차단
        if($post_info->POST_USER_SEQ != $this->session->userdata("USER_SEQ")){
            echo "<script>alert('잘못된 접근입니다.');history.back();</script>";
        }
        $board_seq = $post_info->BOARD_SEQ;
        $group_seq =  $post_info->GP_SEQ;
        $group_info = $this->GroupModel->getGroup($group_seq);
        $boards_info = $this->BoardModel->getBoardInGroup($group_seq);
        $board_info = $this->BoardModel->getBoard($board_seq);
        switch($board_info->BOARD_TYPE){
            case 0:
                $DATA["BOARD_TYPE"] = "q";
                break;
            case 1:
                $DATA["BOARD_TYPE"] = "g";
                break;
            case 2:
                $DATA["BOARD_TYPE"] = "v";
                break;
        }
        $DATA["BOARD_INFO"] = $board_info;
        $DATA["GROUP_INFO"] = $group_info;
        $DATA["BOARDS_INFO"] = $boards_info;
        $DATA["POST_INFO"] = $post_info;
        $this->load->view("board_modify", $DATA);
    }

    function post_delete(){
        $POST_SEQ = $this->input->post("post_seq");

        $result = $this->BoardModel->delPost($POST_SEQ);
        
        if($result){
            $resultMsg = array(
                "code" => 200,
                "msg" => "삭제 완료"
            );
        } else {
            $resultMsg = array(
                "code" => 201,
                "msg" => "삭제 실패"
            );
        }

        echo json_encode($resultMsg);
    }

    function comment_del(){
        $com_seq = $this->input->post("com_seq"); 
        $result = $this->BoardModel->delComment($com_seq);
        return $result;
    }


	public function CheckUrl(){
		$yurl = $this->input->post("youtube_url");
		$url_parameter = $this->getUrlParameter($yurl, 'v');

		$content = file_get_contents("http://youtube.com/get_video_info?video_id=".$url_parameter);
        // $content = http_get("http://youtube.com/get_video_info?video_id=".$url_parameter, array("timeout"=>1));   
		parse_str($content, $data);
		if(isset($data["player_response"])) {
			$pData = json_decode($data["player_response"]);
			$videoDetails = $pData->videoDetails;
			$microformat = $pData->microformat;
			$return_arr = array(
			"title" => $videoDetails->title,
			"author" => $videoDetails->author,
			"upload" => $microformat->playerMicroformatRenderer->publishDate,
			"viewcount" => $videoDetails->viewCount,
			);
			echo json_encode($return_arr);
		} else {
			$return_arr = array(
				"title" => '',
				"author" => '',
				"upload" => '',
				"viewcount" => '',
				);
			echo json_encode($return_arr);
		}
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

	public function get_boards(){
		$board_info = $this->BoardModel->getBoards();
		$group_info = $this->GroupModel->getGroupList();

		$returnMsg = array(
			"group" => $group_info,
			"board" => $board_info
		);
		echo json_encode($returnMsg);
	}

    public function set_post_info(){
		$FILE_SEQ = explode(",", $this->input->post("file_seq"));
		$BOARD_SEQ = $this->input->get("board_seq");
		$POST_SUBJECT = $this->input->post("post_title");
		$POST_CONTENTS = $this->input->post("post_contents");
		$POST_NOTICE_CHK = $this->input->post("post_notice_chk");
		$POST_SECRET_CHK = $this->input->post("post_secret_chk");
		
		$POST_SEQ = $this->input->post("post_seq");
		$POST_INFO = $this->BoardModel->getPostInfo($POST_SEQ);
		if($POST_INFO){
			$POST_PARENT_SEQ = $POST_INFO->POST_PARENT_SEQ;
			$POST_DEPTH = $POST_INFO->POST_DEPTH;
		} else {
			$POST_PARENT_SEQ = NULL;
			$POST_DEPTH = 0;
		}
		
		$SPAM_CHECK = $this->customclass->rpHash($this->input->post("defaultReal"));
		$SPAM_CHECK_HASH = $this->input->post("defaultRealHash");
		$BOARD_INFO = $this->BoardModel->getBoard($BOARD_SEQ);
		
		$filepath = $_SERVER['DOCUMENT_ROOT'] . "/upload/attach/";
		
		if(empty($POST_SUBJECT)){
			$returnMsg = array(
				"code" => 202,
				"msg" => "제목을 입력해주세요."
			);
			echo json_encode($returnMsg);
			exit;
		}

		if(empty($POST_CONTENTS)){
			$returnMsg = array(
				"code" => 202,
				"msg" => "내용을 입력해주세요."
			);
			echo json_encode($returnMsg);
			exit;
		}

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

		$DATA = array(
			"POST_PARENT_SEQ" => $POST_PARENT_SEQ,
			"POST_GROUP_SEQ" => $POST_SEQ,
			"POST_DEPTH" => $POST_DEPTH + 1,
			"POST_BOARD_SEQ" => $BOARD_SEQ,
			"POST_ADMIN_SEQ" => $this->session->userdata("admin_seq"),
			"POST_USER_SEQ" => $this->session->userdata("USER_SEQ"),
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
			$YOUTUBE_URL = $this->input->post("video_id");
			$DATA["POST_YOUTUBE_URL"] = $YOUTUBE_URL;
		endif;

		$POST_SEQ = $this->BoardModel->setPost($DATA);
		if($POST_DEPTH == 0){ $this->BoardModel->initPostParentSeq($POST_SEQ); }

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


    public function upt_post_info(){
		$FILE_SEQ = explode(",", $this->input->post("file_seq"));
		$POST_SEQ = $this->input->get("post_seq");
		$POST_SUBJECT = $this->input->post("post_title");
		$POST_CONTENTS = $this->input->post("post_contents");
		$POST_NOTICE_CHK = $this->input->post("post_notice_chk");
		$POST_SECRET_CHK = $this->input->post("post_secret_chk");
		// $SPAM_CHECK = $this->rpHash($this->input->post("defaultReal"));
		// $SPAM_CHECK_HASH = $this->input->post("defaultRealHash");
		$POST_INFO = $this->BoardModel->getBoardSeqByPost($POST_SEQ);
		$BOARD_INFO = $this->BoardModel->getBoard($POST_INFO->POST_BOARD_SEQ);

		if(empty($POST_SUBJECT)){
			$returnMsg = array(
				"code" => 202,
				"msg" => "제목을 입력해주세요."
			);
			echo json_encode($returnMsg);
			exit;
		}

		if(empty($POST_CONTENTS)){
			$returnMsg = array(
				"code" => 202,
				"msg" => "내용을 입력해주세요."
			);
			echo json_encode($returnMsg);
			exit;
		}

		// if($BOARD_INFO->BOARD_SPAM_CHECK_FLAG == 'Y'){
		// 	if($SPAM_CHECK != $SPAM_CHECK_HASH){
		// 		$returnMsg = array(
		// 			"code" => 202,
		// 			"msg" => "자동입력방지 값이 다릅니다."
		// 		);
		// 		echo json_encode($returnMsg);
		// 		exit;
		// 	}
		// }

		$DATA = array(
			"POST_USER_SEQ" => $this->session->userdata("USER_SEQ"),
			"POST_SUBJECT" => $POST_SUBJECT,
			"POST_CONTENTS" => $POST_CONTENTS,
			"POST_REG_IP" => $this->customclass->get_client_ip(),
			"POST_NOTICE_YN" => isset($POST_NOTICE_CHK) ? "Y" : "N",
			"POST_SECRET_YN" => isset($POST_SECRET_CHK) ? "Y" : "N");
			
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
			$YOUTUBE_URL = $this->input->post("video_id");
			if(!empty($YOUTUBE_URL)){
				$DATA["POST_YOUTUBE_URL"] = $YOUTUBE_URL;
			}
		endif;
		
		$result = $this->BoardModel->uptPost($POST_SEQ, $DATA);
		foreach($FILE_SEQ as $seq){
			$DATA = array(
				"ATTACH_POST_SEQ" => $POST_SEQ
			);
			$this->BoardModel->updatePostAttach($seq, $DATA);
		}

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
			$USER_SEQ = $this->session->userdata("USER_SEQ");
		}

		$USER_SEQ = $this->session->userdata("USER_SEQ");
		$DATA = array(
			"COM_POST_SEQ" => $POST_SEQ,
			"COM_USER_SEQ" => $USER_SEQ,
			"COM_CONTENTS" => $COMMENT,
            "COM_IP" => $this->customclass->get_client_ip()
		);

		$result = $this->BoardModel->setComment($DATA);

		echo json_encode($result);
	}

    public function CheckUrlAndSave(){
		$yurl = $this->input->post("youtube_url");
		$video_id = $this->getUrlParameter($yurl, 'v');
		// $content = file_get_contents("https://www.youtube.com/get_video_info?video_id={$video_id}&eurl=https://youtube.googleapis.com/v/onz2k4zoLjQ&html5=1&c=TVHTML5&cver=6.20180913");

		// $content = file_get_contents('http://youtube.com/get_video_info?video_id=dRNsJhEmyBs');
		// parse_str($content, $data);

		// if(isset($data["player_response"])) {
			$resultMsg = array(
				"code" => 200,
				"msg" => "동영상 불러오기 성공",
				"video_id" => $video_id
			);
		// } else {
			// $resultMsg = array(
			// 	"code" => 201,
			// 	"msg" => "해당 링크의 동영상을 찾을 수 없습니다."
			// );
		// }

		echo json_encode($resultMsg);
	}

	public function FileLoad($POST_SEQ){
		$result = $this->BoardModel->getPostAttach($POST_SEQ);
		$file_data = array();
		foreach($result as $val){
			array_push($file_data, array("file_seq"=>$val->ATTACH_SEQ, "file_name" => $val->ATTACH_FILE_NAME));
		}
	
		echo json_encode(array("code" => "200", "file_list" => $file_data));
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
