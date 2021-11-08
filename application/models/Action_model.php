<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Action_model extends CI_Model
{

    // 수동 접속
    public function __construct()
    {
        parent::__construct();
        $this->load->model("action_model");
    }

    // 모든 데이터 조회
    public function select_all_data()
    {
        $tbl = 'users';

        // 방법 1
        // $this->db->select("*");
        // $query = $this->db->get($tbl);
        // return $result = $query->result();

        // 방법 2
        // $this->db->select("u_name,u_email");
        // $this->db->from($tbl);
        // $query = $this->db->get();
        // return $result = $query->result();

        // 방법 3
        // $this->db->select("*");
        // $this->db->from($tbl);
        // $this->db->where("u_email", "이메일@메일.com"); // u_email에서 이메일@메일.com같은 이름
        // $query = $this->db->get();
        // return $result = $query->result();

        // 방법 4 
        $this->db->select("*");
        $this->db->from($tbl);
        $this->db->where(array(
            "u_id" => 2,
            "u_email" => "이메일@메일.com",
        )); // u_email에서 이메일@메일.com같은 이름
        $query = $this->db->get();
        return $result = $query->result();


        $result['colum'] = "u_id";
        $result['num'] = 1;
        $result['tbl'] = "u_id";
        $result['updateData'] =[
                                "u_name" => "이름변경2",
                                "u_email" => "이메일변경2@메일.com",
                                "u_phone_num" => "123321",
                            ]
        $this->update_table_data($result);

    }

    public function update_table_data($data)
    {

        $data['colum'] = "u_id";
        $colum = "u_id";
        $num = 1;
        $tbl = "users";
        $data = array(
            "u_name" => "이름변경2",
            "u_email" => "이메일변경2@메일.com",
            "u_phone_num" => "123321",
        );
        
        
        $this->db->where($data['colum'], $data['num']);
        $this->db->update($tbl, $data);
        return True;
    }
}