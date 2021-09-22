<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {

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

    }

    public function cooperation(){
        $this->load->view("company/company_cooperation");
    }

    public function ethics(){
        $this->load->view("company/company_ethics");
    }

    public function introduce(){
        $this->load->view("company/company_introduce");
    }

    public function location(){
        $this->load->view("company/company_location");
    }

    public function organization(){
        $this->load->view("company/company_organization");
    }

    public function vision(){
        $this->load->view("company/company_vision");
    }

    public function agreement(){
        $this->load->view("company/agreement");
    }

    public function privacy(){
        $this->load->view("company/privacy");
    }
}
