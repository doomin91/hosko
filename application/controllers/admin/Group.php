<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Group extends CI_Controller {

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
		$this->load->model("GroupModel");
	}

	/////////////////////
	// 게시판 생성 관리 //
	/////////////////////

	public function group_list(){
		$data["group"] = $this->GroupModel->getGroupList();
		$this->load->view("./admin/board/group-list", $data);
	}

	public function group_write(){
		$this->load->view("./admin/board/group-write");
	}

	public function group_modify($SEQ){
		$data["group"] = $this->GroupModel->getGroup($SEQ);
		$this->load->view("./admin/board/group-modify", $data);
	}
	
	public function group_write_proc(){
		 $GROUP_NAME = $this->input->post("group_name");
		 $chk = $this->GroupModel->checkGroupName($GROUP_NAME);
		 if(!$chk){
			 $DATA = array(
				 "GP_NAME" => $GROUP_NAME
			 );
			 
			 $result = $this->GroupModel->setGroup($DATA);
		 } else {
			 $returnMsg = array(
				 "code" => "201",
				 "msg" => "중복된 그룹명이 존재합니다."
			 );
			 echo json_encode($returnMsg);
			 exit;
		 }

		 if($result){
			 $returnMsg = array(
				 "code" => "200",
				 "msg" => "등록 성공"
			 );
		 } else {
			$returnMsg = array(
				"code" => "201",
				"msg" => "등록 실패"
			);
		 }

		 echo json_encode($returnMsg);
	}

	public function group_modify_proc(){
		$GROUP_SEQ = $this->input->post("group_seq");
		$GROUP_NAME = $this->input->post("group_name");

		$chk = $this->GroupModel->checkGroupName($GROUP_NAME);
		if(!$chk){
			$DATA = array(
				"GP_NAME" => $GROUP_NAME
			);

			$result = $this->GroupModel->uptGroup($GROUP_SEQ, $DATA);
		} else {
			$returnMsg = array(
				"code" => "201",
				"msg" => "중복된 그룹명이 존재합니다."
			);
			echo json_encode($returnMsg);
			exit;
		}

		
		if($result){
			$returnMsg = array(
				"code" => "200",
				"msg" => "등록 성공"
			);
		} else {
		   $returnMsg = array(
			   "code" => "201",
			   "msg" => "등록 실패"
		   );
		}

		echo json_encode($returnMsg);
	}

	public function group_delete_proc($SEQ){
		$result = $this->GroupModel->delGroup($SEQ);
		if($result){
			$returnMsg = array(
				"code" => "200",
				"msg" => "삭제 성공"
			);
		} else {
		   $returnMsg = array(
			   "code" => "201",
			   "msg" => "삭제 실패"
		   );
		}
		echo json_encode($returnMsg);
	}

}
