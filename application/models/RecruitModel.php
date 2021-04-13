<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RecruitModel extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function getRecruitApplyList($whereArr){
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
        $this->db->where("TBL_HOSKO_RECRUIT_APPLY.APP_DEL_YN", 'N');

        $this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_RECRUIT_APPLY.APP_USER_SEQ");
        $this->db->join("TBL_HOSKO_RECRUIT", "TBL_HOSKO_RECRUIT.REC_SEQ = TBL_HOSKO_RECRUIT_APPLY.APP_RECRUIT_SEQ");

        $this->db->select("TBL_HOSKO_RECRUIT_APPLY.APP_SEQ");
        $this->db->distinct();
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

    public function getRecruitAbroadList($whereArr){
        $this->db->where("TBL_HOSKO_RECRUIT.REC_DEL_YN", 'N');

        $this->db->group_by("TBL_HOSKO_RECRUIT.REC_SEQ");
        $this->db->order_by("TBL_HOSKO_RECRUIT.REC_SEQ");
        $this->db->select("TBL_HOSKO_RECRUIT.*");
        $this->db->limit(20);
        return $this->db->get("TBL_HOSKO_RECRUIT")->result();
    }

    public function getRecruitAbroadListCount($whereArr){
        $this->db->where("TBL_HOSKO_RECRUIT.REC_DEL_YN", 'N');

        $this->db->select("TBL_HOSKO_RECRUIT.REC_SEQ");
        $this->db->distinct();
        $this->db->from("TBL_HOSKO_RECRUIT");
        return $this->db->count_All_results();
    }

    public function getRecruitAbroadInfo($aborad_seq){
        $this->db->where("TBL_HOSKO_RECRUIT.REC_SEQ", $aborad_seq);

        $this->db->join("TBL_HOSKO_USER", "TBL_HOSKO_USER.USER_SEQ = TBL_HOSKO_RECRUIT.REC_ADMIN_SEQ");

        $this->db->select("TBL_HOSKO_RECRUIT.*, TBL_HOSKO_USER.USER_NAME AS ADMIN_USER_NAME");

        return $this->db->get("TBL_HOSKO_RECRUIT")->row(); 
    }

    public function deleteRecruitAbroad($aborad_seq){
        $this->db->where("TBL_HOSKO_RECRUIT.REC_SEQ", $aborad_seq);

        return $this->db->update("TBL_HOSKO_RECRUIT", array("REC_DEL_YN" => "Y"));
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
