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
        //$this->load->library('encrypt');
        $this->load->helper('download');

        $this->load->model("UserModel");
		$this->load->model("ConsultModel");
        $this->load->model("RecruitModel");

    }

    public function index(){
        $CATEGORY = isset($_GET["ctg"]) ? $_GET["ctg"] : 1;

        if($CATEGORY == 1){
            $REC_LIST = $this->RecruitModel->getRecruitInternShipList();
            $REC_LIST_COUNT = $this->RecruitModel->getRecruitInternShipListCount();
        }else if( $CATEGORY == 2){
            $REC_LIST = $this->RecruitModel->getRecruitJobList();
            $REC_LIST_COUNT = $this->RecruitModel->getRecruitJobListCount();
        }

        $DATA["CATEGORY"] = $CATEGORY;
        $DATA["REC_LIST"] = $REC_LIST;
        $DATA["REC_LIST_COUNT"] = $REC_LIST_COUNT;

        $this->load->view("recruit/recruit_list", $DATA);
    }

    public function recruit_view($category, $rec_seq){
        $CATEGORY = $category;
        $RECRUIT = $this->RecruitModel->getRecruitAbroad($rec_seq);

        $DATA["CATEGORY"] = $CATEGORY;
        $DATA["RECRUIT"] = $RECRUIT;

        $this->customclass->addRecruitVisitCount($rec_seq);

        $this->load->view("recruit/recruit_view", $DATA);
    }

}
