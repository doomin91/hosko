<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Notice extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
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

        $this->load->library('CustomClass');
        //$this->load->library('encrypt');
        $this->load->helper('download');

        $this->load->model("NoticeModel");

        if ($this->session->userdata("admin_id") == ""){
			echo "<script type=\"text/javascript\">
            <!--
                alert(\"로그인후 이용해주세요\");
				document.location.href=\"/admin\";
			//-->
			</script>";
		}
    }

    public function index(){
        $limit = 10;
        $nowpage = "";
        if (!isset($_GET["per_page"])){
            $start = 0;
        }else{
            $start = ($_GET["per_page"]-1)*10;
            $nowpage = $_GET["per_page"];
        }

        $search = isset($_GET["search"]) ? $_GET["search"] : "";

        $wheresql = array(
                        "search" => $search,
                        "start" => $start,
                        "limit" => $limit
                        );
        $lists = $this->NoticeModel->getNotices($wheresql);
        //echo $this->db->last_query();
        $listCount = $this->NoticeModel->getNoticeCount($wheresql);
        if ($nowpage != ""){
            $pagenum = $listCount-(($nowpage-1)*10);
        }else{
            $pagenum = $listCount;
        }
        $pagination = $this->customclass->pagenavi("/administrator/notice?search=".$search, $listCount, 10, 5, $nowpage);
        //print_r($listCount);
        $data = array(
                    "search" => $search,
                    "lists" => $lists,
                    "listCount" => $listCount,
                    "pagination" => $pagination,
                    "pagenum" => $pagenum,
                    "listCount" => $listCount,
                    "start" => $start+1,
                    "limit" => $limit,
                    );
        $this->load->view("admin/notice-list", $data);
    }

    public function notice_write(){
        $this->load->view("admin/notice-write");
    }

    public function notice_write_proc(){
        $notice_title = isset($_POST["notice_title"]) ? $_POST["notice_title"] : "";
        $notice_contents = isset($_POST["notice_contents"]) ? $_POST["notice_contents"] : "";

        //print_r($_POST);

        $config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/notice/";
        $config["allowed_types"] = "xls|xlsx|ppt|pptx|gif|jpg|png|hwp|doc|bmp|jpeg|zip|GIF|JPG|PNG|JPEG";
        $new_name = "notice_".date("YmdHis");
        $config["file_name"] = $new_name;
        $this->load->library("upload", $config);

        $notice_file_name = "";
        $notice_file_path = "";
        if (isset($_FILES['notice_file_name']['name'])) {
            if (0 < $_FILES['notice_file_name']['error']) {
                echo 'Error during file upload' . $_FILES['notice_file_name']['error'];
            } else {
                if (file_exists('uploads/notice/' . $_FILES['notice_file_name']['name'])) {
                    echo 'File already exists : uploads/notice/' . $_FILES['notice_file_name']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('notice_file_name')) {
                        echo $this->upload->display_errors();
                    } else {
                        //echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
                        $notice_file_name = $_FILES['notice_file_name']['name'];
                        $notice_file_path = "/upload/notice/".$this->upload->data("file_name");
                    }
                }
            }
        } else {
            //echo 'Please choose a file';
        }

        $insert_arr = array(
                        "NOTICE_TITLE" => $notice_title,
                        "NOTICE_CONTENTS" => $notice_contents,
                        "NOTICE_FILE_NAME" => $notice_file_name,
                        "NOTICE_FILE_PATH" => $notice_file_path,
                        "NOTICE_REG_DATE" => date("Y-m-d H:i:s"),
                        "NOTICE_REG_IP" => $_SERVER["REMOTE_ADDR"],
                        "NOTICE_DEL_YN" => "N"
        );

        $result = $this->NoticeModel->insertNotice($insert_arr);

        if ($result == true){
            echo json_encode(array("code" => "200"));
        }else{
            echo json_encode(array("code" => "202", "msg" => $logs));
        }
    }

    public function notice_view($seq){
        $detail = $this->NoticeModel->getNoticeInfo($seq);

        $data = array(
                    "detail" => $detail
        );

        $this->load->view("admin/notice-view", $data);
    }

    public function notice_modify($seq){
        $detail = $this->NoticeModel->getNoticeInfo($seq);

        $data = array(
                    "detail" => $detail
        );

        $this->load->view("admin/notice-modify", $data);
    }

    public function notice_modify_proc(){
        $notice_title = isset($_POST["notice_title"]) ? $_POST["notice_title"] : "";
        $notice_contents = isset($_POST["notice_contents"]) ? $_POST["notice_contents"] : "";
        $seq = isset($_POST["seq"]) ? $_POST["seq"] : "";
        //print_r($_POST);

        $detail = $this->NoticeModel->getNoticeInfo($seq);

        $config["upload_path"] = $_SERVER['DOCUMENT_ROOT'] . "/upload/notice/";
        $config["allowed_types"] = "xls|xlsx|ppt|pptx|gif|jpg|png|hwp|doc|bmp|jpeg|zip";
        $new_name = "notice_".date("YmdHis");
        $config["file_name"] = $new_name;
        $this->load->library("upload", $config);

        $notice_file_name = $detail->NOTICE_FILE_NAME;
        $notice_file_path = $detail->NOTICE_FILE_PATH;
        if (isset($_FILES['notice_file_name']['name'])) {
            if (0 < $_FILES['notice_file_name']['error']) {
                echo 'Error during file upload' . $_FILES['notice_file_name']['error'];
            } else {
                if (file_exists('uploads/notice/' . $_FILES['notice_file_name']['name'])) {
                    echo 'File already exists : uploads/notice/' . $_FILES['notice_file_name']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('notice_file_name')) {
                        echo $this->upload->display_errors();
                    } else {
                        //echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
                        $notice_file_name = $_FILES['notice_file_name']['name'];
                        $notice_file_path = "/upload/notice/".$this->upload->data("file_name");
                    }
                }
            }
        } else {
            //echo 'Please choose a file';
        }

        $update_arr = array(
                        "NOTICE_TITLE" => $notice_title,
                        "NOTICE_CONTENTS" => $notice_contents,
                        "NOTICE_FILE_NAME" => $notice_file_name,
                        "NOTICE_FILE_PATH" => $notice_file_path,
        );

        $result = $this->NoticeModel->updateNotice($update_arr, $seq);

        if ($result == true){
            echo json_encode(array("code" => "200"));
        }else{
            echo json_encode(array("code" => "202", "msg" => $result));
        }
    }

    public function notice_del_proc(){
        $seq = isset($_POST["seq"]) ? $_POST["seq"] : "";

        $result = $this->NoticeModel->deleteNotice($seq);

        if ($result == true){
            echo json_encode(array("code" => "200"));
        }else{
            echo json_encode(array("code" => "202", "msg" => $result));
        }
    }
}
