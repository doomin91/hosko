<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecruitModel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getRecruitApplyList($whereArr){
        if (isset($whereArr["apply_status"]) && $whereArr["apply_status"] != 0){
            $this->db->where("TBL_HOSKO_RECRUIT_APPLY.APP_STATUS", $whereArr["apply_status"]);
        }
        if (isset($whereArr["apply_start_date"]) && $whereArr["apply_start_date"] != ""){
            $this->db->where("TBL_HOSKO_RECRUIT.REC_PERIOD_START", $whereArr["apply_start_date"]);
        }
        if (isset($whereArr["apply_end_date"]) && $whereArr["apply_end_date"] != ""){
            $this->db->where("TBL_HOSKO_RECRUIT.REC_PERIOD_END", $whereArr["apply_end_date"]);
        }
        if (isset($whereArr["apply_search_option"]) && $whereArr["apply_search_option"] != ""){
            if($whereArr["apply_search_option"] == "title"){
                $this->db->like("TBL_HOSKO_RECRUIT.REC_TITLE", $whereArr["apply_search_text"]);
            }else if($whereArr["apply_search_option"] == "name"){
                $this->db->like("TBL_HOSKO_USER.USER_NAME", $whereArr["apply_search_text"]);
            }else if($whereArr["apply_search_option"] == "id"){
                $this->db->like("TBL_HOSKO_USER.USER_ID", $whereArr["apply_search_text"]);
            }
        }

        $this->db->where("TBL_HOSKO_RECRUIT_APPLY.APP_DEL_YN", 'N');

        $this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_RECRUIT_APPLY.APP_USER_SEQ");
        $this->db->join("TBL_HOSKO_RECRUIT", "TBL_HOSKO_RECRUIT.REC_SEQ = TBL_HOSKO_RECRUIT_APPLY.APP_RECRUIT_SEQ");

        $this->db->group_by("TBL_HOSKO_RECRUIT_APPLY.APP_SEQ, TBL_HOSKO_USER.USER_ID, TBL_HOSKO_USER.USER_NAME, TBL_HOSKO_RECRUIT.REC_TITLE, TBL_HOSKO_RECRUIT.REC_PAY, TBL_HOSKO_RECRUIT.REC_STATUS");
        $this->db->order_by("TBL_HOSKO_RECRUIT_APPLY.APP_SEQ");
        $this->db->select("TBL_HOSKO_RECRUIT_APPLY.*, TBL_HOSKO_USER.USER_ID, TBL_HOSKO_USER.USER_NAME, TBL_HOSKO_RECRUIT.REC_TITLE, TBL_HOSKO_RECRUIT.REC_PAY, TBL_HOSKO_RECRUIT.REC_STATUS");
        $this->db->limit(20);
        return $this->db->get("TBL_HOSKO_RECRUIT_APPLY")->result();
    }

    public function getRecruitApplyListCount($whereArr){
        if (isset($whereArr["apply_status"]) && $whereArr["apply_status"] != ""){
            $this->db->where("TBL_HOSKO_RECRUIT_APPLY.APP_STATUS", $whereArr["apply_status"]);
        }
        if (isset($whereArr["apply_start_date"]) && $whereArr["apply_start_date"] != ""){
            $this->db->where("TBL_HOSKO_RECRUIT.REC_PERIOD_START", $whereArr["apply_start_date"]);
        }
        if (isset($whereArr["apply_end_date"]) && $whereArr["apply_end_date"] != ""){
            $this->db->where("TBL_HOSKO_RECRUIT.REC_PERIOD_END", $whereArr["apply_end_date"]);
        }
        if (isset($whereArr["apply_search_option"]) && $whereArr["apply_search_option"] != ""){
            if($whereArr["apply_search_option"] == "title"){
                $this->db->like("TBL_HOSKO_RECRUIT.REC_TITLE", $whereArr["apply_search_text"]);
            }else if($whereArr["apply_search_option"] == "name"){
                $this->db->like("TBL_HOSKO_USER.USER_NAME", $whereArr["apply_search_text"]);
            }else if($whereArr["apply_search_option"] == "id"){
                $this->db->like("TBL_HOSKO_USER.USER_ID", $whereArr["apply_search_text"]);
            }
        }

        $this->db->where("TBL_HOSKO_RECRUIT_APPLY.APP_DEL_YN", 'N');

        $this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_RECRUIT_APPLY.APP_USER_SEQ");
        $this->db->join("TBL_HOSKO_RECRUIT", "TBL_HOSKO_RECRUIT.REC_SEQ = TBL_HOSKO_RECRUIT_APPLY.APP_RECRUIT_SEQ");

        $this->db->select("TBL_HOSKO_RECRUIT_APPLY.APP_SEQ");
        $this->db->distinct();
        $this->db->from("TBL_HOSKO_RECRUIT_APPLY");
        return $this->db->count_All_results();
    }

    public function getRecruitApplyListCountAll(){
        $this->db->where("TBL_HOSKO_RECRUIT_APPLY.APP_DEL_YN", 'N');
        $this->db->from("TBL_HOSKO_RECRUIT_APPLY");
        return $this->db->count_All_results();
    }

    public function getRecruitApplyInfo($apply_seq){
        $this->db->where("TBL_HOSKO_RECRUIT_APPLY.APP_SEQ", $apply_seq);
        $this->db->join("TBL_HOSKO_RECRUIT", "TBL_HOSKO_RECRUIT.REC_SEQ = TBL_HOSKO_RECRUIT_APPLY.APP_RECRUIT_SEQ");
        $this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_RECRUIT_APPLY.APP_USER_SEQ");

        $this->db->select("TBL_HOSKO_RECRUIT_APPLY.*, TBL_HOSKO_RECRUIT.*, TBL_HOSKO_USER.*");

        return $this->db->get("TBL_HOSKO_RECRUIT_APPLY")->row();   
    }

    public function updateRecruitApply($apply_seq, $whereArr){
        $this->db->where("TBL_HOSKO_RECRUIT_APPLY.APP_SEQ", $apply_seq);

        return $this->db->update("TBL_HOSKO_RECRUIT_APPLY", $whereArr);
    }

    public function deleteRecruitApplies($apply_seqs){
        $this->db->where_in("TBL_HOSKO_RECRUIT_APPLY.APP_SEQ", $apply_seqs);

        return $this->db->update("TBL_HOSKO_RECRUIT_APPLY", array("APP_DEL_YN" => "Y"));
    }

    public function getRecruitAbroadList($whereArr){
        if (isset($whereArr["ctg"]) && $whereArr["ctg"] != ""){
            $this->db->where("TBL_HOSKO_RECRUIT.REC_CONTENTS_CATEGORY", $whereArr["ctg"]);
        }
        if (isset($whereArr["ctg2"]) && $whereArr["ctg2"] != ""){
            $this->db->where("TBL_HOSKO_RECRUIT.REC_CONTENTS_SUB1_CATEGORY", $whereArr["ctg2"]);
        }
        if (isset($whereArr["ctg3"]) && $whereArr["ctg3"] != ""){
            $this->db->where("TBL_HOSKO_RECRUIT.REC_CONTENTS_SUB2_CATEGORY", $whereArr["ctg3"]);
        }
        if (isset($whereArr["searchOpt"]) && $whereArr["searchOpt"] != ""){
            if($whereArr["searchOpt"] == "name"){
                $this->db->like("TBL_HOSKO_RECRUIT.REC_TITLE", $whereArr["searchTxt"]);
            }else if($whereArr["searchOpt"] == "code"){
                $this->db->like("TBL_HOSKO_RECRUIT.REC_SEQ", $whereArr["searchTxt"]);
            }else if($whereArr["searchOpt"] == "comapny"){
                $this->db->like("TBL_HOSKO_RECRUIT.REC_COUNTRY", $whereArr["searchTxt"]);
            }
        }
        // if (isset($whereArr["searchGrp"]) && $whereArr["searchGrp"] != ""){
        //     $this->db->where("TBL_HOSKO_RECRUIT.REC_CONTENTS_CATEGORY", $whereArr["searchGrp"]);
        // }
        // if (isset($whereArr["coupon"]) && $whereArr["coupon"] != ""){
        //     $this->db->where("TBL_HOSKO_RECRUIT.REC_CONTENTS_CATEGORY", $whereArr["coupon"]);
        // }
        // if (isset($whereArr["display"]) && $whereArr["end_work_date"] != ""){
        //     $this->db->where("TBL_HOSKO_RECRUIT.REC_CONTENTS_CATEGORY", $whereArr["display"]);
        // }

        $this->db->where("TBL_HOSKO_RECRUIT.REC_DEL_YN", 'N');

        $this->db->group_by("TBL_HOSKO_RECRUIT.REC_SEQ");
        $this->db->order_by("TBL_HOSKO_RECRUIT.REC_SEQ");
        $this->db->select("TBL_HOSKO_RECRUIT.*");
        $this->db->limit(20);
        return $this->db->get("TBL_HOSKO_RECRUIT")->result();
    }

    public function getRecruitAbroadListCount($whereArr){
        if (isset($whereArr["ctg"]) && $whereArr["ctg"] != ""){
            $this->db->where("TBL_HOSKO_RECRUIT.REC_CONTENTS_CATEGORY", $whereArr["ctg"]);
        }
        if (isset($whereArr["ctg2"]) && $whereArr["ctg2"] != ""){
            $this->db->where("TBL_HOSKO_RECRUIT.REC_CONTENTS_SUB1_CATEGORY", $whereArr["ctg2"]);
        }
        if (isset($whereArr["ctg3"]) && $whereArr["ctg3"] != ""){
            $this->db->where("TBL_HOSKO_RECRUIT.REC_CONTENTS_SUB2_CATEGORY", $whereArr["ctg3"]);
        }
        if (isset($whereArr["searchOpt"]) && $whereArr["searchOpt"] != ""){
            if($whereArr["searchOpt"] == "name"){
                $this->db->like("TBL_HOSKO_RECRUIT.REC_TITLE", $whereArr["searchTxt"]);
            }else if($whereArr["searchOpt"] == "code"){
                $this->db->like("TBL_HOSKO_RECRUIT.REC_SEQ", $whereArr["searchTxt"]);
            }else if($whereArr["searchOpt"] == "comapny"){
                $this->db->like("TBL_HOSKO_RECRUIT.REC_COUNTRY", $whereArr["searchTxt"]);
            }
        }

        $this->db->where("TBL_HOSKO_RECRUIT.REC_DEL_YN", 'N');

        $this->db->select("TBL_HOSKO_RECRUIT.REC_SEQ");
        $this->db->distinct();
        $this->db->from("TBL_HOSKO_RECRUIT");
        return $this->db->count_All_results();
    }

    public function getRecruitAbroadListCountAll(){
        $this->db->where("TBL_HOSKO_RECRUIT.REC_DEL_YN", 'N');
        $this->db->from("TBL_HOSKO_RECRUIT");
        return $this->db->count_All_results();
    }

    public function getRecruitAbroad($aborad_seq){
        $this->db->where("TBL_HOSKO_RECRUIT.REC_SEQ", $aborad_seq);
        return $this->db->get("TBL_HOSKO_RECRUIT")->row(); 
    }

    public function getRecruitAbroadInfo($aborad_seq){
        $this->db->where("TBL_HOSKO_RECRUIT.REC_SEQ", $aborad_seq);

        $this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_RECRUIT.REC_ADMIN_SEQ");

        $this->db->select("TBL_HOSKO_RECRUIT.*, TBL_HOSKO_USER.USER_NAME AS ADMIN_USER_NAME, TBL_HOSKO_USER.USER_ID AS ADMIN_USER_ID");

        return $this->db->get("TBL_HOSKO_RECRUIT")->row(); 
    }

    public function insertRecruitAbroad($insert_arr){
        return $this->db->insert("TBL_HOSKO_RECRUIT", $insert_arr);
    }

    public function updateRecruitAbroad($aborad_seq, $update_arr){
        $this->db->where("TBL_HOSKO_RECRUIT.REC_SEQ", $aborad_seq);

        return $this->db->update("TBL_HOSKO_RECRUIT", $update_arr);
    }

    public function deleteRecruitAbroad($aborad_seq){
        $this->db->where("TBL_HOSKO_RECRUIT.REC_SEQ", $aborad_seq);

        return $this->db->update("TBL_HOSKO_RECRUIT", array("REC_DEL_YN" => "Y"));
    }

    public function deleteRecruitAbroads($aborad_seqs){
        $this->db->where_in("TBL_HOSKO_RECRUIT.REC_SEQ", $aborad_seqs);

        return $this->db->update("TBL_HOSKO_RECRUIT", array("REC_DEL_YN" => "Y"));
    }

    public function getRecruitResumeList($whereArr){
        $this->db->where("TBL_HOSKO_USER_RESUME.RESUME_DEL_YN", 'N');

        $this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_USER_RESUME.USER_SEQ");

        $this->db->group_by("TBL_HOSKO_USER_RESUME.RESUME_SEQ");
        $this->db->order_by("TBL_HOSKO_USER_RESUME.RESUME_SEQ");
        $this->db->select("TBL_HOSKO_USER_RESUME.*, TBL_HOSKO_USER.USER_ID, TBL_HOSKO_USER.USER_NAME, TBL_HOSKO_USER_RESUME.RESUME_TITLE");
        $this->db->limit(15);
        return $this->db->get("TBL_HOSKO_USER_RESUME")->result();
    }

    public function getRecruitResumeListCount($whereArr){
        $this->db->where("TBL_HOSKO_USER_RESUME.RESUME_DEL_YN", 'N');

        $this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_USER_RESUME.USER_SEQ");

        $this->db->select("TBL_HOSKO_USER_RESUME.RESUME_SEQ");
        $this->db->distinct();
        $this->db->from("TBL_HOSKO_USER_RESUME");
        return $this->db->count_All_results();
    }

    



//     USER_SEQ
// USER_LEVEL
// USER_ID
// USER_PASS
// USER_NAME
// USER_ENG_NAME
// USER_SEX
// USER_BIRTHDAY
// USER_ZIPCODE
// USER_ADDR1
// USER_ADDR2
// USER_TEL
// USER_HP
// USER_EMAIL
// USER_EMAIL_FLAG
// USER_COMPANY
// USER_DEPARTMENT
// USER_MAJOR
// USER_HOPE_NATION
// USER_HOPE_PART
// USER_SKILL_ENG
// USER_SKILL_JAP
// USER_SKILL_CHN
// USER_STUDY_NATION
// USER_STUDY_TERM
// USER_WORK_COMPANY
// USER_WORK_TERM
// USER_WORK_COMPANY_2
// USER_WORK_TERM_2
// USER_WORK_COMPANY_3
// USER_WORK_TERM_3
// USER_CERTI_FLAG
// USER_CERTIFICATE_NAME
// USER_PASSPORT_FLAG
// USER_VISA_FLAG
// USER_PROFILE_DOC
// USER_JOIN_ROUTE
// USER_LEAVE_COUNTRY
// USER_LEAVE_HOTEL
// USER_MANAGER_NAME
// USER_RECOMM_ID
// USER_MEMO
// USER_REG_DATE
// USER_DEL_YN
// USER_REG_IP
// USER_LAST_LOGIN
// USER_LAST_LOGIN_IP

// REC_SEQ
// REC_TYPE
// REC_CATEGORY
// REC_TITLE
// REC_COUNTRY
// REC_PERIOD_START
// REC_PERIOD_END
// REC_DEADLINE
// REC_INTERVIEW_TYPE
// REC_INTERVIEW_DATE
// REC_CONDITION
// REC_PAY
// REC_LODGIN
// REC_WELFARE
// REC_VISA
// REC_CONTENTS
// REC_THUMBNAIL
// REC_STATUS
// REC_REG_DATE
// REC_REG_IP
// REC_ADMIN_SEQ
// REC_DEL_YN


//     APP_SEQ
//     APP_RECRUIT_SEQ
//     APP_USER_SEQ
//     APP_PROFILE_IMG
//     APP_UNIVERSITY
//     APP_MAJOR
//     APP_DOUBLEMAJOR
//     APP_GRADE
//     APP_GRADE_TYPE
//     APP_GRADE_YEAR
//     APP_COMP_NAME
//     APP_WORK_START_YEAR
//     APP_WORK_START_MONTH
//     APP_WORK_END_YEAR
//     APP_WORK_END_MONTH
//     APP_COMP_DEPARTMENT
//     APP_START_DATE
//     APP_ENG_SKILL
//     APP_ETC_LANG_SKILL
//     APP_ETC_LANG_NAME
//     APP_TOEIC_SCORE
//     APP_TOEFL_SCORE
//     APP_CAREER
//     APP_PASSPORT_FLAG
//     APP_VISA_FLAG
//     APP_INTRODUCE
//     APP_REG_DATE
//     APP_REG_IP
//     APP_DEL_YN
}
