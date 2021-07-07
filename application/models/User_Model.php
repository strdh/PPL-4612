<?php
  class User_model extends CI_Model{
    public function __construct(){
      $this->load->database();
    }

    public function getAllGames()
    {
        $query = $this->db->get('games');
        return $query->result_array();
    }

}