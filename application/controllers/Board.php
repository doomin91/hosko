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

            $BOARD_INFO = $this->BoardModel->getBoard($board_seq);
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
    
            $queryString = "?searchField=". $searchField. "&searchString=".$searchString;
            $pagination = $this->customclass->pagenavi("/Board/q/$seq?seq=$board_seq" . $queryString, $listCount, $limit, 3, $nowpage);
    
            $DATA["BOARD_INFO"] = $BOARD_INFO;
            $DATA["lists"] = $lists;
            $DATA["listCount"] = $listCount;
            $DATA["searchField"] = $searchField;
            $DATA["searchString"] = $searchString;
            $DATA["pagination"] = $pagination;
            $DATA["pagenum"] = $pagenum;
            $DATA["start"] = $start;
            $DATA["limit"] = $limit;

        } else {
            $post_info = "";
        }

        $DATA["GROUP_INFO"] = $group_info;
        $DATA["BOARDS_INFO"] = $boards_info;
        $this->load->view("board_list", $DATA);
    }

    function board_view(){
        $this->load->view("board_view");
    }

    function board_write(){
        $this->load->view("board_write");
    }

}
