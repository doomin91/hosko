<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consult extends CI_Controller {

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

    public function qna(){
        $this->load->view("consult/consult_qna");
    }

    public function online(){
        $this->load->view("consult/consult_online");
    }

    public function offline(){
        $this->load->view("consult/consult_offline");
    }

    public function apply(){
        // $this->session->userdata("USER_SEQ")
        $session_data = array("USER_SEQ" => 1);
		$this->session->set_userdata($session_data);
        $my_applies = $this->RecruitModel->getMyApplies($this->session->userdata("USER_SEQ"));
        $my_interest_applies = $this->RecruitModel->getMyInterestApplies($this->session->userdata("USER_SEQ"));

        $DATA["MY_APPLIES"] = $my_applies;
        $DATA["MY_INTEREST_APPLIES"] = $my_interest_applies;
        
        $this->load->view("consult/consult_apply", $DATA);
    }

    public function apply_view($app_seq){
        $my_apply = $this->RecruitModel->getRecruitApplyInfo($app_seq);

        $DATA["MY_APPLY"] = $my_apply;
        
        $this->load->view("consult/consult_apply_view", $DATA);
    }

    public function apply_edit($app_seq){
        $my_apply = $this->RecruitModel->getRecruitApplyInfo($app_seq);

        $DATA["MY_APPLY"] = $my_apply;
        
        $this->load->view("consult/consult_apply_edit", $DATA);

    }

    public function apply_edit_proc(){
        $my_apply = $this->RecruitModel->getRecruitApplyInfo($app_seq);

        $DATA["MY_APPLY"] = $my_apply;
        
        $this->load->view("consult/consult_apply_edit", $DATA);

    }

}
