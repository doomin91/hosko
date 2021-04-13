<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Customclass{

    protected $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->library('session');

        $this->CI->load->library("pagination");
    }

    public function pagenavi($url, $total_cnt, $per_page, $num_links, $nowpage){
        //$PAGINATION
        //게시물 전체 수
        $config['total_rows'] = $total_cnt;


        //패아장 설정
        $config['base_url'] = $url; // 페이징 연결 주소
        $config['per_page'] = $per_page;                            // 페이지당 표시 게시물 수
        $config['num_links'] = $num_links;
        // 페이지 표시 수
        if ($nowpage==""){
            $startRow =0;
        }else{
            $startRow = $config['per_page']*($nowpage-1);
        }
        $config['display_pages'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = "<ul class=\"pagination\" style=\"margin:0 !important\">";
        $config['full_tag_close'] = "</ul>";
    //  $config['first_link'] = "<img src='/_images/_sub/_ui/btn_front.gif' width='27' height='26' alt='처음페이지' />";
    //  $config['first_tag_open'] = "";
    //  $config['first_tag_close'] = "";
    //  $config['last_link'] = "<img src='/_images/_sub/_ui/btn_end.gif' width='27' height='26' alt='마지막페이지' />";
    //  $config['last_tag_open'] = "";
    //  $config['last_tag_close'] = "";
        $config['next_link'] = "Next";
        $config['next_tag_open'] = "<li class=\"next\">";
        $config['next_tag_close'] = "</li>";
        $config['prev_link'] = "Previous";
        $config['prev_tag_open'] = "<li class=\"prev\">";
        $config['prev_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li class=\"active\"><a href=\"#\">";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li>";
        $config['num_tag_close'] = "</li>";
        $this->CI->pagination->initialize($config);

        return $this->CI->pagination->create_links();
    }

    public function front_pagenavi($url, $total_cnt, $per_page, $num_links, $nowpage){
        //$PAGINATION
        //게시물 전체 수
        $config['total_rows'] = $total_cnt;


        //패아장 설정
        $config['base_url'] = $url; // 페이징 연결 주소
        $config['per_page'] = $per_page;                            // 페이지당 표시 게시물 수
        $config['num_links'] = $num_links;
        // 페이지 표시 수
        if ($nowpage==""){
            $startRow =0;
        }else{
            $startRow = $config['per_page']*($nowpage-1);
        }
        $config['display_pages'] = TRUE;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['full_tag_open'] = "<ul>";
        $config['full_tag_close'] = "</ul>";
//      $config['first_link'] = "<img src='/_images/_sub/_ui/btn_front.gif' width='27' height='26' alt='처음페이지' />";
//      $config['first_tag_open'] = "";
//      $config['first_tag_close'] = "";
//      $config['last_link'] = "<img src='/_images/_sub/_ui/btn_end.gif' width='27' height='26' alt='마지막페이지' />";
//      $config['last_tag_open'] = "";
//      $config['last_tag_close'] = "";
        $config['next_link'] = "";
//      $config['next_tag_open'] = "<li class=\"next\">";
//      $config['next_tag_close'] = "</li>";
        $config['prev_link'] = "";
//      $config['prev_tag_open'] = "<li class=\"prev\">";
//      $config['prev_tag_close'] = "</li>";
        $config['cur_tag_open'] = "<li><a href=\"#\" class=\"on\">";
        $config['cur_tag_close'] = "</a></li>";
        $config['num_tag_open'] = "<li>";
        $config['num_tag_close'] = "</li>";
        $this->CI->pagination->initialize($config);

        return $this->CI->pagination->create_links();
    }

    public function dateDbFormat($str){
        if (strpos($str,"/") > 0){
            $strArr = explode("/", $str);
            $convertStr = $strArr[2] . "-" . $strArr[0] . "-" . $strArr[1];
        }else{
            $convertStr = "";
        }

        return $convertStr;
    }

    public function strcut($str, $len){
        $strLen = strlen(strip_tags($str));

        if ($strLen >= $len){
            $return = mb_substr(strip_tags($str), 0, $len-1, "UTF8") . "...";
        }else{
            $return = strip_tags($str);
        }
        $return = str_replace("&nbsp;", "", $return);
        $return = trim($return);
        return $return;
    }

    public function RandomString($len){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $len; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public function strEncodeing($str){
        $str = addslashes(trim($str));
        $str = preg_replace('/\r\n|\r|\n/','',$str);
        return $str;
    }

    public function get_client_ip() {
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';
		return $ipaddress;
	}
}
