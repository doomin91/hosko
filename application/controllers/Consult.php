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

		$this->load->model('ConsultModel');
		$this->load->model('UserModel');

    }

    function onlineConsultList(){
		$limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$searchField = $this->input->get("searchField");
		$searchString = $this->input->get("searchString");

		$wheresql = array(
						"start" => $start,
						"limit" => $limit,
						"user_seq" => $this->session->userdata("USER_SEQ"),
						"searchField" => $searchField,
						"searchString" => $searchString
						);
		$lists = $this->ConsultModel->getOnlineConsultLists($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->ConsultModel->getOnlineConsultListCount($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/consult/onlineConsult/", $listCount, 10, 5, $nowpage);

		$data = array(
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit
					);
        $this->load->view("/consult/online-consult-list", $data);
    }

	function onlineConsultWrite(){
		$userInfo = $this->UserModel->getUserInfo($this->session->userdata("USER_SEQ"));
		print_r($userInfo);
		$data = array(
					"userInfo" => $userInfo
					);
        $this->load->view("/consult/online-consult-write", $data);
    }

	public function onlineConsultWriteProc(){
		$oc_subject = $this->input->post("oc_subject");
		$oc_user_name = $this->input->post("oc_user_name");
		$oc_user_tel = $this->input->post("oc_user_tel");
		$oc_user_hp = $this->input->post("oc_user_hp");
		$oc_user_email = $this->input->post("oc_user_email");
		$oc_contents = $this->input->post("oc_contents");

		$insertArr = array(
						"OC_SUBJECT" => $oc_subject,
						"OC_USER_SEQ" => $this->session->userdata("USER_SEQ"),
						"OC_USER_NAME" => $oc_user_name,
						"OC_USER_TEL" => $oc_user_tel,
						"OC_USER_HP" => $oc_user_hp,
						"OC_USER_EMAIL" => $oc_user_email,
						"OC_CONTENTS" => $oc_contents,
						"OC_ANSWER_FLAG" => "W",
						"OC_REG_DATE" => date("Y-m-d H:i:s"),
						"OC_DEL_YN" => "N"
 		);
		$result = $this->ConsultModel->insertOnlineConsult($insertArr);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "문의 신청 되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "문의 신청중 문제가 생겼습니다."));
		}
	}

	function onlineConsultView($oc_seq){
		$ocInfo = $this->ConsultModel->getOnlineConsult($oc_seq);

		$data = array(
					"ocInfo" => $ocInfo
		);
        $this->load->view("/consult/online-consult-view", $data);
    }

}
