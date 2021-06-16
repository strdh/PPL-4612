<?php
  class Admin_model extends CI_Model{
    public function __construct()
    {
      $this->load->database();
    }

    public function games()
    {
        $this->db->order_by('games.id', 'DESC');
        return $this->db->from('games')
            ->join('game_publisher', 'game_publisher.id=games.publisher_id')
            ->get()
            ->result_array();
    }
    
  }