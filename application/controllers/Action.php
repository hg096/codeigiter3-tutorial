<?php

class Action extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("action_model");
    }

    // 모든 데이터 조회
    public function get_all_data()
    {
        $data = $this->action_model->select_all_data();
        echo "<pre>";
        print_r($data);
    }

    public function update_data()
    {
        if ($this->action_model->update_table_data()) {
            echo "<h3> 업데이트 완료!! </h3>";
        }
    }
}