<?php
  class User_model extends CI_Model{
    public function __construct(){
      $this->load->database();
    }

    public function games()
    {
      $this->db->select('g.*, p.name')
            ->from('games as g')
            ->join('game_publisher as p', 'g.publisher_id = p.id')
            ->order_by('g.id', 'DESC');
      $query = $this->db->get();
      return $query->result_array();
    }

}