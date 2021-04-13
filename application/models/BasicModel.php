<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BasicModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function getManager($whereArr){
		$this->db->where("TBL_HOSKO_ADMIN.ADMIN_DEL_YN", "N");
		$this->db->select("TBL_HOSKO_ADMIN.*");
		$this->db->order_by("TBL_HOSKO_ADMIN.ADMIN_SEQ", "DESC");
		$this->db->limit($whereArr["limit"], $whereArr["start"]);
		return $this->db->get("TBL_HOSKO_ADMIN")->result();
	}

	public function getManagerCount($whereArr){
		$this->db->where("TBL_HOSKO_ADMIN.ADMIN_DEL_YN", "N");
		$this->db->select("TBL_HOSKO_ADMIN.*");
		$this->db->from("TBL_HOSKO_ADMIN");
		return $this->db->count_all_results();
	}

	public function getManagerInfo($admin_seq){
		$this->db->where("TBL_HOSKO_ADMIN.ADMIN_SEQ", $admin_seq);
		return $this->db->get("TBL_HOSKO_ADMIN")->row();
	}

	public function updateManager($whereArr, $admin_seq){
		$this->db->where("TBL_HOSKO_ADMIN.ADMIN_SEQ", $admin_seq);
		return $this->db->update("TBL_HOSKO_ADMIN", $whereArr);
	}

	public function insertManager($insertArr){
		return $this->db->insert("TBL_HOSKO_ADMIN", $insertArr);
	}

	public function getManagerById($admin_id){
		$this->db->where("TBL_HOSKO_ADMIN.ADMIN_ID", $admin_id);
		return $this->db->get("TBL_HOSKO_ADMIN")->row();
	}

	public function deleteManager($admin_seq){
		$this->db->where("TBL_HOSKO_ADMIN.ADMIN_SEQ", $admin_seq);
		return $this->db->update("TBL_HOSKO_ADMIN", array("ADMIN_DEL_YN" => "Y"));
	}

	public function getSiteInfo(){
		$this->db->where("TBL_HOSKO_SITE_INFO.SITE_SEQ", "1");
		return $this->db->get("TBL_HOSKO_SITE_INFO")->row();
	}

	public function insertDomain($insertArr){
		return $this->db->insert("TBL_HOSKO_DOMAIN_INFO", $insertArr);
	}

	public function getDomainInfoList(){
		$this->db->where("TBL_HOSKO_DOMAIN_INFO.DOMAIN_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_DOMAIN_INFO.DOMAIN_SEQ", "ASC");
		return $this->db->get("TBL_HOSKO_DOMAIN_INFO")->result();
	}

	public function updateDomain($updateArr, $domain_seq){
		$this->db->where("TBL_HOSKO_DOMAIN_INFO.DOMAIN_SEQ", $domain_seq);
		return $this->db->update("TBL_HOSKO_DOMAIN_INFO", $updateArr);
	}

	public function deleteDomain($domain_seq){
		$this->db->where("TBL_HOSKO_DOMAIN_INFO.DOMAIN_SEQ", $domain_seq);
		return $this->db->update("TBL_HOSKO_DOMAIN_INFO", array("DOMAIN_DEL_YN" => "Y"));
	}

	public function insertEmail($insertArr){
		return $this->db->insert("TBL_HOSKO_EMAIL_INFO", $insertArr);
	}

	public function updateEmail($updateArr, $email_seq){
		$this->db->where("TBL_HOSKO_EMAIL_INFO.EMAIL_SEQ", $email_seq);
		return $this->db->update("TBL_HOSKO_EMAIL_INFO", $updateArr);
	}

	public function getEmailInfoList(){
		$this->db->where("TBL_HOSKO_EMAIL_INFO.EMAIL_DEL_YN", "N");
		$this->db->order_by("TBL_HOSKO_EMAIL_INFO.EMAIL_SEQ", "ASC");
		return $this->db->get("TBL_HOSKO_EMAIL_INFO")->result();
	}

	public function setSiteInfo($updateArr){
		$this->db->where("TBL_HOSKO_SITE_INFO.SITE_SEQ", "1");
		return $this->db->update("TBL_HOSKO_SITE_INFO", $updateArr);
	}
}
