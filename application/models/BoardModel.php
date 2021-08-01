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
        $this->db->where("BOARD_DEL_YN", 'N');
        $this->db->join("TBL_HOSKO_BOARD_GROUP", "TBL_HOSKO_BOARD_GROUP.GP_SEQ = TBL_HOSKO_BOARD.BOARD_GROUP", "LEFT");
        return $this->db->get("TBL_HOSKO_BOARD")->result();
    }

    public function getBoardInGroup($GROUP_SEQ){
        $this->db->where("BOARD_DEL_YN", 'N');
        $this->db->where("BOARD_GROUP", $GROUP_SEQ);
        return $this->db->get("TBL_HOSKO_BOARD")->result();
    }

    public function getFrontBoardBottom($POST_SEQ, $BOARD_SEQ){
            $sql = "
                SELECT * FROM 
                (
                    (
                    SELECT *, \"NEXT\" AS TYPE FROM TBL_HOSKO_BOARD_POSTS
                    WHERE POST_BOARD_SEQ = " . $BOARD_SEQ . " AND POST_SEQ > " . $POST_SEQ . "
                    AND POST_DEL_YN = 'N'
                    ORDER BY POST_NOTICE_YN DESC, POST_PARENT_SEQ DESC, POST_DEPTH, POST_SEQ
                    LIMIT 5
                    ) 
                    UNION ALL
                    (
                    SELECT *, \"NOW\" AS TYPE FROM TBL_HOSKO_BOARD_POSTS
                    WHERE POST_BOARD_SEQ = " . $BOARD_SEQ . " AND POST_SEQ = " . $POST_SEQ . "
                    AND POST_DEL_YN = 'N'
                    ORDER BY POST_NOTICE_YN DESC, POST_PARENT_SEQ DESC, POST_DEPTH, POST_SEQ
                    )
                    UNION ALL
                    (
                    SELECT *, \"PREV\" AS TYPE FROM TBL_HOSKO_BOARD_POSTS
                    WHERE POST_BOARD_SEQ = " . $BOARD_SEQ . " AND POST_SEQ < " . $POST_SEQ . "
                    AND POST_DEL_YN = 'N'
                    ORDER BY POST_NOTICE_YN DESC, POST_PARENT_SEQ DESC, POST_DEPTH, POST_SEQ
                    LIMIT 5
                    )
                ) result
                
                LEFT JOIN TBL_HOSKO_USER ON POST_USER_SEQ = USER_SEQ
                LEFT JOIN TBL_HOSKO_ADMIN ON POST_ADMIN_SEQ = ADMIN_SEQ
                
                ";

        return $this->db->query($sql)->result();
    }


    // public function getFrontBoardBottom($POST_SEQ, $BOARD_SEQ){
    //     $sql = " SELECT * FROM (
    //     SELECT *, \"NEXT\" AS TYPE FROM TBL_HOSKO_BOARD_POSTS WHERE POST_BOARD_SEQ = $BOARD_SEQ AND POST_SEQ = ( SELECT MIN(POST_SEQ) FROM TBL_HOSKO_BOARD_POSTS WHERE POST_SEQ > $POST_SEQ ) 
    //     UNION ALL
    //     SELECT *, \"PREV\" AS TYPE FROM TBL_HOSKO_BOARD_POSTS WHERE POST_BOARD_SEQ = $BOARD_SEQ AND POST_SEQ = ( SELECT MAX(POST_SEQ) FROM TBL_HOSKO_BOARD_POSTS WHERE POST_SEQ < $POST_SEQ ) 
    //     ) result
    //     LEFT JOIN TBL_HOSKO_USER ON POST_USER_SEQ = USER_SEQ
    //     LEFT JOIN TBL_HOSKO_ADMIN ON POST_ADMIN_SEQ = ADMIN_SEQ
    //     ";

    //     return $this->db->query($sql)->result();
    // }

    public function getBoardBottom($POST_SEQ, $BOARD_SEQ){
        $sql = "
        SELECT * FROM 
        (
            (
            SELECT * FROM TBL_HOSKO_BOARD_POSTS
            WHERE POST_BOARD_SEQ = " . $BOARD_SEQ . " AND POST_SEQ > " . $POST_SEQ . "
            ORDER BY POST_SEQ DESC
            LIMIT 5
            ) 
            UNION ALL
            (
            SELECT * FROM TBL_HOSKO_BOARD_POSTS
            WHERE POST_BOARD_SEQ = " . $BOARD_SEQ . " AND POST_SEQ = " . $POST_SEQ . "
            )
            UNION ALL
            (
            SELECT * FROM TBL_HOSKO_BOARD_POSTS
            WHERE POST_BOARD_SEQ = " . $BOARD_SEQ . " AND POST_SEQ < " . $POST_SEQ . "
            ORDER BY POST_SEQ DESC
            LIMIT 5
            )
        ) result
        LEFT JOIN TBL_HOSKO_USER ON POST_USER_SEQ = USER_SEQ
        LEFT JOIN TBL_HOSKO_ADMIN ON POST_ADMIN_SEQ = ADMIN_SEQ
        ";

        return $this->db->query($sql)->result();
    }
    
    public function getBoardBottomCnt($POST_SEQ, $BOARD_SEQ){
        $sql = "
        SELECT * FROM 
        (
            (
            SELECT * FROM TBL_HOSKO_BOARD_POSTS
            WHERE POST_BOARD_SEQ = " . $BOARD_SEQ . " AND POST_SEQ > " . $POST_SEQ . "
            LIMIT 5
            )
            UNION ALL
            (
            SELECT * FROM TBL_HOSKO_BOARD_POSTS
            WHERE POST_BOARD_SEQ = " . $BOARD_SEQ . " AND POST_SEQ = " . $POST_SEQ . "
            )
            UNION ALL
            (
            SELECT * FROM TBL_HOSKO_BOARD_POSTS
            WHERE POST_BOARD_SEQ = " . $BOARD_SEQ . " AND POST_SEQ < " . $POST_SEQ . "
            LIMIT 5
            )
        ) result
        LEFT JOIN TBL_HOSKO_USER ON POST_USER_SEQ = USER_SEQ
        LEFT JOIN TBL_HOSKO_ADMIN ON POST_ADMIN_SEQ = ADMIN_SEQ
        
        ";

        return $this->db->query($sql)->num_rows();
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

    public function modifyBoard($BOARD_SEQ, $DATA){
        $this->db->where("BOARD_SEQ", $BOARD_SEQ);
        return $this->db->update("TBL_HOSKO_BOARD", $DATA);
    }

    public function delBoard($BOARD_SEQ){
        $this->db->where("BOARD_SEQ", $BOARD_SEQ);
        return $this->db->update("TBL_HOSKO_BOARD", array("BOARD_DEL_YN" => 'N'));
    }

    public function getPost($POST_SEQ){
        // $this->db->where("POST_DEL_YN", "N");
        $this->db->where("POST_SEQ", $POST_SEQ);
        $this->db->join("TBL_HOSKO_BOARD", "BOARD_SEQ = POST_BOARD_SEQ");
        $this->db->join("TBL_HOSKO_USER AS USER", "USER.USER_SEQ = POST_USER_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_ADMIN AS ADMIN", "USER.USER_SEQ = POST_ADMIN_SEQ", "LEFT");
        return $this->db->get("TBL_HOSKO_BOARD_POSTS")->row();
    }

    public function getPosts($BOARD_SEQ, $wheresql){
        $this->db->select("TBL_HOSKO_BOARD_POSTS.*, USER.USER_NAME, count(RECOMMAND.RMD_SEQ) AS CNT, count(COMMENTS.COM_SEQ) AS COMMENTS, count(ATTACH.ATTACH_SEQ) AS ATTACHS");
        // $this->db->where("POST_DEL_YN", "N");

        if ((isset($wheresql["reg_date_start"])) && ($wheresql["reg_date_start"] != "")){
			$this->db->where("DATE(TBL_HOSKO_BOARD_POSTS.POST_REG_DATE) >=", $wheresql["reg_date_start"]);
		}

		if ((isset($wheresql["reg_date_end"])) && ($wheresql["reg_date_end"] != "")){
			$this->db->where("DATE(TBL_HOSKO_BOARD_POSTS.POST_REG_DATE) <=", $wheresql["reg_date_end"]);
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

        if((isset($wheresql['searchField'])) && $wheresql['searchField'] == "all"){
            $this->db->group_start();
            $this->db->LIKE("USER.USER_NAME", $wheresql['searchString']);
            $this->db->OR_LIKE("TBL_HOSKO_BOARD_POSTS.POST_CONTENTS", $wheresql['searchString']);
            $this->db->OR_LIKE("TBL_HOSKO_BOARD_POSTS.POST_SUBJECT", $wheresql['searchString']);
            $this->db->group_end();
        }

        $this->db->where("TBL_HOSKO_BOARD_POSTS.POST_BOARD_SEQ", $BOARD_SEQ);
        $this->db->join("TBL_HOSKO_USER AS USER", "USER.USER_SEQ = POST_USER_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_USER AS ADMIN", "USER.USER_SEQ = POST_ADMIN_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD_RECOMMAND AS RECOMMAND", "RMD_POST_SEQ = POST_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD_COMMENT AS COMMENTS", "COM_POST_SEQ = POST_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD", "BOARD_SEQ = POST_BOARD_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD_ATTACH ATTACH", "ATTACH_POST_SEQ = POST_SEQ", "LEFT");
        $this->db->order_by("POST_NOTICE_YN", "DESC");
        $this->db->order_by("POST_PARENT_SEQ", "DESC");
        $this->db->order_by("POST_DEPTH");
        $this->db->group_by("POST_SEQ");
        $this->db->limit($wheresql["limit"], $wheresql["start"]);

        return $this->db->get("TBL_HOSKO_BOARD_POSTS")->result();
    }

    public function getPostsCnt($BOARD_SEQ, $wheresql){
        $this->db->select("TBL_HOSKO_BOARD_POSTS.*");
        // $this->db->where("POST_DEL_YN", "N");

        if ((isset($wheresql["reg_date_start"])) && ($wheresql["reg_date_start"] != "")){
			$this->db->where("DATE(TBL_HOSKO_BOARD_POSTS.POST_REG_DATE) >=", $wheresql["reg_date_start"]);
		}

		if ((isset($wheresql["reg_date_end"])) && ($wheresql["reg_date_end"] != "")){
			$this->db->where("DATE(TBL_HOSKO_BOARD_POSTS.POST_REG_DATE) <=", $wheresql["reg_date_end"]);
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

        if((isset($wheresql['searchField'])) && $wheresql['searchField'] == "all"){
            $this->db->group_start();
            $this->db->LIKE("USER.USER_NAME", $wheresql['searchString']);
            $this->db->OR_LIKE("TBL_HOSKO_BOARD_POSTS.POST_CONTENTS", $wheresql['searchString']);
            $this->db->OR_LIKE("TBL_HOSKO_BOARD_POSTS.POST_SUBJECT", $wheresql['searchString']);
            $this->db->group_end();
        }


        $this->db->where("TBL_HOSKO_BOARD_POSTS.POST_BOARD_SEQ", $BOARD_SEQ);
        $this->db->join("TBL_HOSKO_USER AS USER", "USER.USER_SEQ = POST_USER_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_USER AS ADMIN", "USER.USER_SEQ = POST_ADMIN_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD_RECOMMAND AS RECOMMAND", "RMD_POST_SEQ = POST_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD_COMMENT AS COMMENTS", "COM_POST_SEQ = POST_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD", "BOARD_SEQ = POST_BOARD_SEQ", "LEFT");
        $this->db->join("TBL_HOSKO_BOARD_ATTACH ATTACH", "ATTACH_POST_SEQ = POST_SEQ", "LEFT");
        $this->db->order_by("POST_NOTICE_YN", "DESC");
        $this->db->order_by("POST_SEQ", "DESC");
        $this->db->group_by("POST_SEQ");

        return $this->db->get("TBL_HOSKO_BOARD_POSTS")->num_rows();
    }

    public function getPostInfo($POST_SEQ){
        $this->db->where("POST_SEQ", $POST_SEQ);
        $this->db->join("TBL_HOSKO_BOARD", "BOARD_SEQ = POST_BOARD_SEQ");
        $this->db->join("TBL_HOSKO_BOARD_GROUP", "GP_SEQ = BOARD_GROUP");
        return $this->db->get("TBL_HOSKO_BOARD_POSTS")->row();
    }

    public function setPost($DATA){
        $this->db->insert("TBL_HOSKO_BOARD_POSTS", $DATA);
        return $this->db->insert_id();
    }

    public function uptPost($POST_SEQ, $DATA){
        $this->db->where("POST_SEQ", $POST_SEQ);
        return $this->db->update("TBL_HOSKO_BOARD_POSTS", $DATA);
    }

    public function initPostParentSeq($POST_SEQ){
        $this->db->where("POST_SEQ", $POST_SEQ);
        return $this->db->update("TBL_HOSKO_BOARD_POSTS", array("POST_PARENT_SEQ" => $POST_SEQ, 
                                                                "POST_GROUP_SEQ" => $POST_SEQ ));
    }

    public function delPost($POST_SEQ){
        $this->db->where("POST_SEQ", $POST_SEQ);
        return $this->db->update("TBL_HOSKO_BOARD_POSTS", ARRAY("POST_DEL_YN" => "Y"));
    }

    public function getPostAttach($POST_SEQ){
        $this->db->where("ATTACH_POST_SEQ", $POST_SEQ);
        return $this->db->get("TBL_HOSKO_BOARD_ATTACH")->result();
    }

    public function getPostAttachByAttachSeq($ATTACH_SEQ){
        $this->db->where("ATTACH_SEQ", $ATTACH_SEQ);
        return $this->db->get("TBL_HOSKO_BOARD_ATTACH")->row();
    }

    public function insertPostAttach($DATA){
        return $this->db->insert("TBL_HOSKO_BOARD_ATTACH", $DATA);
    }

    public function deletePostAttach($FILE_SEQ){
        $this->db->where("ATTACH_SEQ", $FILE_SEQ);
        return $this->db->delete("TBL_HOSKO_BOARD_ATTACH");
    }

    public function updatePostAttach($FILE_SEQ, $DATA){
        $this->db->where("ATTACH_SEQ", $FILE_SEQ);
        return $this->db->update("TBL_HOSKO_BOARD_ATTACH", $DATA);
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

    public function delComment($SEQ){
        $this->db->where("COM_SEQ", $SEQ);
        return $this->db->delete("TBL_HOSKO_BOARD_COMMENT");
    }

    public function getNews(){
        $this->db->where("POST_DEL_YN", 'N');
        $this->db->where("POST_BOARD_SEQ = 1");
        $this->db->join("TBL_HOSKO_BOARD", "POST_BOARD_SEQ = BOARD_SEQ");
        $this->db->order_by("POST_REG_DATE", "DESC");
        $this->db->limit(2);
        return $this->db->get("TBL_HOSKO_BOARD_POSTS")->result();
    }

    public function getNotice(){
        $this->db->where("POST_DEL_YN", 'N');
        $this->db->where("POST_BOARD_SEQ = 3");
        $this->db->join("TBL_HOSKO_BOARD", "POST_BOARD_SEQ = BOARD_SEQ");
        $this->db->order_by("POST_REG_DATE", "DESC");
        $this->db->limit(2);
        return $this->db->get("TBL_HOSKO_BOARD_POSTS")->result();
    }

}
