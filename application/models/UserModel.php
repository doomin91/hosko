<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getUsers($whereArr){
		if ((isset($whereArr["reg_date_start"])) && ($whereArr["reg_date_start"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_REG_DATE >=", $whereArr["reg_date_start"]);
		}

		if ((isset($whereArr["reg_date_end"])) && ($whereArr["reg_date_end"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_REG_DATE <=", $whereArr["reg_date_end"]);
		}

		if ((isset($whereArr["last_login_start"])) && ($whereArr["last_login_start"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAST_LOGIN >=", $whereArr["last_login_start"]);
		}

		if ((isset($whereArr["last_login_end"])) && ($whereArr["last_login_end"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAST_LOGIN <=", $whereArr["last_login_end"]);
		}

		if ((isset($whereArr["user_study_nation"])) && ($whereArr["user_study_nation"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_STUDY_NATION", $whereArr["user_study_nation"]);
		}

		if ((isset($whereArr["user_study_term"])) && ($whereArr["user_study_term"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_STUDY_TERM", $whereArr["user_study_term"]);
		}

		if ((isset($whereArr["user_lan_study_nation"])) && ($whereArr["user_lan_study_nation"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAN_STUDY_NATION", $whereArr["user_lan_study_nation"]);
		}

		if ((isset($whereArr["user_lan_study_term"])) && ($whereArr["user_lan_study_term"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAN_STUDY_TERM", $whereArr["user_lan_study_term"]);
		}

		if ((isset($whereArr["user_level"])) && ($whereArr["user_level"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LEVEL", $whereArr["user_level"]);
		}

		if ((isset($whereArr["user_email_flag"])) && ($whereArr["user_email_flag"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_EMAIL_FLAG", $whereArr["user_email_flag"]);
		}

		if ((isset($whereArr["search_string"])) && ($whereArr["search_string"] != "")){
			if ($whereArr["search_field"] == "all"){
				$this->db->group_start();
				$this->db->like("TBL_HOSKO_USER.USER_ID", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_NAME", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_NUMBER", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_HP", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_EMAIL", $whereArr["search_string"]);
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_USER.".$whereArr["search_field"], $whereArr["search_string"]);
			}
		}

		$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_USER.USER_SEQ", "DESC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_USER")->result();
		//return "";
	}

	public function getUsersCount($whereArr){
		if ((isset($whereArr["reg_date_start"])) && ($whereArr["reg_date_start"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_REG_DATE >=", $whereArr["reg_date_start"]);
		}

		if ((isset($whereArr["reg_date_end"])) && ($whereArr["reg_date_end"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_REG_DATE <=", $whereArr["reg_date_start"]);
		}

		if ((isset($whereArr["last_login_start"])) && ($whereArr["last_login_start"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAST_LOGIN >=", $whereArr["last_login_start"]);
		}

		if ((isset($whereArr["last_login_end"])) && ($whereArr["last_login_end"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAST_LOGIN <=", $whereArr["last_login_end"]);
		}

		if ((isset($whereArr["user_study_nation"])) && ($whereArr["user_study_nation"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_STUDY_NATION", $whereArr["user_study_nation"]);
		}

		if ((isset($whereArr["user_study_term"])) && ($whereArr["user_study_term"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_STUDY_TERM", $whereArr["user_study_term"]);
		}

		if ((isset($whereArr["user_lan_study_nation"])) && ($whereArr["user_lan_study_nation"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAN_STUDY_NATION", $whereArr["user_lan_study_nation"]);
		}

		if ((isset($whereArr["user_lan_study_term"])) && ($whereArr["user_lan_study_term"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAN_STUDY_TERM", $whereArr["user_lan_study_term"]);
		}

		if ((isset($whereArr["user_level"])) && ($whereArr["user_level"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LEVEL", $whereArr["user_level"]);
		}

		if ((isset($whereArr["user_email_flag"])) && ($whereArr["user_email_flag"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_EMAIL_FLAG", $whereArr["user_email_flag"]);
		}

		if ((isset($whereArr["search_string"])) && ($whereArr["search_string"] != "")){
			if ($whereArr["search_field"] == "all"){
				$this->db->group_start();
				$this->db->like("TBL_HOSKO_USER.USER_ID", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_NAME", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_NUMBER", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_HP", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_EMAIL", $whereArr["search_string"]);
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_USER.".$whereArr["search_field"], $whereArr["search_string"]);
			}
		}

		$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
		$this->db->from("TBL_HOSKO_USER");
		return $this->db->count_all_results();
	}

	public function getUserInfo($user_seq){
		$this->db->where("TBL_HOSKO_USER.USER_SEQ", $user_seq);
		return $this->db->get("TBL_HOSKO_USER")->row();
	}

	public function editUser($updateArr, $user_seq){
		$this->db->where("TBL_HOSKO_USER.USER_SEQ", $user_seq);
		return $this->db->update("TBL_HOSKO_USER", $updateArr);
	}

	public function CheckUserId($user_id){
		$this->db->where("TBL_HOSKO_USER.USER_ID", $user_id);
		return $this->db->get("TBL_HOSKO_USER")->row();
	}

	public function insertUser($insertData){
		return $this->db->insert("TBL_HOSKO_USER", $insertData);
	}

	public function getUserLevelAll(){
		$this->db->where("TBL_HOSKO_USER_LEVEL.LEVEL_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_USER_LEVEL.LEVEL_RANK", "ASC");
		return $this->db->get("TBL_HOSKO_USER_LEVEL")->result();
	}

	public function getUserLevel($whereArr){
		$this->db->where("TBL_HOSKO_USER_LEVEL.LEVEL_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_USER_LEVEL.LEVEL_RANK", "ASC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_USER_LEVEL")->result();
	}

	public function getUserLevelCount($whereArr){
		$this->db->where("TBL_HOSKO_USER_LEVEL.LEVEL_DEL_YN", "N");
		$this->db->from("TBL_HOSKO_USER_LEVEL");
		return $this->db->count_all_results();
	}

	public function insertLevel($saveArr){
		return $this->db->insert("TBL_HOSKO_USER_LEVEL", $saveArr);
	}

	public function updateLevel($saveArr, $level_seq){
		$this->db->where("TBL_HOSKO_USER_LEVEL.LEVEL_SEQ", $level_seq);
		return $this->db->update("TBL_HOSKO_USER_LEVEL", $saveArr);
	}

	public function getLevel($level_seq){
		$this->db->where("TBL_HOSKO_USER_LEVEL.LEVEL_SEQ", $level_seq);
		return $this->db->get("TBL_HOSKO_USER_LEVEL")->row();
	}

	public function getUserLevelStaics(){
		$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
		$this->db->where("TBL_HOSKO_USER_LEVEL.LEVEL_RANK !=", "0");
		$this->db->join("TBL_HOSKO_USER_LEVEL", "TBL_HOSKO_USER_LEVEL.LEVEL_SEQ = TBL_HOSKO_USER.USER_LEVEL", "INNER");
		$this->db->select("TBL_HOSKO_USER_LEVEL.LEVEL_NAME, TBL_HOSKO_USER_LEVEL.LEVEL_RANK, count(*) as CNT");
		$this->db->group_by("TBL_HOSKO_USER_LEVEL.LEVEL_NAME, TBL_HOSKO_USER_LEVEL.LEVEL_RANK");
		$this->db->order_by("TBL_HOSKO_USER_LEVEL.LEVEL_RANK", "ASC");
		return $this->db->get("TBL_HOSKO_USER")->result();
	}

	public function getUserlAllCount(){
		$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
		$this->db->from("TBL_HOSKO_USER");
		return $this->db->count_all_results();
	}

	public function getMaxUserNumber(){
		//$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
		//$this->db->from("TBL_HOSKO_USER");
		$this->db->select_max("USER_NUMBER");
		return $this->db->get("TBL_HOSKO_USER")->row();
	}

	public function getUserGenderStatics(){
		$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
		$this->db->select("TBL_HOSKO_USER.USER_SEX, count(*) as CNT");
		$this->db->group_by("TBL_HOSKO_USER.USER_SEX");
		$this->db->order_by("CNT", "DESC");
		return $this->db->get("TBL_HOSKO_USER")->result();
	}

	public function getUserStatics($field){
		$this->db->select("VIEW_USER_STATICS.".$field.", count(*) as CNT");
		$this->db->group_by("VIEW_USER_STATICS.".$field."");
		$this->db->order_by("VIEW_USER_STATICS.".$field."", "ASC");
		return $this->db->get("VIEW_USER_STATICS")->result();
	}

	public function getUserAll($whereArr){
		if ((isset($whereArr["reg_date_start"])) && ($whereArr["reg_date_start"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_REG_DATE >=", $whereArr["reg_date_start"]);
		}

		if ((isset($whereArr["reg_date_end"])) && ($whereArr["reg_date_end"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_REG_DATE <=", $whereArr["reg_date_end"]);
		}

		if ((isset($whereArr["last_login_start"])) && ($whereArr["last_login_start"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAST_LOGIN >=", $whereArr["last_login_start"]);
		}

		if ((isset($whereArr["last_login_end"])) && ($whereArr["last_login_end"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAST_LOGIN <=", $whereArr["last_login_end"]);
		}

		if ((isset($whereArr["user_study_nation"])) && ($whereArr["user_study_nation"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_STUDY_NATION", $whereArr["user_study_nation"]);
		}

		if ((isset($whereArr["user_study_term"])) && ($whereArr["user_study_term"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_STUDY_TERM", $whereArr["user_study_term"]);
		}

		if ((isset($whereArr["user_lan_study_nation"])) && ($whereArr["user_lan_study_nation"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAN_STUDY_NATION", $whereArr["user_lan_study_nation"]);
		}

		if ((isset($whereArr["user_lan_study_term"])) && ($whereArr["user_lan_study_term"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAN_STUDY_TERM", $whereArr["user_lan_study_term"]);
		}

		if ((isset($whereArr["user_level"])) && ($whereArr["user_level"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LEVEL", $whereArr["user_level"]);
		}

		if ((isset($whereArr["user_email_flag"])) && ($whereArr["user_email_flag"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_EMAIL_FLAG", $whereArr["user_email_flag"]);
		}

		if ((isset($whereArr["search_string"])) && ($whereArr["search_string"] != "")){
			if ($whereArr["search_field"] == "all"){
				$this->db->group_start();
				$this->db->like("TBL_HOSKO_USER.USER_ID", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_NAME", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_NUMBER", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_HP", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_EMAIL", $whereArr["search_string"]);
				$this->db->group_end();
			}else{
				$this->db->like("TBL_HOSKO_USER.".$whereArr["search_field"], $whereArr["search_string"]);
			}
		}

		$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_USER.USER_SEQ", "DESC");
		return $this->db->get("TBL_HOSKO_USER")->result();
	}

	public function setMsgData($sendData){
		return $this->db->insert("MSG_DATA", $sendData);
	}

	public function getUserCallMsg($whereArr){
		$this->db->where("TBL_HOSKO_CALL_LOG.CLOG_USER_SEQ", $whereArr["user_seq"]);
		$this->db->where("TBL_HOSKO_CALL_LOG.CLOG_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_CALL_LOG.CLOG_SEQ", "DESC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_CALL_LOG")->result();
	}

	public function getUserCallMsgCount($whereArr){
		$this->db->where("TBL_HOSKO_CALL_LOG.CLOG_USER_SEQ", $whereArr["user_seq"]);
		$this->db->where("TBL_HOSKO_CALL_LOG.CLOG_DEL_YN", "N");
		$this->db->from("TBL_HOSKO_CALL_LOG");
		return $this->db->count_all_results();
	}

	public function insertUserCallMsg($whereArr){
		return $this->db->insert("TBL_HOSKO_CALL_LOG", $whereArr);
	}

	public function updateUserCallMsg($updateArr, $clog_seq){
		$this->db->where("TBL_HOSKO_CALL_LOG.CLOG_SEQ", $clog_seq);
		return $this->db->update("TBL_HOSKO_CALL_LOG", $updateArr);
	}

	public function getCallLog($clog_seq){
		$this->db->where("TBL_HOSKO_CALL_LOG.CLOG_SEQ", $clog_seq);
		return $this->db->get("TBL_HOSKO_CALL_LOG")->row();
	}

	public function delCallLog($clog_seq){
		$this->db->where("TBL_HOSKO_CALL_LOG.CLOG_SEQ", $clog_seq);
		return $this->db->update("TBL_HOSKO_CALL_LOG", array("CLOG_DEL_YN" => "Y"));
	}

	public function getMailFormLists($whereArr){
		$this->db->where("TBL_HOSKO_MAILFORM.MF_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_MAILFORM.MF_SEQ", "DESC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_MAILFORM")->result();
	}

	public function getMailFormListCount($whereArr){
		$this->db->where("TBL_HOSKO_MAILFORM.MF_DEL_YN", "N");
		$this->db->from("TBL_HOSKO_MAILFORM");
		return $this->db->count_all_results();
	}

	public function insertMailForm($insertArr){
		return $this->db->insert("TBL_HOSKO_MAILFORM", $insertArr);
	}

	public function getMailForm($mf_seq){
		$this->db->where("TBL_HOSKO_MAILFORM.MF_SEQ", $mf_seq);
		return $this->db->get("TBL_HOSKO_MAILFORM")->row();
	}

	public function updateMailForm($updateArr, $mf_seq){
		$this->db->where("TBL_HOSKO_MAILFORM.MF_SEQ", $mf_seq);
		return $this->db->update("TBL_HOSKO_MAILFORM", $updateArr);
	}

	public function delMailForm($mf_seq){
		$this->db->where("TBL_HOSKO_MAILFORM.MF_SEQ", $mf_seq);
		return $this->db->update("TBL_HOSKO_MAILFORM", array("MF_DEL_YN" => "Y"));
	}

	public function getMailForms(){
		$this->db->where("TBL_HOSKO_MAILFORM.MF_DEL_YN", "N");
		$this->db->select("TBL_HOSKO_MAILFORM.MF_SEQ, TBL_HOSKO_MAILFORM.MF_NAME");
		$this->db->order_by("TBL_HOSKO_MAILFORM.MF_SEQ", "ASC");
		return $this->db->get("TBL_HOSKO_MAILFORM")->result();
	}
}
