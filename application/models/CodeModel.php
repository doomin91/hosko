<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CodeModel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getRegionCode(){
        $this->db->where("TBL_REGION_CODE.DEL_YN", "N");
        $this->db->order_by("TBL_REGION_CODE.REGION_NAME", "ASC");
        return $this->db->get("TBL_REGION_CODE")->result();
    }

    public function AdminLogin($admin_id, $admin_pw){
        $this->db->where("TBL_WITH_ADMIN.ADMIN_ID", $admin_id);
        $this->db->where("TBL_WITH_ADMIN.ADMIN_PASS", md5($admin_pw));
        return $this->db->get("TBL_WITH_ADMIN")->row();
    }

    public function attachDel($seq, $part){
        if ($part == "notice"){
            $this->db->where("TBL_WITH_NOTICE.SEQ", $seq);
            return $this->db->update("TBL_WITH_NOTICE", array("NOTICE_FILE_NAME" => "", "NOTICE_FILE_PATH" => ""));
        }else if ($part == "press"){
            $this->db->where("TBL_WITH_PRESS.SEQ", $seq);
            return $this->db->update("TBL_WITH_PRESS", array("PRESS_THUMBNAIL" => ""));
        }else if ($part == "award"){
            $this->db->where("TBL_WITH_AWARD.SEQ", $seq);
            return $this->db->update("TBL_WITH_AWARD", array("AWARD_IMAGE" => ""));
        }else if ($part == "brochure"){
            $this->db->where("TBL_WITH_BROCHURE.SEQ", $seq);
            return $this->db->update("TBL_WITH_BROCHURE", array("BROCHURE_FILE_NAME" => "", "BROCHURE_FILE_PATH" => ""));  
        }else if ($part == "manual"){
            $this->db->where("TBL_WITH_MANUAL.SEQ", $seq);
            return $this->db->update("TBL_WITH_MANUAL", array("MANUAL_FILE_NAME" => "", "MANUAL_FILE_PATH" => ""));
        }else if ($part == "update"){
            $this->db->where("TBL_WITH_UPDATE.SEQ", $seq);
            return $this->db->update("TBL_WITH_UPDATE", array("UPDATE_FILE_NAME" => "", "UPDATE_FILE_PATH" => "")); 
        }else if ($part == "gift"){
            $this->db->where("TBL_WITH_PROMOTION_GIFT.SEQ", $seq);
            return $this->db->update("TBL_WITH_PROMOTION_GIFT", array("GIFT_FILE_NAME" => "")); 
        }else if ($part == "gift_del_with_button"){
            $this->db->where("TBL_WITH_PROMOTION_GIFT.SEQ", $seq);
            return $this->db->update("TBL_WITH_PROMOTION_GIFT", array("GIFT_DEL_YN" => "Y"));
        }else if ($part == "question_del_with_button"){
            $this->db->where("TBL_WITH_PROMOTION_QUESTION.SEQ", $seq);
            return $this->db->update("TBL_WITH_PROMOTION_QUESTION", array("QUESTION_DEL_YN" => "Y"));
        }
    }

}