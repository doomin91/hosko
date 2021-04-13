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
}
