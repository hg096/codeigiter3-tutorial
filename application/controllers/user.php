<?php

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("form");
    }

    public function form_helper_study()
    {
        $this->load->view("user/form");
    }

    public function form_submit_method()
    {
        $data = $this->input->post();

        echo $data["txt_name"] . " // " . $data["txt_email"];
    }
}
