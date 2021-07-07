<?php
  class Admin_model extends CI_Model{
    public function __construct()
    {
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

    public function getNumRows($table)
    {
      $query = $this->db->get($table);
      return $query->num_rows();      
    }

    public function forums()
    {
      $this->db->order_by('id', 'DESC');
      return $this->db->from('forums')
              ->get()
              ->result_array();
    }

    public function getUserLogs($id)
    {
      $this->db->select('u.*, l.*')
                ->from('users as u')
                ->join('logs as l', 'l.id_user = u.id')
                ->where('l.id_user', $id)
                ->order_by('l.id', 'DESC');
      $query = $this->db->get();
      return $query->result_array();
    }
    
  }