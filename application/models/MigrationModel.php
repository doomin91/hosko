<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MigrationModel extends CI_Model{
    function __construct(){
        parent::__construct();
        //$this->load->database();
        $this->db = $this->load->database("default", true);
        $this->db2 = $this->load->database("db2", true);
    }

    public function getMemberBakup($whereArr){
        //$this->db2->join("bbs_member_memo", "bbs_member.id = bbs_member_memo.userid", "left outer");
        //$this->db2->select("bbs_member.*, bbs_member_memo.comment");
        $this->db2->order_by("num", "ASC");
        $this->db2->limit($whereArr["limit"], $whereArr["start"]);
        return $this->db2->get("bbs_member")->result();
    }

    public function getcomment($userid){
        $this->db2->where("userid", $userid);
        return $this->db2->get("bbs_member_memo")->row();
    }

    public function setMember($whereArr){
        return $this->db->insert("TBL_HOSKO_USER", $whereArr);
    }

    public function checkId($user_id){
        $this->db->where("USER_ID", $user_id);
        return $this->db->get("TBL_HOSKO_USER")->row();
    }

    public function updateMember($updateArr, $userid){
        $this->db->where("USER_ID", $userid);
        return $this->db->update("TBL_HOSKO_USER", $updateArr);
    }
}
