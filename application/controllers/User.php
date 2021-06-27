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

      public function profile($username)
      {
        $data["user"] = $this->user_model->getUser($username);
        $this->isFound($data["user"]);
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

              $this->user_model->updateUser($data_update, $username);
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

      public function gameDetail()
      {

      }


  }