<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Code extends CI_Controller {

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

    }

    public function filedownload(){
        $path = $_SERVER['DOCUMENT_ROOT'].$_GET["path"];
        $name = $_GET["name"];

        if (is_file($path)){
            $data = file_get_contents($path);
            force_download($name, $data);
        }else{
            echo "
                <script type=\"text/javascript\">
                    alert(\"파일이 존재하지 않습니다.\");
                    history.back();
                </script>
            ";
        }

    }

    public function editor_upload(){
        $dir = $_SERVER['DOCUMENT_ROOT'] . "/upload/editor/" . date("Y") . "/" . date("m") . "/" . date("d") . "/";
        $uploadPath = "/upload/editor/" . date("Y") . "/" . date("m") . "/" . date("d") . "/";
        if (!is_dir($dir)){
            mkdir($dir, 07777, true);
        }
        //echo"ASDFASF";
        $config["upload_path"] = $dir;
		$config["allowed_types"] = "gif|jpg|png|bmp|jpeg|GIF|JPG|PNG|JPEG|BMP|";
        $config["encrypt_name"] = TRUE;
        $config["remove_spaces"] = TRUE;
        $config["overwrite"] = FALSE;
        $config[""]
		$this->load->library("upload", $config);

		$file_name = "";
        if (isset($_FILES['image']['name'])) {
            if (0 < $_FILES['image']['error']) {
                echo 'Error during file upload' . $_FILES['image']['error'];
            } else {
                if (file_exists($uploadPath . $_FILES['image']['name'])) {
                    echo 'File already exists : ' . $uploadPath . $_FILES['image']['name'];
                } else {
                    //$this->load->library('upload', $config);
                    if (!$this->upload->do_upload('image')) {
                        echo $this->upload->display_errors();
                    } else {
                        //echo 'File successfully uploaded : uploads/' . $_FILES['post_thumbnail']['name'];
                        //$file_name = $_FILES['image']['name'];
                        //print_r($_FILES);
                        $result = $this->upload->data();
                        //print_r($result);
                        $file_name = $result["file_name"];
                    }
                }
            }
        } else {
            //echo 'Please choose a file';
        }

        echo $uploadPath.$file_name;
    }
}
