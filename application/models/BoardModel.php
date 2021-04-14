<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BoardModel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getBoard($BOARD_SEQ){
        $this->db->where("BOARD_SEQ", $BOARD_SEQ);
        return $this->db->get("TBL_HOSKO_BOARD")->row();
    }
    public function getBoards(){
        $this->db->where("BOARD_DEL_YN", 'Y');
        $this->db->join("TBL_HOSKO_BOARD_GROUP", "TBL_HOSKO_BOARD_GROUP.GP_SEQ = TBL_HOSKO_BOARD.BOARD_GROUP");
        return $this->db->get("TBL_HOSKO_BOARD")->result();
    }

    public function checkBoardName($BOARD_NAME){
        $this->db->where("BOARD_NAME", $BOARD_NAME);
        return $this->db->get("TBL_HOSKO_BOARD")->row();;
    }

    public function checkBoardKorName($BOARD_KOR_NAME){
        $this->db->where("BOARD_KOR_NAME", $BOARD_KOR_NAME);
        return $this->db->get("TBL_HOSKO_BOARD")->row();;
    }

    public function writeBoard($DATA){
        return $this->db->insert("TBL_HOSKO_BOARD", $DATA);
    }

    public function delBoard($BOARD_SEQ){
        $this->db->where("BOARD_SEQ", $BOARD_SEQ);
        return $this->db->update("TBL_HOSKO_BOARD", array("BOARD_DEL_YN" => 'N'));
    }

    public function getPosts($BOARD_SEQ, $wheresql){
        $this->db->select("TBL_HOSKO_BOARD_POSTS.*, USER.USER_NAME, count(RECOMMAND.RMD_SEQ) AS CNT");

        if ((isset($whereArr["reg_date_start"])) && ($whereArr["reg_date_start"] != "")){
			$this->db->where("TBL_HOSKO_BOARD_POSTS.POST_REG_DATE >=", $whereArr["reg_date_start"]);
		}

		if ((isset($whereArr["reg_date_end"])) && ($whereArr["reg_date_end"] != "")){
			$this->db->where("TBL_HOSKO_BOARD_POSTS.POST_REG_DATE <=", $whereArr["reg_date_start"]);
		}

        if((isset($wheresql['searchField'])) && $wheresql['searchField'] == "SUBJECT"){
            $this->db->LIKE("TBL_HOSKO_BOARD_POSTS.POST_SUBJECT", $wheresql['searchString']);
        }

        if((isset($wheresql['searchField'])) && $wheresql['searchField'] == "CONTENTS"){
            $this->db->LIKE("TBL_HOSKO_BOARD_POSTS.POST_CONTENTS", $wheresql['searchString']);
        }

        if((isset($wheresql['searchField'])) && $wheresql['searchField'] == "USER_NAME"){
            $this->db->LIKE("USER.USER_NAME", $wheresql['searchString']);
        }

        if((isset($wheresql['searchField'])) && $wheresql['searchField'] == "ALL"){
            $this->db->LIKE("TBL_HOSKO_BOARD_POSTS.POST_SUBJECT", $wheresql['searchString']);
            $this->db->OR_LIKE("USER.USER_NAME", $wheresql['searchString']);
        }

        $this->db->where("TBL_HOSKO_BOARD_POSTS.POST_BOARD_SEQ", $BOARD_SEQ);
        $this->db->join("TBL_HOSKO_USER AS USER", "USER.USER_SEQ = POST_USER_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_USER AS ADMIN", "USER.USER_SEQ = POST_ADMIN_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD_RECOMMAND AS RECOMMAND", "RMD_POST_SEQ = POST_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD", "BOARD_SEQ = POST_BOARD_SEQ");
        $this->db->order_by("POST_NOTICE_YN", "DESC");
        $this->db->order_by("POST_REG_DATE", "DESC");
        $this->db->group_by("POST_SEQ");
        $this->db->limit($wheresql["limit"], $wheresql["start"]);
        return $this->db->get("TBL_HOSKO_BOARD_POSTS")->result();
    }

    public function getPostsCnt($BOARD_SEQ, $wheresql){
        $this->db->select("TBL_HOSKO_BOARD_POSTS.*, count(RECOMMAND.RMD_SEQ) AS CNT");
        $this->db->where("POST_BOARD_SEQ", $BOARD_SEQ);

            if($wheresql['searchField'] == "SUBJECT"){
                $this->db->LIKE("POST_SUBJECT", $wheresql['searchString']);
            // } else if($wheresql['searchField'] == "USER_NAME") {
                // $this->db->LIKE("USER_NAME", $wheresql['searchString']);
            } else if($wheresql['searchField'] == "CONTENTS") {
                $this->db->LIKE("POST_CONTENTS", $wheresql['searchString']);
            } else {
                $this->db->LIKE("POST_SUBJECT", $wheresql['searchString']);
                // $this->db->OR_LIKE("USER_NAME", $wheresql['searchString']);
            }

        // $this->db->join("TBL_HOSKO_USER AS USER", "USER.USER_SEQ = POST_USER_SEQ", "LEFT");
        // $this->db->join("TBL_HOSKO_USER AS ADMIN", "USER.USER_SEQ = POST_ADMIN_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD_RECOMMAND AS RECOMMAND", "RMD_POST_SEQ = POST_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD", "BOARD_SEQ = POST_BOARD_SEQ");
        $this->db->order_by("POST_NOTICE_YN", "DESC");
        $this->db->order_by("POST_REG_DATE", "DESC");
        $this->db->group_by("POST_SEQ");
        return $this->db->get("TBL_HOSKO_BOARD_POSTS")->num_rows();
    }

    public function setPost($DATA){
        return $this->db->insert("TBL_HOSKO_BOARD_POSTS", $DATA);
    }

    public function uptPost($POST_SEQ, $DATA){
        $this->db->where("POST_SEQ", $POST_SEQ);
        return $this->db->update("TBL_HOSKO_BOARD_POSTS", $DATA);
    }

    public function insertPostAttach($DATA){
        return $this->db->insert("TBL_HOSKO_BOARD_ATTACH", $DATA);
    }

    public function getBoardSeqByPost($POST_SEQ){
        $this->db->select("TBL_HOSKO_BOARD_POSTS.*, USER.*");
        $this->db->where("POST_SEQ", $POST_SEQ);
        $this->db->join("TBL_HOSKO_USER AS USER", "USER.USER_SEQ = POST_USER_SEQ", "LEFT");
        return $this->db->get("TBL_HOSKO_BOARD_POSTS")->row();
    }

    public function addPostViewCnt($POST_SEQ, $DATA){
        $this->db->where("POST_SEQ", $POST_SEQ);
        return $this->db->update("TBL_HOSKO_BOARD_POSTS", $DATA);
    }

    public function getPostRecommand($USER_SEQ, $POST_SEQ){
        $this->db->where("RMD_USER_SEQ", $USER_SEQ);
        $this->db->where("RMD_POST_SEQ", $POST_SEQ);
        return $this->db->get("TBL_HOSKO_BOARD_RECOMMAND")->row();
    }

    public function setPostRecommand($DATA){
        return $this->db->insert("TBL_HOSKO_BOARD_RECOMMAND", $DATA);
    }

    public function delPostRecommand($RMD_SEQ){
        $this->db->where("RMD_SEQ", $RMD_SEQ);
        return $this->db->delete("TBL_HOSKO_BOARD_RECOMMAND");
    }

    public function getComments($POST_SEQ){
        $this->db->where("COM_POST_SEQ", $POST_SEQ);
        $this->db->join("TBL_HOSKO_USER", "COM_USER_SEQ = USER_SEQ", "LEFT");
        return $this->db->get("TBL_HOSKO_BOARD_COMMENT")->result();
    }

    public function getRecommand($POST_SEQ){
        $this->db->where("RMD_POST_SEQ", $POST_SEQ);
        return $this->db->get("TBL_HOSKO_BOARD_RECOMMAND")->num_rows();
    }

    public function setComment($DATA){
        return $this->db->insert("TBL_HOSKO_BOARD_COMMENT", $DATA);
    }

    public function getGroups(){
        return $this->db->get("TBL_HOSKO_BOARD_GROUP")->result();
    }

}
