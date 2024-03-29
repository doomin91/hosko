<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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
		$this->load->model("BasicModel");
		$this->load->model("ConsultModel");

    }

    function index(){
		$DATA["NEWS"] = $this->BoardModel->getNews();
		$DATA["NOTICES"] = $this->BoardModel->getNotice();
		$DATA["QNALIST"] = $this->ConsultModel->getQnaTop5();

		$popups = $this->BasicModel->getPopupToday();
		//print_r($popups);

		//print_r($DATA["QNALIST"]);

		$DATA["POPUPS"] = $popups;
        $this->load->view("index", $DATA);
    }
}
