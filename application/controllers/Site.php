<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Site extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("site_model");
    }

    public function index()
    {
        $message = $this->site_model->run_my_query();

        $info_array = array(
            "name" => "이름이름1",
            "email" => "이메일1@메일.com",
            "author" => "작가작가1",
            "message" => $message,
        );

        // 페이지 구성방식 1
        // $this->load->view('include/header');
        // $this->load->view('site/site_index');
        // $this->load->view('include/footer', $info_array);


        // http://localhost/ci3/
        // 페이지 구성방식 2
        $this->load->view("home_page", $info_array);
    }

    public function pass_var()
    {

        // 방법1 
        // $info_array = array(
        //     "organisation_name" => "사이트사이트",
        //     "author_name" => "이름이름",
        //     "email" => "이메일@메일.com"
        // );
        // $this->load->view('site/pass_variable', $info_array);

        // 방법2
        // $info_array["organisation_name"] = "사이트사이트2";
        // $info_array["author_name"] = "이름이름2";
        // $info_array["email"] = "이메일2@메일.com";
        // $this->load->view('site/pass_variable', $info_array);


        // 방법3
        // http://localhost/ci3/index.php/site/variable
        $this->load->view('site/pass_variable', array(
            "organisation_name" => "사이트사이트2",
            "author_name" => "이름이름2",
            "email" => "이메일2@메일.com"
        ));
    }

    public function about()
    {
        $this->load->view('site/site_about');
    }

    public function contact_info()
    {
        echo "<h1> 컨텍트 페이지 </h1>";
    }

    // service($id = "", $name = "") >> 기본값 지정
    public function product($name = "")
    {
        echo "<h1> 상품 페이지 </h1>"  . $name;
    }

    // service($id = "", $name = "") >> 기본값 지정
    public function service($id = "", $name = "")
    {
        echo "<h1> 서비스 페이지 </h1>" . $id . ' 그리고 ' . $name;
    }
}