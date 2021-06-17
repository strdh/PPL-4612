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

    public function publishers()
    {
      $this->db->order_by('id', 'DESC');
      return $this->db->from('game_publisher')
              ->get()
              ->result_array();
    }

    public function categories()
    {
      $this->db->order_by('id', 'DESC');
      return $this->db->from('game_categories')
              ->get()
              ->result_array();
    }

    public function users()
    {
      $this->db->order_by('id', 'DESC');
      return $this->db->from('users')
              ->get()
              ->result_array();
    }

    public function userLogs($id)
    {
      $this->db->order_by('id', 'DESC');
      return $this->db->get_where('logs', array('di' => $id))
              ->result_array();
    }

    public function create($table, $data)
    {
      $this->db->insert($table, $data);
    }

    public function show($table, $id)
    {
      $query = $this->db->get_where($table, array('id' => $id));
      return $query->row();
    }

    public function updateData($table, $data, $id)
    {
      $this->db->where('id', $id);
      $this->db->set($data);
      $this->db->update($table);
    }

    public function del($table, $id)
    {
      $this->db->where('id', $id);
      return $this->db->delete($table);
    }
    
  }