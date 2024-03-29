<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getOnlineConsultLists($whereArr){
		if ((isset($whereArr["user_seq"])) && ($whereArr["user_seq"] != "")){
			$this->db->where("TBL_HOSKO_ONLINE_CONSULT.OC_USER_SEQ", $whereArr["user_seq"]);
		}
		if ((isset($whereArr["searchString"])) && ($whereArr["searchString"] != "")){
			if ($whereArr["searchField"] == "all"){
				$this->db->group_start();
				$this->db->like("TBL_HOSKO_ONLINE_CONSULT.OC_SUBJECT", $whereArr["searchString"]);	
				$this->db->or_like("TBL_HOSKO_ONLINE_CONSULT.OC_CONTENTS", $whereArr["searchString"]);	
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_ONLINE_CONSULT.".$whereArr["searchField"], $whereArr["searchString"]);	
			}
		}
		$this->db->where("TBL_HOSKO_ONLINE_CONSULT.OC_DEL_YN", "N");
		$this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_ONLINE_CONSULT.OC_USER_SEQ = TBL_HOSKO_USER.USER_SEQ", "LEFT OUTER");
		$this->db->select("TBL_HOSKO_ONLINE_CONSULT.*, TBL_HOSKO_USER.USER_NAME, TBL_HOSKO_USER.USER_ID, TBL_HOSKO_USER.USER_TEL, TBL_HOSKO_USER.USER_HP");
		$this->db->order_by("TBL_HOSKO_ONLINE_CONSULT.OC_SEQ", "DESC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_ONLINE_CONSULT")->result();
	}

	public function getOnlineConsultListCount($whereArr){
		if ((isset($whereArr["user_seq"])) && ($whereArr["user_seq"] != "")){
			$this->db->where("TBL_HOSKO_ONLINE_CONSULT.OC_USER_SEQ", $whereArr["user_seq"]);
		}
		if ((isset($whereArr["searchString"])) && ($whereArr["searchString"] != "")){
			if ($whereArr["searchField"] == "all"){
				$this->db->group_start();
				$this->db->like("TBL_HOSKO_ONLINE_CONSULT.OC_SUBJECT", $whereArr["searchString"]);	
				$this->db->or_like("TBL_HOSKO_ONLINE_CONSULT.OC_CONTENTS", $whereArr["searchString"]);	
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_ONLINE_CONSULT.".$whereArr["searchField"], $whereArr["searchString"]);	
			}
		}
		$this->db->where("TBL_HOSKO_ONLINE_CONSULT.OC_DEL_YN", "N");
		$this->db->from("TBL_HOSKO_ONLINE_CONSULT");
		return $this->db->count_all_results();
	}

	public function getVisitConsultLists($whereArr){
		if ((isset($whereArr["consult_date_start"])) && ($whereArr["consult_date_start"] != "")){
			$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_CONSULT_DATE >=", $whereArr["consult_date_start"]);
		}

		if ((isset($whereArr["consult_date_end"])) && ($whereArr["consult_date_end"] != "")){
			$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_CONSULT_DATE <=", $whereArr["consult_date_end"]);
		}

		if ((isset($whereArr["consult_time"])) && ($whereArr["consult_time"] != "") && ($whereArr["consult_time"] != ":")){
			$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_CONSULT_TIME <=", $whereArr["consult_time"]);
		}

		if ((isset($whereArr["user_age"])) && ($whereArr["user_age"] != "")){
			$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_USER_AGE <=", $whereArr["user_age"]);
		}

		if ((isset($whereArr["user_major"])) && ($whereArr["user_major"] != "")){
			$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_USER_MAJOR <=", $whereArr["user_major"]);
		}

		if ((isset($whereArr["search_string"])) && ($whereArr["search_string"] != "")){
			if ($whereArr["search_field"] == "all"){
				$this->db->group_start();
				$this->db->like("TBL_HOSKO_VISIT_CONSULT.VCON_USER_NAME", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_VISIT _CONSULT.VCON_USER_COMP", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_VISIT_CONSULT.VCON_USER_MASOR", $whereArr["search_string"]);
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_VISIT_CONSULT.".$whereArr["search_field"], $whereArr["search_string"]);
			}
		}

		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_VISIT_CONSULT.VCON_SEQ", "DESC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_VISIT_CONSULT")->result();
	}

	public function getVisitConsultListCount($whereArr){
		if ((isset($whereArr["consult_date_start"])) && ($whereArr["consult_date_start"] != "")){
			$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_CONSULT_DATE >=", $whereArr["consult_date_start"]);
		}

		if ((isset($whereArr["consult_date_end"])) && ($whereArr["consult_date_end"] != "")){
			$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_CONSULT_DATE <=", $whereArr["consult_date_end"]);
		}

		if ((isset($whereArr["consult_time"])) && ($whereArr["consult_time"] != "")){
			$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_CONSULT_TIME <=", $whereArr["consult_time"]);
		}

		if ((isset($whereArr["user_age"])) && ($whereArr["user_age"] != "")){
			$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_USER_AGE <=", $whereArr["user_age"]);
		}

		if ((isset($whereArr["user_major"])) && ($whereArr["user_major"] != "")){
			$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_USER_MAJOR <=", $whereArr["user_major"]);
		}

		if ((isset($whereArr["search_string"])) && ($whereArr["search_string"] != "")){
			if ($whereArr["search_field"] == "all"){
				$this->db->group_start();
				$this->db->like("TBL_HOSKO_VISIT_CONSULT.VCON_USER_NAME", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_VISIT_CONSULT.VCON_USER_COMP", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_VISIT_CONSULT.VCON_USER_MASOR", $whereArr["search_string"]);
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_VISIT_CONSULT.".$whereArr["search_field"], $whereArr["search_string"]);
			}
		}

		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_DEL_YN", "N");
		$this->db->from("TBL_HOSKO_VISIT_CONSULT");
		return $this->db->count_all_results();
	}

	public function getVisitConsultInfo($vcon_seq){
		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_SEQ", $vcon_seq);
		return $this->db->get("TBL_HOSKO_VISIT_CONSULT")->row();
	}

	public function updateVisitConult($updateArr, $vcon_seq){
		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_SEQ", $vcon_seq);
		return $this->db->update("TBL_HOSKO_VISIT_CONSULT", $updateArr);
	}

	public function getCallMsg($whereArr){

		if ((isset($whereArr["reg_date_start"])) && ($whereArr["reg_date_start"] != "")){
			$this->db->where("date(TBL_HOSKO_CALL_LOG.CLOG_REG_DATE) >=", $whereArr["reg_date_start"]);
		}

		if ((isset($whereArr["reg_date_end"])) && ($whereArr["reg_date_end"] != "")){
			$this->db->where("date(TBL_HOSKO_CALL_LOG.CLOG_REG_DATE) <=", $whereArr["reg_date_end"]);
		}

		if ((isset($whereArr["search_string"])) && ($whereArr["search_string"] != "")){
			if ($whereArr["search_field"] == "all"){
				$this->db->group_start();
					$this->db->like("TBL_HOSKO_CALL_LOG.CLOG_MANAGER_NAME", $whereArr["search_string"]);
					$this->db->or_like("TBL_HOSKO_CALL_LOG.CLOG_USER_NAME", $whereArr["search_string"]);
					$this->db->or_like("TBL_HOSKO_CALL_LOG.CLOG_USER_COMPANY", $whereArr["search_string"]);
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_CALL_LOG.".$whereArr["search_field"], $whereArr["search_string"]);
			}
		}

		$this->db->where("TBL_HOSKO_CALL_LOG.CLOG_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_CALL_LOG.CLOG_SEQ", "DESC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_CALL_LOG")->result();
	}

	public function getCallMsgCount($whereArr){
		if ((isset($whereArr["reg_date_start"])) && ($whereArr["reg_date_start"] != "")){
			$this->db->where("date(TBL_HOSKO_CALL_LOG.CLOG_REG_DATE) >=", $whereArr["reg_date_start"]);
		}

		if ((isset($whereArr["reg_date_end"])) && ($whereArr["reg_date_end"] != "")){
			$this->db->where("date(TBL_HOSKO_CALL_LOG.CLOG_REG_DATE) <=", $whereArr["reg_date_end"]);
		}

		if ((isset($whereArr["search_string"])) && ($whereArr["search_string"] != "")){
			if ($whereArr["search_field"] == "all"){
				$this->db->group_start();
					$this->db->like("TBL_HOSKO_CALL_LOG.CLOG_MANAGER_NAME", $whereArr["search_string"]);
					$this->db->or_like("TBL_HOSKO_CALL_LOG.CLOG_USER_NAME", $whereArr["search_string"]);
					$this->db->or_like("TBL_HOSKO_CALL_LOG.CLOG_USER_COMPANY", $whereArr["search_string"]);
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_CALL_LOG.".$whereArr["search_field"], $whereArr["search_string"]);
			}
		}

		$this->db->where("TBL_HOSKO_CALL_LOG.CLOG_DEL_YN", "N");
		$this->db->from("TBL_HOSKO_CALL_LOG");
		return $this->db->count_all_results();
	}

	public function insertSchedule($insertArr){
		return $this->db->insert("TBL_HOSKO_SCHEDULE", $insertArr);
	}

	public function getSchedule($_nDay, $flag){
		$this->db->where("TBL_HOSKO_SCHEDULE.CAL_DEL_YN", "N");
		$this->db->where("TBL_HOSKO_SCHEDULE.CAL_FLAG", $flag);
		$this->db->where("TBL_HOSKO_SCHEDULE.CAL_DATE", $_nDay);
		return $this->db->get("TBL_HOSKO_SCHEDULE")->result();
	}

	public function getScheduleDetail($cal_seq){
		$this->db->where("TBL_HOSKO_SCHEDULE.CAL_SEQ", $cal_seq);
		$this->db->join("TBL_HOSKO_ADMIN", "TBL_HOSKO_ADMIN.ADMIN_SEQ=TBL_HOSKO_SCHEDULE.CAL_REG_USER_SEQ", "INNER");
		$this->db->select("TBL_HOSKO_SCHEDULE.*, TBL_HOSKO_ADMIN.ADMIN_NAME, TBL_HOSKO_ADMIN.ADMIN_EMAIL");
		return $this->db->get("TBL_HOSKO_SCHEDULE")->row();
	}

	public function updateSchedule($updateArr, $cal_seq){
		$this->db->where("TBL_HOSKO_SCHEDULE.CAL_SEQ", $cal_seq);
		return $this->db->update("TBL_HOSKO_SCHEDULE", $updateArr);
	}

	public function delSchedule($cal_seq){
		$this->db->where("TBL_HOSKO_SCHEDULE.CAL_SEQ", $cal_seq);
		return $this->db->update("TBL_HOSKO_SCHEDULE", array("CAL_DEL_YN" => "Y"));
	}

	public function insertOnlineConsult($insertData){
		return $this->db->insert("TBL_HOSKO_ONLINE_CONSULT", $insertData);
	}

	public function getOnlineConsult($oc_seq){
		$this->db->where("TBL_HOSKO_ONLINE_CONSULT.OC_SEQ", $oc_seq);
		$this->db->join("TBL_HOSKO_ADMIN", "TBL_HOSKO_ADMIN.ADMIN_SEQ = TBL_HOSKO_ONLINE_CONSULT.OC_ANSWER_ADMIN", "LEFT OUTER");
		$this->db->select("TBL_HOSKO_ONLINE_CONSULT.*, TBL_HOSKO_ADMIN.ADMIN_NAME");
		return $this->db->get("TBL_HOSKO_ONLINE_CONSULT")->row();
	}

	public function getQnaLists($whereArr){
		if ((isset($whereArr["user_seq"])) && ($whereArr["user_seq"] != "")){
			$this->db->where("TBL_HOSKO_QNA.QNA_USER_SEQ", $whereArr["user_seq"]);
		}
		if ((isset($whereArr["searchString"])) && ($whereArr["searchString"] != "")){
			if ($whereArr["searchField"] == "all"){
				$this->db->group_start();
				$this->db->like("TBL_HOSKO_QNA.QNA_SUBJECT", $whereArr["searchString"]);	
				$this->db->or_like("TBL_HOSKO_QNA.QNA_CONTENTS", $whereArr["searchString"]);	
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_QNA.".$whereArr["searchField"], $whereArr["searchString"]);	
			}
		}
		$this->db->where("TBL_HOSKO_QNA.QNA_DEL_YN", "N");
		$this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_QNA.QNA_USER_SEQ = TBL_HOSKO_USER.USER_SEQ", "LEFT OUTER");
		$this->db->select("TBL_HOSKO_QNA.*, TBL_HOSKO_USER.USER_NAME, TBL_HOSKO_USER.USER_ID, TBL_HOSKO_USER.USER_TEL, TBL_HOSKO_USER.USER_HP");
		$this->db->order_by("TBL_HOSKO_QNA.QNA_GROUP", "DESC");
		$this->db->order_by("TBL_HOSKO_QNA.QNA_DEPTH", "ASC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_QNA")->result();
	}

	public function getQnaListCount($whereArr){
		if ((isset($whereArr["user_seq"])) && ($whereArr["user_seq"] != "")){
			$this->db->where("TBL_HOSKO_QNA.QNA_USER_SEQ", $whereArr["user_seq"]);
		}
		if ((isset($whereArr["searchString"])) && ($whereArr["searchString"] != "")){
			if ($whereArr["searchField"] == "all"){
				$this->db->group_start();
				$this->db->like("TBL_HOSKO_QNA.QNA_SUBJECT", $whereArr["searchString"]);	
				$this->db->or_like("TBL_HOSKO_QNA.QNA_CONTENTS", $whereArr["searchString"]);	
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_QNA.".$whereArr["searchField"], $whereArr["searchString"]);	
			}
		}
		$this->db->where("TBL_HOSKO_QNA.QNA_DEL_YN", "N");
		$this->db->from("TBL_HOSKO_QNA");
		return $this->db->count_all_results();
	}

	public function insertQna($insertData){
		return $this->db->insert("TBL_HOSKO_QNA", $insertData);
	}

	public function getQnaGroupMax(){
		$this->db->select_max("QNA_GROUP");
		return $this->db->get("TBL_HOSKO_QNA")->row();
	}

	public function getQna($qna_seq){
		$this->db->where("TBL_HOSKO_QNA.QNA_SEQ", $qna_seq);
		return $this->db->get("TBL_HOSKO_QNA")->row();
	}

	public function setOnlineConsultAnswer($updateData, $oc_seq){
		$this->db->where("TBL_HOSKO_ONLINE_CONSULT.OC_SEQ", $oc_seq);
		return $this->db->update("TBL_HOSKO_ONLINE_CONSULT", $updateData);
	}

	public function qnaDelete($qna_seq){
		$this->db->where("TBL_HOSKO_QNA.QNA_SEQ", $qna_seq);
		return $this->db->update("TBL_HOSKO_QNA", array("QNA_DEL_YN" => "Y"));
	}

	public function getVisitConsultByDate($visit_date){
		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_CONSULT_DATE", $visit_date);
		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_VISIT_CONSULT.VCON_SEQ", "DESC");
		return $this->db->get("TBL_HOSKO_VISIT_CONSULT")->result();
	}

	public function getVisitConsultDate($consult_date){
		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_CONSULT_DATE", $consult_date);
		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_DEL_YN", "N");
		$this->db->from("TBL_HOSKO_VISIT_CONSULT");
		return $this->db->count_all_results();
	}

	public function insertVisitConsult($insertData){
		return $this->db->insert("TBL_HOSKO_VISIT_CONSULT", $insertData);
	}

	public function visitConsultCheck($consult_date, $consult_time, $vcon_seq = ""){
		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_CONSULT_DATE", $consult_date);
		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_CONSULT_TIME", $consult_time);
		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_SEQ !=", $vcon_seq);
		$this->db->from("TBL_HOSKO_VISIT_CONSULT");
		return $this->db->count_all_results();
	}

	public function deleteVisitConsult($vcon_seq){
		$this->db->where("TBL_HOSKO_VISIT_CONSULT.VCON_SEQ", $vcon_seq);
		return $this->db->update("TBL_HOSKO_VISIT_CONSULT", array("VCON_DEL_YN" => "Y"));
	}

	public function getPresentationLists($whereArr){
		if ((isset($whereArr["searchString"])) && ($whereArr["searchString"] != "")){
			if ($whereArr["searchField"] == "all"){
				$this->db->group_start();
				$this->db->like("TBL_HOSKO_PRESENTATION.PT_SUBJECT", $whereArr["searchString"]);	
				$this->db->or_like("TBL_HOSKO_PRESENTATION.PT_CONTENTS", $whereArr["searchString"]);	
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_PRESENTATION.".$whereArr["searchField"], $whereArr["searchString"]);	
			}
		}
		$this->db->where("TBL_HOSKO_PRESENTATION.PT_DEL_YN", "N");
		$this->db->join("TBL_HOSKO_ADMIN", "TBL_HOSKO_PRESENTATION.PT_REG_ADMIN_SEQ = TBL_HOSKO_ADMIN.ADMIN_SEQ", "LEFT OUTER");
		$this->db->select("TBL_HOSKO_PRESENTATION.*, TBL_HOSKO_ADMIN.ADMIN_NAME");
		$this->db->order_by("TBL_HOSKO_PRESENTATION.PT_SEQ", "DESC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_PRESENTATION")->result();
	}

	public function getPresentationCount($whereArr){
		if ((isset($whereArr["searchString"])) && ($whereArr["searchString"] != "")){
			if ($whereArr["searchField"] == "all"){
				$this->db->group_start();
				$this->db->like("TBL_HOSKO_PRESENTATION.PT_SUBJECT", $whereArr["searchString"]);	
				$this->db->or_like("TBL_HOSKO_PRESENTATION.PT_CONTENTS", $whereArr["searchString"]);	
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_PRESENTATION.".$whereArr["searchField"], $whereArr["searchString"]);	
			}
		}
		$this->db->where("TBL_HOSKO_PRESENTATION.PT_DEL_YN", "N");
		$this->db->join("TBL_HOSKO_ADMIN", "TBL_HOSKO_PRESENTATION.PT_REG_ADMIN_SEQ = TBL_HOSKO_ADMIN.ADMIN_SEQ", "LEFT OUTER");
		$this->db->from("TBL_HOSKO_PRESENTATION");
		return $this->db->count_all_results();
	}

	public function getPresentation($pt_seq){
		$this->db->where("TBL_HOSKO_PRESENTATION.PT_DEL_YN", "N");
		$this->db->where("TBL_HOSKO_PRESENTATION.PT_SEQ", $pt_seq);
		$this->db->join("TBL_HOSKO_ADMIN", "TBL_HOSKO_PRESENTATION.PT_REG_ADMIN_SEQ = TBL_HOSKO_ADMIN.ADMIN_SEQ", "LEFT OUTER");
		$this->db->select("TBL_HOSKO_PRESENTATION.*, TBL_HOSKO_ADMIN.ADMIN_NAME");
		return $this->db->get("TBL_HOSKO_PRESENTATION")->row();
	}

	public function insertPresentation($insertData){
		return $this->db->insert("TBL_HOSKO_PRESENTATION", $insertData);
	}

	public function updatePresentation($updateData, $pt_seq){
		$this->db->where("TBL_HOSKO_PRESENTATION.PT_SEQ", $pt_seq);
		return $this->db->update("TBL_HOSKO_PRESENTATION", $updateData);
	}

	public function deletePresentation($pt_seq){
		$this->db->where("TBL_HOSKO_PRESENTATION.PT_SEQ", $pt_seq);
		return $this->db->update("TBL_HOSKO_PRESENTATION", array("PT_DEL_YN" => "Y"));
	}

	public function endPresentation($pt_seq){
		$this->db->where("TBL_HOSKO_PRESENTATION.PT_SEQ", $pt_seq);
		return $this->db->update("TBL_HOSKO_PRESENTATION", array("PT_STATUS" => 1));
	}

	public function setPresentationApply($applyArr){
		return $this->db->insert("TBL_HOSKO_PRESENTATION_APPLY", $applyArr);
	}

	public function checkPtApply($user_seq, $pt_seq){
		$this->db->where("TBL_HOSKO_PRESENTATION_APPLY.PT_SEQ", $pt_seq);
		$this->db->where("TBL_HOSKO_PRESENTATION_APPLY.PA_USER_SEQ", $user_seq);
		$this->db->from("TBL_HOSKO_PRESENTATION_APPLY");
		return $this->db->count_all_results();
	}

	public function readCntPresentation($pt_seq){
		$query = "update TBL_HOSKO_PRESENTATION set PT_READ_CNT = PT_READ_CNT +1 where PT_SEQ = '" . $pt_seq . "'";
		$this->db->query($query);
	}

	public function getPresentationApplyUser($user_seq){
		$this->db->where("TBL_HOSKO_PRESENTATION_APPLY.PA_USER_SEQ", $user_seq);
		$this->db->join("TBL_HOSKO_PRESENTATION", "TBL_HOSKO_PRESENTATION.PT_SEQ = TBL_HOSKO_PRESENTATION_APPLY.PT_SEQ", "INNER");
		$this->db->select("TBL_HOSKO_PRESENTATION_APPLY.*, TBL_HOSKO_PRESENTATION.PT_SUBJECT");
		$this->db->order_by("TBL_HOSKO_PRESENTATION_APPLY.PA_REG_DATE", "DESC");
		return $this->db->get("TBL_HOSKO_PRESENTATION_APPLY")->result();
	}

	public function getPresentationApply($pt_seq){
		$this->db->where("TBL_HOSKO_PRESENTATION_APPLY.PT_SEQ", $pt_seq);
		$this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_USER.USER_SEQ=TBL_HOSKO_PRESENTATION_APPLY.PA_USER_SEQ", "INNER");
		$this->db->select("TBL_HOSKO_USER.USER_ID, TBL_HOSKO_USER.USER_NAME, TBL_HOSKO_USER.USER_TEL, TBL_HOSKO_USER.USER_HP, TBL_HOSKO_USER.USER_EMAIL, TBL_HOSKO_PRESENTATION_APPLY.*");
		$this->db->order_by("TBL_HOSKO_PRESENTATION_APPLY.PA_REG_DATE", "DESC");
		return $this->db->get("TBL_HOSKO_PRESENTATION_APPLY")->result();
	}

	public function getQuestionInfo($group_key){
		$this->db->where("TBL_HOSKO_QNA.QNA_GROUP", $group_key);
		$this->db->where("TBL_HOSKO_QNA.QNA_DEPTH", 0);
		return $this->db->get("TBL_HOSKO_QNA")->row();
	}

	public function getQnaTop5(){
		$this->db->where("TBL_HOSKO_QNA.QNA_DEPTH", "0");
		$this->db->where("TBL_HOSKO_QNA.QNA_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_QNA.QNA_GROUP", "DESC");
		$this->db->limit(5);
		return $this->db->get("TBL_HOSKO_QNA")->result();
	}

	public function getQnaOrigin($qna_group){
		$this->db->where("TBL_HOSKO_QNA.QNA_GROUP", $qna_group);
		$this->db->where("TBL_HOSKO_QNA.QNA_DEPTH", "0");
		$this->db->where("TBL_HOSKO_QNA.QNA_DEL_YN", "N");		
		return $this->db->get("TBL_HOSKO_QNA")->row();
	}

	public function deleteOnlineConsult($oc_seq){
		$this->db->where("TBL_HOSKO_ONLINE_CONSULT.OC_SEQ", $oc_seq);
		return $this->db->update("TBL_HOSKO_ONLINE_CONSULT", array("OC_DEL_YN" => "Y"));
	}
}
