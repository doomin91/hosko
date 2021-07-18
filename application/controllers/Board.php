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


}
