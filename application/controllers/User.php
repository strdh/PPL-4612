<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  class User extends CI_Controller {
    public function __construct(){
        parent:: __construct();
        $this->load->model('user_model');

        // if ($this->session->userdata('id') === NULL ) {
        //   redirect(base_url('login'));
        // }

        // $this->admin = ($this->session->userdata('admin') != NULL) ? true : false;
      }

      public function home()
      {
        $data['games'] = $this->user_model->games();
        $this->load->view('templates/userheader');
        $this->load->view('users/index', $data);
        $this->load->view('templates/userfooter');
      }

      public function notFound()
      {
         $this->load->view('errors/404');
      }

      public function isFound($param)
      {
        if ($param == NULL) return redirect(base_url("notfound"));
      }

      public function saveLog($data)
      {
        $this->user_model->create("logs", $data);
      }

      public function isLogin()
      {
        if ($this->session->userdata('id') === NULL) return False;
        else return True;
      }

      public function profile($username)
      {
        $data["user"] = $this->user_model->getUser($username);
        $this->isFound($data["user"]);
        //var_dump($data["user"]->id);
        $data["games"] = $this->user_model->getPlayedGame($data["user"]->id);
        $this->load->view('templates/userheader');
        $this->load->view('users/profile/profile', $data);
        $this->load->view('templates/userfooter');
      }

      public function uploadImage($form){
        $config = array(
          'upload_path' => './asset/src/images/',
          'allowed_types' => 'gif|jpg|png|jpeg',
          'overwrite' => 'true',
          'file_name' => date('dmYHis'),
          'max_size' => 5100
        );

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($form)) {
          return $data = array('upload_data' => $this->upload->data());
        }else{
          $errors = array('error' => $this->upload->display_errors());
          return NULL;
        }
      }

      public function editProfile($username)
      {
        if ($username == $this->session->userdata("username")) {
          $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]');
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
          $this->form_validation->set_rules('name', 'Nama', 'required');

          if ($this->form_validation->run() === FALSE) {
            $data["user"] = $this->user_model->getUser($username);
            $this->load->view('templates/userheader');
            $this->load->view('users/profile/profileedit', $data);
            $this->load->view('templates/userfooter');
          } else {
            $old_username = $this->input->post('old_username');
            $old_avatar = $this->input->post('old_avatar');
            $new_username = $this->input->post("username");

            $is_unique = True;

            if ($old_username != $new_username)
              $is_unique = $this->user_model->isUniqueUsername($this->session->userdata("id"), $new_username);

            if ($is_unique == 1) {
              $this->session->set_userdata("username", $new_username);
              $data_update = array(
                "username" => $new_username,
                "email" => $this->input->post("email"),
                "name" => $this->input->post("name")
              );

              if ($this->input->post('del_avatar') == 'on') {
                $path = FCPATH."asset/src/images/".$old_avatar;
                unlink($path);
                $data_update["avatar"] = "";
              }

              $avatar = $this->uploadImage("avatar");
              if ($avatar) {
                $data_update['avatar'] = $avatar['upload_data']['file_name'];
                if ($old_avatar != NULL) {
                 $path = FCPATH."asset/src/images/".$old_avatar;
                 unlink($path);
               }
              }

              $data_log = array (
                "id_user" => $this->session->userdata("id"),
                "activity" => "Melakukan edit profil"
              );

              $this->user_model->updateUser($data_update, $username);
              $this->saveLog($data_log);
              $this->session->set_flashdata('success', 'Berhasil diupdate');
              return redirect(base_url('profile/'.$this->session->userdata("username")));
              
            } else {
              return redirect(base_url('profile/'.$this->session->userdata("username")));
            }
          }
        } else {
          return redirect(base_url('profile/'.$this->session->userdata("username")));
        }
      }

      public function gameDetail($id)
      {
        $data["game"] = $this->user_model->getGame($id);
        $this->isFound($data["game"]);
        $data["rating"] = $this->user_model->getRateList($id);
        $data["player"] = $this->user_model->getPlayerList($id);
        $this->load->view('templates/userheader');
        $this->load->view('users/game/game', $data);
        $this->load->view('templates/userfooter');
      }

      public function giveRating($id_game, $value)
      {
        if ($this->isLogin()) {
          $id_user = $this->session->userdata("id");
          if ($this->user_model->isRated($id_game, $id_user) === NULL) {
            $this->user_model->giveRate($id_game, $id_user, $value);
            $data_log = array (
                "id_user" => $id_user,
                "activity" => "Memberi rating bintang ".$value." Kepada game ".$id_game,
            );
            $this->saveLog($data_log);
            $this->session->set_flashdata('success', 'Berhasil memberi rating');
            return redirect(base_url('game/'.$id_game));
          } else {
            $this->session->set_flashdata('warning', 'Anda Sudah memberi rating');
            return redirect(base_url('game/'.$id_game));
          }
        } else {
          return redirect(base_url('login'));
        }
      }

      public function playGame($id_game)
      {
        if ($this->isLogin()) {
          $id_user = $this->session->userdata("id");
          if ($this->user_model->isPlayed($id_user, $id_game) === NULL) {
            $this->form_validation->set_rules('user_game_id', 'Game ID', 'required');
            if ($this->form_validation->run() === FALSE) {
              $this->session->set_flashdata('warning', 'Lengkapi data');
              return redirect(base_url('game/'.$id_game));
            } else {
              $data = array(
                "id_user" => $id_user,
                "id_game" => $id_game,
                "user_game_id" => $this->input->post('user_game_id')
              );

              $this->user_model->create("game_players", $data);
              $this->session->set_flashdata('success', 'Berhasil');
              return redirect(base_url('game/'.$id_game));
            }
          } else {
            $this->session->set_flashdata('warning', 'Anda Sudah Bermain');
            return redirect(base_url('game/'.$id_game));
          }
        } else {
          return redirect(base_url('login'));
        }
      }

      
      public function forum($id)
      {
        $data["forum"] = $this->user_model->getForum($id);
        $this->isFound($data["forum"]);
        //var_dump($data["forum"]);
        $this->load->view('templates/userheader');
        $this->load->view('users/game/forum', $data);
        $this->load->view('templates/userfooter');
      }

      public function comment($data_param)
      {
        if ($this->isLogin()) {
          $username = $this->session->userdata("username");
          $comment = $this->input->post('comment');

          $data_comment = array(
            "id_forum" => $data_param,
            "username" => $username,
            "comment" => $comment
          );

          $this->user_model->comment($data_comment);
          
          $data_log = array(
            "id_user" => $this->session->userdata("id"),
            "activity" => "Berkomentar di forum ".$data_param
          );

          $this->saveLog($data_log);
          
          //redirect(base_url('game/forum/').$data_param);
          
        } else {
          redirect(base_url('login'));
        }
      }

      public function readComment($id_forum){
        $data = $this->user_model->getComment($id_forum);
        echo json_encode($data);
      }

  }