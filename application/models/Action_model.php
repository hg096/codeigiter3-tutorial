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

    // 데이터 추가
    function insert_table_data()
    {
        $tbl = 'users';

        // 더미 데이터 테이블 컬럼과 맞추기
        $data = array(
            "u_name" => "이름이름22",
            "u_email" => "이메일22@메일.com",
            "u_phone_num" => "123123",
            "u_salary" => 6000,
        );


        // 쿼리문을 직접 짤수도 있음
        // return $this -> db -> query("insert into users () value();")

        // 데이터베이스 접속을 다른곳으로 할 때
        // $this->test->insert($tbl, $data);

        // $this->db->modify();
        $this->db->insert($tbl, $data);
    }

    // 모든 데이터 조회
    public function select_all_data()
    {
        $tbl = 'users';

        // 방법 1
        $this->db->select("*");
        $this->db->from($tbl);
        $query = $this->db->get();
        // return $result = $query->result();
        return $result = $query->result_array();

        // 방법 2
        // $this->db->select("u_name,u_email");
        // $this->db->from($tbl);
        // $query = $this->db->get();
        // return $result = $query->result();

        // 방법 3
        // $this->db->select("*");
        // $this->db->from($tbl);
        // $this->db->where("u_id", "1"); // u_id에서 1의 값
        // $query = $this->db->get();
        // return $result = $query->row_array(); // row_array, row 하나의 데이터만 받아올 때 사용

        // 방법 4 
        // $this->db->select("*");
        // $this->db->from($tbl);
        // $this->db->where(array(
        //     "u_id" => 2,
        //     "u_email" => "이메일@메일.com",
        // )); // u_email에서 이메일@메일.com같은 이름
        // $query = $this->db->get();
        // return $result = $query->result();


        // $result['colum'] = "u_id";
        // $result['num'] = 1;
        // $result['tbl'] = "u_id";
        // $result['updateData'] =[
        //                         "u_name" => "이름변경2",
        //                         "u_email" => "이메일변경2@메일.com",
        //                         "u_phone_num" => "123321",
        //                     ]
        // $this->update_table_data($result);

    }


    public function update_table_data()
    {

        // $colum = "u_id";
        // $num = 1;
        // $tbl = "users";
        // $data = array(
        //     "u_name" => "이름변경2",
        //     "u_email" => "이메일변경2@메일.com",
        //     "u_phone_num" => "123321",
        // );
        // $this->db->where($colum, $num);
        // $this->db->update($tbl, $data);

        $total = [
            "colum" => "u_id",
            "num" => 1,
            "tbl" => "users",
            "data" => array(
                "u_name" => "이름변경2",
                "u_email" => "이메일변경2@메일.com",
                "u_phone_num" => "123321",
            ),
        ];

        $total["colum"] = "u_id";

        $this->db->where($total["colum"], $total["num"]);
        $this->db->update($total["tbl"], $total["data"]);

        return True;
    }

    public function delete_specific_user()
    {

        $total = [
            "colum" => "u_id",
            "num" => 5,
            "tbl" => "users",

        ];

        // 방법 1
        // $this->db->where($total["colum"], $total["num"]);
        // return $this->db->delete($total["tbl"]);

        // 방법 2
        return $this->db->delete($total["tbl"], [
            "u_id" => 4
        ]);
    }

    public function get_where_condition_query()
    {
        $total = [
            "colum" => "u_salary",
            "value" => 4000,
            "tbl" => "users",

        ];


        $this->db->select("*");
        $this->db->from($total["tbl"]);
        // $this->db->where("u_salary >=", 3000); 
        $this->db->where("$total[colum] >=", $total["value"]);
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function get_and_condition()
    {

        $total = [

            "tbl" => "users",

        ];

        $this->db->select("*");
        $this->db->from($total["tbl"]);
        $this->db->where([
            "u_id" => 2,
            "u_email" => "이메일@메일.com",
        ]);
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function get_where_in()
    {
        $this->db->select("*");
        $this->db->from("users");
        $this->db->where_in("u_salary", [3000, 3500, 4000]);
        // 검색 컬럼과 조건이 들어감
        $this->db->like("u_email", ".com");
        $query = $this->db->get();
        return $result = $query->result();
    }

    public function get_user_message()
    {
        // join tbl_users => id, match user_id inside tbl_messages
        $this->db->select("*");
        $this->db->from("users");
        $this->db->join("messages as m_message", "user.u_id = message.u_user_id");
        $query = $this->db->get();
        return $result = $query->result();
    }
}
