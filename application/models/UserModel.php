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

		if ((isset($whereArr["user_skill_eng"])) && ($whereArr["user_skill_eng"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_SKILL_ENG", $whereArr["user_skill_eng"]);
		}

		if ((isset($whereArr["user_skill_jp"])) && ($whereArr["user_skill_jp"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_SKILL_JP", $whereArr["user_skill_jp"]);
		}

		if ((isset($whereArr["user_skill_ch"])) && ($whereArr["user_skill_ch"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_SKILL_CH", $whereArr["user_skill_ch"]);
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
				$this->db->or_like("TBL_HOSKO_USER.USER_LEAVE_COUNTRY", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_LEAVE_HOTEL", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_COMPANY", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_MAJOR", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_MANAGER_NAME", $whereArr["search_string"]);
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
			$this->db->where("TBL_HOSKO_USER.USER_REG_DATE <=", $whereArr["reg_date_end"]);
		}

		if ((isset($whereArr["last_login_start"])) && ($whereArr["last_login_start"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAST_LOGIN >=", $whereArr["last_login_start"]);
		}

		if ((isset($whereArr["last_login_end"])) && ($whereArr["last_login_end"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_LAST_LOGIN <=", $whereArr["last_login_end"]);
		}

		if ((isset($whereArr["user_skill_eng"])) && ($whereArr["user_skill_eng"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_SKILL_ENG", $whereArr["user_skill_eng"]);
		}

		if ((isset($whereArr["user_skill_jp"])) && ($whereArr["user_skill_jp"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_SKILL_JP", $whereArr["user_skill_jp"]);
		}

		if ((isset($whereArr["user_skill_ch"])) && ($whereArr["user_skill_ch"] != "")){
			$this->db->where("TBL_HOSKO_USER.USER_SKILL_CH", $whereArr["user_skill_ch"]);
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
				$this->db->or_like("TBL_HOSKO_USER.USER_LEAVE_COUNTRY", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_LEAVE_HOTEL", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_COMPANY", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_MAJOR", $whereArr["search_string"]);
				$this->db->or_like("TBL_HOSKO_USER.USER_MANAGER_NAME", $whereArr["search_string"]);
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
	public function getUserInfoById($user_id){
		$this->db->where("TBL_HOSKO_USER.USER_ID", $user_id);
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
		
		if ((isset($whereArr["user_seq_arr"])) && (count($whereArr["user_seq_arr"]) > 0)){
			$this->db->where_in("TBL_HOSKO_USER.USER_SEQ", $whereArr["user_seq_arr"]);
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
		return $this->db->insert("MSG_DATA_SMS", $sendData);
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

	public function getIdFind($user_name, $user_email){
		$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
		$this->db->where("TBL_HOSKO_USER.USER_NAME", $user_name);
		$this->db->where("TBL_HOSKO_USER.USER_EMAIL", $user_email);
		return $this->db->get("TBL_HOSKO_USER")->row();
	}

	public function getPwFind($user_id, $user_name, $user_email){
		$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
		$this->db->where("TBL_HOSKO_USER.USER_ID", $user_id);
		$this->db->where("TBL_HOSKO_USER.USER_NAME", $user_name);
		$this->db->where("TBL_HOSKO_USER.USER_EMAIL", $user_email);
		return $this->db->get("TBL_HOSKO_USER")->row();
	}

	public function idCheck($user_id){
		$this->db->where("TBL_HOSKO_USER.USER_ID", $user_id);
		$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
		return $this->db->get("TBL_HOSKO_USER")->row();
	}

	// 이력서 부분
	public function getUserResume($user_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME.USER_SEQ", $user_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME")->row();
	}
	public function getAdminUserResume($user_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_ADMIN.USER_SEQ", $user_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_ADMIN")->row();
	}
	public function createUserResume($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME", $insertArr);
	}
	public function createAdminUserResume($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_ADMIN", $insertArr);
	}
	public function updateUserResume($updateArr, $resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME.RESUME_SEQ", $resume_seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME", $updateArr);
	}
	public function updateAdminUserResume($updateArr, $resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_ADMIN.ADMIN_RESUME_SEQ", $resume_seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_ADMIN", $updateArr);
	}

	public function getUserResumeEducation($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_EDUCATION.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_EDUCATION")->result();
	}
	public function getUserResumeWorkExp($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_WORKING_EXPERIENCE.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_WORKING_EXPERIENCE")->result();
	}
	public function getUserResumeActivity($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_ACTIVITY.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_ACTIVITY")->result();
	}
	public function getUserResumeAchiv($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_ACHIEVEMENT.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_ACHIEVEMENT")->result();
	}
	public function getUserResumeSkill($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_SKILL.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_SKILL")->result();
	}
	public function getUserResumeLanguage($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_LANGUAGE.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_LANGUAGE")->result();
	}

	public function createUserResumeEducation($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_EDUCATION", $insertArr);
	}
	public function createUserResumeWorkExp($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_WORKING_EXPERIENCE", $insertArr);
	}
	public function createUserResumeActivity($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_ACTIVITY", $insertArr);
	}
	public function createUserResumeAchiv($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_ACHIEVEMENT", $insertArr);
	}
	public function createUserResumeSkill($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_SKILL", $insertArr);
	}
	public function createUserResumeLanguage($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_LANGUAGE", $insertArr);
	}

	public function getAdminUserResumeEducation($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_EDUCATION_ADMIN.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_EDUCATION_ADMIN")->result();
	}
	public function getAdminUserResumeWorkExp($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_WORKING_EXPERIENCE_ADMIN.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_WORKING_EXPERIENCE_ADMIN")->result();
	}
	public function getAdminUserResumeActivity($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_ACTIVITY_ADMIN.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_ACTIVITY_ADMIN")->result();
	}
	public function getAdminUserResumeAchiv($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_ACHIEVEMENT_ADMIN.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_ACHIEVEMENT_ADMIN")->result();
	}
	public function getAdminUserResumeSkill($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_SKILL_ADMIN.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_SKILL_ADMIN")->result();
	}
	public function getAdminUserResumeLanguage($resume_seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_LANGUAGE_ADMIN.RESUME_SEQ", $resume_seq);
		return $this->db->get("TBL_HOSKO_USER_RESUME_LANGUAGE_ADMIN")->result();
	}

	public function createAdminUserResumeEducation($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_EDUCATION_ADMIN", $insertArr);
	}
	public function createAdminUserResumeWorkExp($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_WORKING_EXPERIENCE_ADMIN", $insertArr);
	}
	public function createAdminUserResumeActivity($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_ACTIVITY_ADMIN", $insertArr);
	}
	public function createAdminUserResumeAchiv($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_ACHIEVEMENT_ADMIN", $insertArr);
	}
	public function createAdminUserResumeSkill($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_SKILL_ADMIN", $insertArr);
	}
	public function createAdminUserResumeLanguage($insertArr){
		return $this->db->insert("TBL_HOSKO_USER_RESUME_LANGUAGE_ADMIN", $insertArr);
	}

	public function updateUserResumeEducation($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_EDUCATION.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_EDUCATION", $updateArr);
	}
	public function updateUserResumeWorkExp($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_WORKING_EXPERIENCE.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_WORKING_EXPERIENCE", $updateArr);
	}
	public function updateUserResumeActivity($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_ACTIVITY.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_ACTIVITY", $updateArr);
	}
	public function updateUserResumeAchiv($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_ACHIEVEMENT.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_ACHIEVEMENT", $updateArr);
	}
	public function updateUserResumeSkill($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_SKILL.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_SKILL", $updateArr);
	}
	public function updateUserResumeLanguage($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_LANGUAGE.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_LANGUAGE", $updateArr);
	}
	public function updateAdminUserResumeEducation($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_EDUCATION_ADMIN.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_EDUCATION_ADMIN", $updateArr);
	}
	public function updateAdminUserResumeWorkExp($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_WORKING_EXPERIENCE_ADMIN.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_WORKING_EXPERIENCE_ADMIN", $updateArr);
	}
	public function updateAdminUserResumeActivity($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_ACTIVITY_ADMIN.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_ACTIVITY_ADMIN", $updateArr);
	}
	public function updateAdminUserResumeAchiv($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_ACHIEVEMENT_ADMIN.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_ACHIEVEMENT_ADMIN", $updateArr);
	}
	public function updateAdminUserResumeSkill($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_SKILL_ADMIN.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_SKILL_ADMIN", $updateArr);
	}
	public function updateAdminUserResumeLanguage($updateArr, $seq){
		$this->db->where("TBL_HOSKO_USER_RESUME_LANGUAGE_ADMIN.SEQ", $seq);
		return $this->db->update("TBL_HOSKO_USER_RESUME_LANGUAGE_ADMIN", $updateArr);
	}

	public function setMMSData($insertData){
		return $this->db->insert("MMS_CONTENTS_INFO_SMS", $insertData);
	}	


	public function getUserDocument($user_seq){
		$this->db->where("TBL_HOSKO_USER_DOCUMENT.USER_SEQ", $user_seq);
		return $this->db->get("TBL_HOSKO_USER_DOCUMENT")->row();
	}
	public function getUserDocumentByDocSeq($doc_seq){
		$this->db->where("TBL_HOSKO_USER_DOCUMENT.DOC_SEQ", $doc_seq);
		return $this->db->get("TBL_HOSKO_USER_DOCUMENT")->row();
	}
	public function createUserDocument($insertData){
		return $this->db->insert("TBL_HOSKO_USER_DOCUMENT", $insertData);
	}
	public function updateUserDocument($updateArr, $doc_seq){
		$this->db->where("TBL_HOSKO_USER_DOCUMENT.DOC_SEQ", $doc_seq);
		return $this->db->update("TBL_HOSKO_USER_DOCUMENT", $updateArr);
	}

	public function getUserCertificate($user_seq){
		$this->db->where("TBL_HOSKO_USER_CERTIFICATE.USER_SEQ", $user_seq);
		return $this->db->get("TBL_HOSKO_USER_CERTIFICATE")->row();
	}
	public function getUserCertificateByCertSeq($cert_seq){
		$this->db->where("TBL_HOSKO_USER_CERTIFICATE.CERT_SEQ", $cert_seq);
		return $this->db->get("TBL_HOSKO_USER_CERTIFICATE")->row();
	}
	public function createUserCertificate($insertData){
		return $this->db->insert("TBL_HOSKO_USER_CERTIFICATE", $insertData);
	}

	public function getUserWithDocument($whereArr){
		if(isset($whereArr["search_option"]) && $whereArr["search_option"] != "all"){
            if($whereArr["search_option"] == "name"){
                $this->db->like("TBL_HOSKO_USER.USER_NAME", $whereArr["search_text"]);
            }else if($whereArr["search_option"] == "id"){
                $this->db->like("TBL_HOSKO_USER.USER_ID", $whereArr["search_text"]);
            }
        }else if(isset($whereArr["search_option"]) && $whereArr["search_option"] == "all"){
			$this->db->group_start();
            $this->db->like("TBL_HOSKO_USER.USER_NAME", $whereArr["search_text"]);
            $this->db->or_like("TBL_HOSKO_USER.USER_ID", $whereArr["search_text"]);
			$this->db->group_end();
        }

		if(isset($whereArr["start_date"]) && $whereArr["start_date"] != ""){
            $this->db->where("TBL_HOSKO_USER_DOCUMENT.DOC_LAST_UPDATE_DATE >=", $whereArr["start_date"]." 00:00:00");
		}

		if(isset($whereArr["end_date"]) && $whereArr["end_date"] != ""){
            $this->db->where("TBL_HOSKO_USER_DOCUMENT.DOC_LAST_UPDATE_DATE <=", $whereArr["end_date"]." 23:59:59");
		}

		if(isset($whereArr["doc_status"]) && $whereArr["doc_status"] != ""){
			if($whereArr["doc_status"] == "3"){
				$this->db->where("TBL_HOSKO_USER_DOCUMENT.DOC_STATUS", NULL);
			}else{
				$this->db->where("TBL_HOSKO_USER_DOCUMENT.DOC_STATUS", $whereArr["doc_status"]);
			}
		}

		if(isset($whereArr["user_level"]) && $whereArr["user_level"] != ""){
			$this->db->like("TBL_HOSKO_USER.USER_LEVEL", $whereArr["user_level"]);
		}
        

        $this->db->where("TBL_HOSKO_USER.USER_DEL_YN", 'N');

        $this->db->join("TBL_HOSKO_USER_DOCUMENT", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_USER_DOCUMENT.USER_SEQ", "LEFT");

		$this->db->group_by("TBL_HOSKO_USER.USER_SEQ, TBL_HOSKO_USER_DOCUMENT.DOC_SEQ");
        $this->db->order_by("TBL_HOSKO_USER.USER_SEQ");
        $this->db->select("TBL_HOSKO_USER.*, TBL_HOSKO_USER_DOCUMENT.*");
        $this->db->limit($whereArr["limit"], $whereArr["start"]);
        return $this->db->get("TBL_HOSKO_USER")->result();
	}

	public function getUserWithDocumentCount($whereArr){
		if(isset($whereArr["search_option"]) && $whereArr["search_option"] != "all"){
            if($whereArr["search_option"] == "name"){
                $this->db->like("TBL_HOSKO_USER.USER_NAME", $whereArr["search_text"]);
            }else if($whereArr["search_option"] == "id"){
                $this->db->like("TBL_HOSKO_USER.USER_ID", $whereArr["search_text"]);
            }
        }else if(isset($whereArr["search_option"]) && $whereArr["search_option"] == "all"){
            $this->db->group_start();
            $this->db->like("TBL_HOSKO_USER.USER_NAME", $whereArr["search_text"]);
            $this->db->or_like("TBL_HOSKO_USER.USER_ID", $whereArr["search_text"]);
			$this->db->group_end();
        }

		if(isset($whereArr["start_date"]) && $whereArr["start_date"] != ""){
            $this->db->where("TBL_HOSKO_USER_DOCUMENT.DOC_LAST_UPDATE_DATE >=", $whereArr["start_date"]." 00:00:00");
		}

		if(isset($whereArr["end_date"]) && $whereArr["end_date"] != ""){
            $this->db->where("TBL_HOSKO_USER_DOCUMENT.DOC_LAST_UPDATE_DATE <=", $whereArr["end_date"]." 23:59:59");
		}

		if(isset($whereArr["doc_status"]) && $whereArr["doc_status"] != ""){
			if($whereArr["doc_status"] == "3"){
				$this->db->where("TBL_HOSKO_USER_DOCUMENT.DOC_STATUS", NULL);
			}else{
				$this->db->where("TBL_HOSKO_USER_DOCUMENT.DOC_STATUS", $whereArr["doc_status"]);
			}
		}

		if(isset($whereArr["user_level"]) && $whereArr["user_level"] != ""){
			$this->db->like("TBL_HOSKO_USER.USER_LEVEL", $whereArr["user_level"]);
		}

        $this->db->where("TBL_HOSKO_USER.USER_DEL_YN", 'N');

        $this->db->join("TBL_HOSKO_USER_DOCUMENT", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_USER_DOCUMENT.USER_SEQ", "LEFT");
	
		$this->db->select("TBL_HOSKO_USER.USER_SEQ");
		$this->db->distinct();
		$this->db->from("TBL_HOSKO_USER");
		return $this->db->count_All_results();
	}

	public function getUserWithDocumentCountAll(){
		$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", 'N');
        $this->db->join("TBL_HOSKO_USER_DOCUMENT", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_USER_DOCUMENT.USER_SEQ", "LEFT");
        $this->db->select("TBL_HOSKO_USER.USER_SEQ");
		$this->db->distinct();
		$this->db->from("TBL_HOSKO_USER");
		return $this->db->count_All_results();
    }

	


	public function getUserWithCertifiCate($whereArr){
		if(isset($whereArr["search_option"]) && $whereArr["search_option"] != "all"){
            if($whereArr["search_option"] == "name"){
                $this->db->like("TBL_HOSKO_USER.USER_NAME", $whereArr["search_text"]);
            }else if($whereArr["search_option"] == "id"){
                $this->db->like("TBL_HOSKO_USER.USER_ID", $whereArr["search_text"]);
            }
        }else if(isset($whereArr["search_option"]) && $whereArr["search_option"] == "all"){
            $this->db->like("TBL_HOSKO_USER.USER_NAME", $whereArr["search_text"]);
            $this->db->or_like("TBL_HOSKO_USER.USER_ID", $whereArr["search_text"]);
        }

		if(isset($whereArr["user_level"]) && $whereArr["user_level"] != ""){
			$this->db->like("TBL_HOSKO_USER.USER_LEVEL", $whereArr["user_level"]);
		}
        
        $this->db->where("TBL_HOSKO_USER.USER_DEL_YN", 'N');

        $this->db->join("TBL_HOSKO_USER_CERTIFICATE", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_USER_CERTIFICATE.USER_SEQ", "LEFT");

		$this->db->group_by("TBL_HOSKO_USER.USER_SEQ, TBL_HOSKO_USER_CERTIFICATE.CERT_SEQ");
        $this->db->order_by("TBL_HOSKO_USER.USER_SEQ");
        $this->db->select("TBL_HOSKO_USER.USER_SEQ AS USER_USER_SEQ, TBL_HOSKO_USER.*, TBL_HOSKO_USER_CERTIFICATE.USER_SEQ AS CERT_USER_SEQ, TBL_HOSKO_USER_CERTIFICATE.*");
        $this->db->limit($whereArr["limit"], $whereArr["start"]);
        return $this->db->get("TBL_HOSKO_USER")->result();
	}

	public function getUserWithCertificatetCount($whereArr){
		if(isset($whereArr["search_option"]) && $whereArr["search_option"] != "all"){
            if($whereArr["search_option"] == "name"){
                $this->db->like("TBL_HOSKO_USER.USER_NAME", $whereArr["search_text"]);
            }else if($whereArr["search_option"] == "id"){
                $this->db->like("TBL_HOSKO_USER.USER_ID", $whereArr["search_text"]);
            }
        }else if(isset($whereArr["search_option"]) && $whereArr["search_option"] == "all"){
            $this->db->like("TBL_HOSKO_USER.USER_NAME", $whereArr["search_text"]);
            $this->db->or_like("TBL_HOSKO_USER.USER_ID", $whereArr["search_text"]);
        }

		if(isset($whereArr["user_level"]) && $whereArr["user_level"] != ""){
			$this->db->like("TBL_HOSKO_USER.USER_LEVEL", $whereArr["user_level"]);
		}

        $this->db->where("TBL_HOSKO_USER.USER_DEL_YN", 'N');

        $this->db->join("TBL_HOSKO_USER_CERTIFICATE", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_USER_CERTIFICATE.USER_SEQ", "LEFT");
	
		$this->db->select("TBL_HOSKO_USER.USER_SEQ");
		$this->db->distinct();
		$this->db->from("TBL_HOSKO_USER");
		return $this->db->count_All_results();
	}

	public function getUserWithCertificateCountAll(){
		$this->db->where("TBL_HOSKO_USER.USER_DEL_YN", 'N');
        $this->db->join("TBL_HOSKO_USER_CERTIFICATE", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_USER_CERTIFICATE.USER_SEQ", "LEFT");
        $this->db->select("TBL_HOSKO_USER.USER_SEQ");
		$this->db->distinct();
		$this->db->from("TBL_HOSKO_USER");
		return $this->db->count_All_results();
    }
	public function updateUserCertificate($updateArr, $cert_seq){
		$this->db->where("TBL_HOSKO_USER_CERTIFICATE.CERT_SEQ", $cert_seq);
		return $this->db->update("TBL_HOSKO_USER_CERTIFICATE", $updateArr);
	}

	public function setLoginUpdate($user_seq){
		$this->db->where("TBL_HOSKO_USER.USER_SEQ", $user_seq);
		return $this->db->update("TBL_HOSKO_USER", array("USER_LAST_LOGIN"=>date("Y-m-d H:i:s"), "USER_LAST_LOGIN_IP"=>$_SERVER["REMOTE_ADDR"], "USER_LOGIN_CNT"=>(int)"TBL_HOSKO_USER.USER_LOGIN_CNT"+1));
	}

	public function userDelete($user_seq){
		$this->db->where("TBL_HOSKO_USER.USER_SEQ", $user_seq);
		return $this->db->update("TBL_HOSKO_USER", array("USER_DEL_YN" => "Y"));
	}
}
