<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GroupModel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getGroupList(){
        $this->db->where("GP_DEL_YN", "N");
        return $this->db->get("TBL_HOSKO_BOARD_GROUP")->result();
    }

    public function setGroup($DATA){
        return $this->db->insert("TBL_HOSKO_BOARD_GROUP", $DATA);
    }

    public function uptGroup($GP_SEQ, $DATA){
        $this->db->where("GP_SEQ", $GP_SEQ);
        return $this->db->update("TBL_HOSKO_BOARD_GROUP", $DATA);
    }

    public function delGroup($GP_SEQ){
        $this->db->where("GP_SEQ", $GP_SEQ);
        return $this->db->update("TBL_HOSKO_BOARD_GROUP", array("GP_DEL_YN" => "Y"));
    }

    public function getGroup($GP_SEQ){
        $this->db->where("GP_SEQ", $GP_SEQ);
        return $this->db->get("TBL_HOSKO_BOARD_GROUP")->row();
    }

    public function checkGroupName($GP_NAME){
        $this->db->where("GP_DEL_YN", "N");
        $this->db->where("GP_NAME", $GP_NAME);
        return $this->db->get("TBL_HOSKO_BOARD_GROUP")->row();
    }
}

