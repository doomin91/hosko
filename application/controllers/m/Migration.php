<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */

    function __construct(){
        parent::__construct();

        $this->load->helper('url');
        $this->load->helper('form');

        $this->load->library('session');
        $this->load->library('pagination');

        //$this->load->library('CustomClass');
        //$this->load->library('encrypt');
        $this->load->helper('download');

        $this->load->model("adminModel");
        $this->load->model("MigrationModel");
    }

    public function memberConvert(){
        $limit = 10;
        $page = $this->input->get("page");

        $whereArr = array(
                        "limit" => $limit,
                        "start" => $page*$limit
        );

        $memBack = $this->MigrationModel->getMemberBakup($whereArr);

        foreach ($memBack as $mb){
            $idcheck = $this->MigrationModel->checkId($mb->id);

                $comment = $this->MigrationModel->getcomment($mb->id);
                if (!empty($comment)){
                    $user_memo = $comment->comment;
                }else{
                    $user_memo = "";
                }

                $user_sex = "";
                if ($mb->sex == "남"){
                    $user_sex = "M";
                }else if ($mb->sex == "여"){
                    $user_sex = "F";
                }
            if (empty($idcheck)){
                $insertArr = array(
                    "USER_LEVEL" => $mb->level,
                    "USER_ID" => $mb->id,
                    "USER_PASS" => $mb->passwd,
                    "USER_NAME" => $mb->name,
                    "USER_ENG_NAME" => $mb->engname,
                    "USER_SEX" => $user_sex,
                    "USER_BIRTHDAY" => $mb->byy . "-" . $mb->bmm . "-" . $mb->bdd,
                    "USER_ZIPCODE" => $mb->zip1 . "-" . $mb->zip2,
                    "USER_ADDR1" => $mb->addr1,
                    "USER_ADDR2" => $mb->addr2,
                    "USER_TEL" => $mb->tel1 . "-" . $mb->tel2 . "-" . $mb->tel3,
                    "USER_HP" => $mb->hp1 . "-" . $mb->hp2 . "-" . $mb->hp3,
                    "USER_EMAIL" => $mb->email,
                    "USER_EMAIL_FLAG" => $mb->email_all,
                    "USER_COMPANY" => $mb->job,
                    "USER_DEPARTMENT" => $mb->s_subject,
                    "USER_MAJOR" => $mb->major,
                    "USER_HOPE_NATION" => $mb->nation,
                    "USER_HOPE_PART" => $mb->position,
                    "USER_SKILL_ENG" => $mb->skill_eng,
                    "USER_SKILL_JP" => $mb->skill_jpn,
                    "USER_SKILL_CH" => $mb->skill_chi,
                    "USER_STUDY_NATION" => $mb->in_nation,
                    "USER_STUDY_TERM" => $mb->in_term,
                    "USER_LAN_STUDY_NATION" => $mb->inlan_nation,
                    "USER_LAN_STUDY_TERM" => $mb->inlan_term,
                    "USER_WORK_COMPANY" => $mb->work_name1,
                    "USER_WORK_TERM" => $mb->work_term1,
                    "USER_WORK_COMPANY_2" => $mb->work_name2,
                    "USER_WORK_TERM_2" => $mb->work_term2,
                    "USER_WORK_COMPANY_3" => $mb->work_name3,
                    "USER_WORK_TERM_3" => $mb->work_term3,
                    "USER_CERTI_FLAG" => $mb->license_chk,
                    "USER_CERTIFICATE_NAME" => $mb->license,
                    "USER_PASSPORT_FLAG" => $mb->passport,
                    "USER_VISA_FLAG" => "N",
                    "USER_JOIN_ROUTE" => $mb->joinfrom,
                    "USER_LEAVE_COUNTRY" => $mb->outcountry,
                    "USER_LEAVE_HOTEL" => $mb->outhotel,
                    "USER_MANAGER_NAME" => $mb->staff,
                    "USER_RECOMM_ID" => $mb->goodman,
                    "USER_MEMO" => $user_memo,
                    "USER_REG_DATE" => date("Y-m-d H:i:s", $mb->regdate),
                    "USER_LAST_LOGIN" => date("Y-m-d H:i:s", $mb->last_login),
                    "USER_LOGIN_CNT" => $mb->lognum
                );
                //print_r($insertArr);
                $this->MigrationModel->setMember($insertArr);
            }else{
                $updateArr = array(
                    "USER_LEVEL" => $mb->level,
                    "USER_NUMBER" => $mb->pnum,
                    "USER_BIRTHDAY" => $mb->byy . "-" . $mb->bmm . "-" . $mb->bdd,
                    "USER_IDNUM1" => $mb->jumin1,
                    "USER_ZIPCODE" => $mb->zip1 . "-" . $mb->zip2,
                    "USER_ADDR1" => $mb->addr1,
                    "USER_ADDR2" => $mb->addr2,
                    "USER_TEL" => $mb->tel1 . "-" . $mb->tel2 . "-" . $mb->tel3,
                    "USER_HP" => $mb->hp1 . "-" . $mb->hp2 . "-" . $mb->hp3,
                    "USER_EMAIL" => $mb->email,
                    "USER_EMAIL_FLAG" => $mb->email_all,
                    "USER_COMPANY" => $mb->job,
                    "USER_DEPARTMENT" => $mb->s_subject,
                    "USER_MAJOR" => $mb->major,
                    "USER_HOPE_NATION" => $mb->nations,
                    "USER_HOPE_PART" => $mb->position,
                    "USER_SKILL_ENG" => $mb->skill_eng,
                    "USER_SKILL_JP" => $mb->skill_jpn,
                    "USER_SKILL_CH" => $mb->skill_chi,
                    "USER_STUDY_NATION" => $mb->in_nation,
                    "USER_STUDY_TERM" => $mb->in_term,
                    "USER_LAN_STUDY_NATION" => $mb->inlan_nation,
                    "USER_LAN_STUDY_TERM" => $mb->inlan_term,
                    "USER_WORK_COMPANY" => $mb->work_name1,
                    "USER_WORK_TERM" => $mb->work_term1,
                    "USER_WORK_COMPANY_2" => $mb->work_name2,
                    "USER_WORK_TERM_2" => $mb->work_term2,
                    "USER_WORK_COMPANY_3" => $mb->work_name3,
                    "USER_WORK_TERM_3" => $mb->work_term3,
                    "USER_CERTI_FLAG" => $mb->license_chk,
                    "USER_CERTIFICATE_NAME" => $mb->license,
                    "USER_PASSPORT_FLAG" => $mb->passport,
                    "USER_VISA_FLAG" => "N",
                    "USER_JOIN_ROUTE" => $mb->joinfrom,
                    "USER_LEAVE_COUNTRY" => $mb->outcountry,
                    "USER_LEAVE_HOTEL" => $mb->outhotel,
                    "USER_MANAGER_NAME" => $mb->staff,
                    "USER_RECOMM_ID" => $mb->goodman,
                    "USER_MEMO" => $user_memo,
                    "USER_REG_DATE" => date("Y-m-d H:i:s", $mb->regdate),
                    "USER_LAST_LOGIN" => date("Y-m-d H:i:s", $mb->last_login),
                    "USER_LOGIN_CNT" => $mb->lognum
                );
                //print_r($updateArr);
                $this->MigrationModel->updateMember($updateArr, $mb->id);
            }
        }

        //print_r($memBack);
        //echo count($memBack);
        if (count($memBack) > 0 ){
            echo "
                <script type=\"text/javascript\">
                    document.location.href = \"/migration/memberConvert/?page=".($page+1)."\";
                </script>
            ";
        }
    }

}
