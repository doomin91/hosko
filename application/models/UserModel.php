<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserModel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getUsers($whereArr){
        $this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
        $this->db->order_by("TBL_HOSKO_USER.USER_SEQ", "DESC");
        $this->db->limit($whereArr["limit"], $whereArr["start"]);
        return $this->db->get("TBL_HOSKO_USER")->result();
        //return "";
    }

    public function getUsersCount($whereArr){
        $this->db->where("TBL_HOSKO_USER.USER_DEL_YN", "N");
        $this->db->from("TBL_HOSKO_USER");
        return $this->db->count_all_results();
    }

    public function getUserInfo($user_seq){
        $this->db->where("TBL_HOSKO_USER.USER_SEQ", $user_seq);
        return $this->db->get("TBL_HOSKO_USER")->row();
    }
}
