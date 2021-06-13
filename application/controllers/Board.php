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
        $board_info = $this->BoardModel->getBoardInGroup($seq);
        
        if($board_info){
            
        }

        $DATA["GROUP_INFO"] = $group_info;
        $DATA["BOARD_INFO"] = $board_info;
        $this->load->view("board_list", $DATA);
    }

    function board_view(){
        $this->load->view("board_view");
    }

    function board_write(){
        $this->load->view("board_write");
    }

}
