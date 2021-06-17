<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getOnlineConsultLists($whereArr){
		$this->db->where("TBL_HOSKO_ONLINE_CONSULT.OC_DEL_YN", "N");
		$this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_ONLINE_CONSULT.OC_USER_SEQ = TBL_HOSKO_USER.USER_SEQ", "INNER");
		$this->db->select("TBL_HOSKO_ONLINE_CONSULT.*, TBL_HOSKO_USER.USER_NAME, TBL_HOSKO_USER.USER_ID, TBL_HOSKO_USER.USER_TEL, TBL_HOSKO_USER.USER_HP");
		$this->db->order_by("TBL_HOSKO_ONLINE_CONSULT.OC_SEQ", "DESC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_ONLINE_CONSULT")->result();
	}

	public function getOnlineConsultListCount($whereArr){
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
		$this->db->where("TBL_HOSKO_CALL_LOG.CLOG_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_CALL_LOG.CLOG_SEQ", "DESC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_CALL_LOG")->result();
	}

	public function getCallMsgCount($whereArr){
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

	public function delSchedule($cal_seq){
		$this->db->where("TBL_HOSKO_SCHEDULE.CAL_SEQ", $cal_seq);
		return $this->db->update("TBL_HOSKO_SCHEDULE", array("CAL_DEL_YN" => "Y"));
	}
}
