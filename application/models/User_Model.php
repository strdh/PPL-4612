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

    public function getUser($username)
    {
      $query = $this->db->get_where("users", array("username" => $username));
      return $query->row();
    }

    public function isUniqueUsername($id, $param)
    {
      $this->db->select("username");
      $this->db->where("id !=", $id);
      $this->db->from("users");
      $query = $this->db->get();
      $data = $query->result_array();

      foreach ($data as $username) {
        if ($username == $param)
          return False;
      }
      return True;
    }

    public function updateUser($data, $username)
    {
      $this->db->where('username', $username);
      $this->db->set($data);
      $this->db->update("users");
    }

    public function getGame($id)
    {
      // $query = $this->db->get_where("games", array("id" => $id));
      // return $query->row();
      $this->db->select('g.*, p.name')
            ->from('games as g')
            ->join('game_publisher as p', 'g.publisher_id = p.id')
            ->where('g.id=', $id);
      $query = $this->db->get();
      return $query->row();
    }

}