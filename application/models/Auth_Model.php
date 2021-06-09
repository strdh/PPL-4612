<?php
  class Auth_model extends CI_Model
  {

    public function __construct(){
      $this->load->database();
    }

    public function check_username($table, $where = FALSE){
      return $this->db->get_where($table, array('username' => $where))->row();
    }

    public function create($table, $data){
      return $this->db->insert($table, $data);
    }

  }