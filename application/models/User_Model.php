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

    public function create($table, $data)
    {
      $this->db->insert($table, $data);
    }

    public function isRated($id_game, $id_user)
    {
      $this->db->where('id_game', $id_game);
      $this->db->where('id_user', $id_user);
      $query = $this->db->get("game_ratings");
      return $query->row();
    }

    public function giveRate($id_game, $id_user, $value)
    {
      $data = "ratings + ".$value;
      $this->db->trans_start();
      $this->db->where('id', $id_game);
      $this->db->set("ratings", $data, FALSE);
      $this->db->update("games");
      $data_rating = array(
        "id_game" => $id_game,
        "id_user" => $id_user,
        "value" => $value
      );
      $this->db->insert("game_ratings", $data_rating);
      $this->db->trans_complete();
    }

    public function isPlayed($id_user, $id_game)
    {
      $this->db->where('id_user', $id_user);
      $this->db->where('id_game', $id_game);
      $query = $this->db->get('game_players');
      return $query->row();
    }

    public function getRateList($id_game)
    {
      $this->db->select('u.*, r.*')
                ->from('users as u')
                ->join('game_ratings as r', 'u.id = r.id_user')
                ->where('r.id_game', $id_game);
      $query = $this->db->get();
      return $query->result_array();
      
    }

    public function getPlayerList($id_game)
    {
      $this->db->select('u.*, p.*')
                ->from('users as u')
                ->join('game_players as p', 'u.id=p.id_user')
                ->where('p.id_game', $id_game);
      $query = $this->db->get();
      return $query->result_array();
    }

    public function getPlayedGame($id_user)
    {
      $this->db->select('g.title, p.*')
                ->from('games as g')
                ->join('game_players as p', 'p.id_game=g.id')
                ->where('p.id_user', $id_user);
      $query = $this->db->get();
      return $query->result_array();
    }

    public function getForum($id)
    {
      $query = $this->db->get_where("forums", array('game_id' => $id));
      return $query->row();
    }

    public function pusherRespon(){
        require APPPATH . 'views/vendor/autoload.php';

        $options = array(
          'cluster' => 'ap1',
          'useTLS' => true
        );

        $pusher = new Pusher\Pusher(
          'b9c05d2ae974b3456ed0',
          '0ed4dc35f6884325bc9a',
          '1011184',
          $options
        );

        $data['username'] = $this->session->userdata('username');
        $data['time'] = date('Y-m-d H:i:s');

        $msg = $data;
        $pusher->trigger('my-channel', 'my-event', $msg);
    }

    public function comment($data)
    {
      $this->db->insert("forum_comments", $data);
      $this->pusherRespon();
    }

    public function getComment($id_forum)
    {
      $query = $this->db->get_where("forum_comments", array('id_forum' => $id_forum));
      return $query->result();
    }



}