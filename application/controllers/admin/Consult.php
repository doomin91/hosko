<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Consult extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 *      http://example.com/index.php/welcome
	 *  - or -
	 *      http://example.com/index.php/welcome/index
	 *  - or -
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

		$this->customclass->adminCheck();
	}


	public function onlineConsult(){
		$limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$wheresql = array(
						"start" => $start,
						"limit" => $limit
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
		$this->load->view("/admin/consult/online-consult", $data);
	}

	public function onlineConsultView($oc_seq){
		$info = $this->ConsultModel->getOnlineConsult($oc_seq);

		$data = array(
			"info" => $info
		);

		$this->load->view("/admin/consult/online-consult-view", $data);
	}

	public function onlineConsultAnswer(){
		$oc_seq = $this->input->post("oc_seq");
		$oc_answer = $this->input->post("oc_answer");

		$updateArr = array(
						"OC_ANSWER_ADMIN" => $this->session->userdata("admin_seq"),
						"OC_ANSWER" => $oc_answer,
						"OC_ANSWER_FLAG" => "Y",
						"OC_ANSWER_DATE" => date("Y-m-d H:i:s")
						);
		$result = $this->ConsultModel->setOnlineConsultAnswer($updateArr, $oc_seq);
		//echo $this->db->last_query();
		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "온라인 상담 답변 저장 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "온라인 상담 답변 저장중 문제가 생겼습니다."));
		}
	}

	public function onlineconsultDel(){
		$oc_seq = $this->input->post("oc_seq");
	}

	public function visitConsult(){
		$limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$consult_date_start = $this->input->get("consult_date_start");
		$consult_date_end = $this->input->get("consult_date_end");
		$consult_hour = $this->input->get("consult_hour");
		$consult_minute = $this->input->get("consult_minute");
		$user_age = $this->input->get("user_age");
		$user_major  = $this->input->get("user_major");
		$search_field = $this->input->get("search_field");
		$search_string = $this->input->get("search_string");

		$consult_time = $consult_hour . ":" . $consult_minute;

		$wheresql = array(
						"consult_date_start" => $consult_date_start,
						"consult_date_end" => $consult_date_end,
						"consult_time" => $consult_time,
						"user_age" => $user_age,
						"user_major" => $user_major,
						"search_field" => $search_field,
						"search_string" => $search_string,
						"start" => $start,
						"limit" => $limit
						);
		$lists = $this->ConsultModel->getVisitConsultLists($wheresql);

		$listCount = $this->ConsultModel->getVisitConsultListCount($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/consult/visitConsult/", $listCount, 10, 5, $nowpage);

		$data = array(
					"consult_date_start" => $consult_date_start,
					"consult_date_end" => $consult_date_end,
					"consult_hour" => $consult_hour,
					"consult_minute" => $consult_minute,
					"user_age" => $user_age,
					"user_major" => $user_major,
					"search_field" => $search_field,
					"search_string" => $search_string,
					"lists" => $lists,
					"listCount" => $listCount,
					"pagination" => $pagination,
					"pagenum" => $pagenum,
					"start" => $start,
					"limit" => $limit
					);
		$this->load->view("/admin/consult/visit-consult", $data);
	}

	public function visitConsultEdit($vcon_seq){
		$info = $this->ConsultModel->getVisitConsultInfo($vcon_seq);

		$data = array(
						"info" => $info
					);

		$this->load->view("/admin/consult/visit-consult-view", $data);
	}

	public function consultEditProc(){
		$user_name = $this->input->post("user_name");
		$user_age = $this->input->post("user_age");
		$user_tel = $this->input->post("user_tel");
		$user_email = $this->input->post("user_email");
		$consult_date = $this->input->post("consult_date");
		$consult_time = $this->input->post("consult_time");
		$user_comp = $this->input->post("user_comp");
		$user_depart = $this->input->post("user_depart");
		$user_major = $this->input->post("user_major");
		$user_grades = $this->input->post("user_grades");
		$test_result = $this->input->post("test_result");
		$mail_flag = $this->input->post("mail_flag");
		$vcon_seq = $this->input->post("vcon_seq");

		$updateArr = array(
							"VCON_USER_NAME" => $user_name,
							"VCON_USER_AGE" => $user_age,
							"VCON_USER_TEL" => $user_tel,
							"VCON_USER_EMAIL" => $user_email,
							"VCON_USER_COMP" => $user_comp,
							"VCON_USER_DEPART" => $user_depart,
							"VCON_USER_MAJOR" => $user_major,
							"VCON_USER_GRADES" => $user_grades,
							"VCON_CONSULT_DATE" => $consult_date,
							"VCON_CONSULT_TIME" => $consult_time,
							"VCON_TEST_RESULT" => $test_result,
							"VCON_MAIL_FLAG" => $mail_flag,
							);

		$result = $this->ConsultModel->updateVisitConult($updateArr, $vcon_seq);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "방문상담 수정 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "방문상담 수정중 문제가 생겼습니다."));
		}
	}

	public function callConsultList(){
		$limit = 5;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$wheresql = array(
						"start" => $start,
						"limit" => $limit
						);
		$lists = $this->ConsultModel->getCallMsg($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->ConsultModel->getCallMsgCount($wheresql);

		if ($nowpage != ""){
			$pagenum = $listCount-(($nowpage-1)*10);
		}else{
			$pagenum = $listCount;
		}

		$pagination = $this->customclass->pagenavi("/admin/consult/callConsultList/", $listCount, 10, 5, $nowpage);

		$data = array(
			"lists" => $lists,
			"listCount" => $listCount,
			"pagination" => $pagination,
			"pagenum" => $pagenum,
			"start" => $start,
			"limit" => $limit
			);
		$this->load->view("/admin/consult/callConsultList", $data);
	}

	public function schedule(){
		$flag = ($this->input->get("flag")) ? $this->input->get("flag") : "hosko";
		$dateY = ($this->input->get("strYear")) ? $this->input->get("strYear") : date("Y");
        $dateM = ($this->input->get("strMon")) ? $this->input->get("strMon") : date("m");

		if ($flag == "hosko"){
			$flag_string = "HOSKO 일정";
		}else if ($flag == "presentation"){
			$flag_string = "설명회 일정";
		}

        $data["month"] = $dateM;
        $data["year"] = $dateY;
		$data = array(
					"year" => $dateY,
					"month" => $dateM,
					"flag" => $flag,
					"flag_string" => $flag_string
		);

		$this->load->view("/admin/consult/schedule", $data);
	}

	public function schedule_write($nDay){
		$flag = $this->input->get("flag");

		if ($flag == "hosko"){
			$flag_string = "HOSKO 일정";
		}else if ($flag == "presentation"){
			$flag_string = "설명회 일정";
		}

		$data = array(
					"nDay" => $nDay,
					"flag" => $flag,
					"flag_string" => $flag_string
		);

		$this->load->view("/admin/consult/schedule-write", $data);
	}

	public function scheduleWriteProc(){
		$cal_title = $this->input->post("cal_title");
		$cal_schdule = $this->input->post("cal_schedule");
		$flag = $this->input->post("flag");
		$cal_date = $this->input->post("cal_date");
		//print_r($this->input->post());

		if ($flag == "hosko"){
			$cal_flag = "1";
		}else if ($flag == "presentation"){
			$cal_flag = "2";
		}

		$insertArr = array(
						"CAL_FLAG" => $cal_flag,
						"CAL_DATE" => $cal_date,
						"CAL_TITLE" => $cal_title,
						"CAL_SCHEDULE" => $cal_schdule,
						"CAL_REG_DATE" => date("Y-m-d H:i:s"),
						"CAL_REG_USER_SEQ" => $this->session->userdata("admin_seq"),
						"CAL_DEL_YN" => "N"
		);
		$result = $this->ConsultModel->insertSchedule($insertArr);
		//echo $this->db->last_query();

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "일정 등록 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "일정 등록중 문제가 생겼습니다."));
		}
	}

	public function schedule_view($cal_seq, $flag){
		if ($flag == "hosko"){
			$flag_string = "HOSKO 일정";
		}else if ($flag == "presentation"){
			$flag_string = "설명회 일정";
		}

		$detail = $this->ConsultModel->getScheduleDetail($cal_seq);

		$data = array(
					"flag" => $flag,
					"flag_string" => $flag_string,
					"detail" => $detail
		);

		$this->load->view("/admin/consult/schedule-view", $data);
	}

	public function scheduleDelProc(){
		$cal_seq = $this->input->post("cal_seq");

		$result = $this->ConsultModel->delSchedule($cal_seq);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "일정 삭제 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "일정 삭제중 문제가 생겼습니다."));
		}
	}

	public function qnaList(){
		$limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$wheresql = array(
						"start" => $start,
						"limit" => $limit
						);
		$lists = $this->ConsultModel->getQnaLists($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->ConsultModel->getQnaListCount($wheresql);

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
		$this->load->view("/admin/consult/qna-list", $data);
	}

	public function qnaView($qna_seq){
		$info = $this->ConsultModel->getQna($qna_seq);
		$data = array(
			"info" => $info
		);
		$this->load->view("/admin/consult/qna-view", $data);
	}

	public function qnaAnswer($qna_seq){
		$info = $this->ConsultModel->getQna($qna_seq);
		$data = array(
			"info" => $info
		);
		$this->load->view("/admin/consult/qna-answer", $data);
	}

	public function qnaAnswerSave(){
		$qna_seq = $this->input->post("qna_seq");
		$qna_subject = $this->input->post("qna_subject");
		$qna_contents = $this->input->post("qna_contents");
		//print_r($this->input->post());

		$info = $this->ConsultModel->getQna($qna_seq);
		//print_r($info);

		$insertArr = array(
						"QNA_GROUP" => $info->QNA_GROUP,
						"QNA_DEPTH" => 1,
						"QNA_USER_NAME" => $this->session->userdata("admin_name"),
						"QNA_USER_EMAIL" => $this->session->userdata("admin_email"),
						"QNA_SUBJECT" => $qna_subject,
						"QNA_CONTENTS" => $qna_contents,
						"QNA_ADMIN_SEQ" => $this->session->userdata("admin_seq"),
						"QNA_REG_DATE" => date("Y-m-d H:i:s"),
						"QNA_DEL_YN" => "N",
						"QNA_REG_IP" => $_SERVER["REMOTE_ADDR"]
		);

		$result = $this->ConsultModel->insertQna($insertArr);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "Q&A 답변 완료되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "Q&A 답변 저장중 문제가 생겼습니다."));
		}
	}

	public function qnaAnswerDelete(){
		$qna_seq = $this->input->post("qna_seq");

		$result = $this->ConsultModel->qnaDelete($qna_seq);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "Q&A 답변 삭제되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "Q&A 답변 삭제중 문제가 생겼습니다."));
		}
	}

	public function presentationList(){
		$limit = 10;
		$nowpage = "";
		if (!isset($_GET["per_page"])){
			$start = 0;
		}else{
			$start = ($_GET["per_page"]-1)*10;
			$nowpage = $_GET["per_page"];
		}

		$wheresql = array(
						"start" => $start,
						"limit" => $limit
						);
		$lists = $this->ConsultModel->getPresentationLists($wheresql);
		//echo $this->db->last_query();
		$listCount = $this->ConsultModel->getPresentationCount($wheresql);

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
		$this->load->view("/admin/consult/presentation-list", $data);
	}

	public function presentationView($pt_seq){
		$info = $this->ConsultModel->getPresentation($pt_seq);
		//print_r($info);
		$aUsers = $this->ConsultModel->getPresentationApply($pt_seq);
		print_r($aUsers);
		$data = array(
					"info" => $info,
					"aUsers" => $aUsers
		);
		
		$this->load->view("/admin/consult/presentation-view", $data);
	}

	public function presentationWrite(){
		$this->load->view("/admin/consult/presentation-write");
	}

	public function presentationWriteProc(){
		$pt_subject = $this->input->post("pt_subject");
		$pt_date = $this->input->post("pt_date");
		$pt_apply_cnt = $this->input->post("pt_apply_cnt");
		$pt_contents = $this->input->post("pt_contents");

		$insertArr = array(
						"PT_SUBJECT" => $pt_subject,
						"PT_CONTENTS" => $pt_contents,
						"PT_DATE" => $pt_date,
						"PT_REG_DATE" => date("Y-m-d H:i:s"),
						"PT_DEL_YN" => "N",
						"PT_REG_ADMIN_SEQ" => $this->session->userdata("admin_seq"),
						"PT_APPLY_CNT" => $pt_apply_cnt,
		);

		$result = $this->ConsultModel->insertPresentation($insertArr);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "설명회 등록 완료 되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "설명회 등록중 문제가 생겼습니다."));
		}
	}

	public function presentationEdit($pt_seq){
		$info = $this->ConsultModel->getPresentation($pt_seq);
		//print_r($info);

		$data = array(
					"info" => $info
		);
		
		$this->load->view("/admin/consult/presentation-edit", $data);
	}

	public function presentationEditProc(){
		$pt_seq = $this->input->post("pt_seq");
		$pt_subject = $this->input->post("pt_subject");
		$pt_date = $this->input->post("pt_date");
		$pt_apply_cnt = $this->input->post("pt_apply_cnt");
		$pt_contents = $this->input->post("pt_contents");
		//echo $pt_seq;
		$updateArr = array(
						"PT_SUBJECT" => $pt_subject,
						"PT_CONTENTS" => $pt_contents,
						"PT_DATE" => $pt_date,
						"PT_APPLY_CNT" => $pt_apply_cnt,
		);
		//print_r($updateArr);
		$result = $this->ConsultModel->updatePresentation($updateArr, $pt_seq);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "설명회 수정 완료 되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "설명회 수정중 문제가 생겼습니다."));
		}
	}

	public function presentationDelete(){
		$pt_seq = $this->input->post("pt_seq");

		$result = $this->ConsultModel->deletePresentation($pt_seq);

		if ($result == true){
			echo json_encode(array("code" => "200", "msg" => "설명회 삭제 완료 되었습니다."));
		}else{
			echo json_encode(array("code" => "202", "msg" => "설명회 삭제중 문제가 생겼습니다."));
		}
	}
}
