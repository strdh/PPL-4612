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

      public function profile($id){
        // $data['profile'] = $this->user_model->getProfile($id);
        // if(!$data['profile']) redirect(base_url('err'));
        // $data['posts'] = $this->user_model->read('posts', 'id_user', $id);
        // $data['owner'] = ($id == $this->session->userdata('id') && !$this->session->userdata('admin')) ? TRUE : FALSE;
        // $title['title'] = 'Profile';

        //$this->load->view('templates/header', $title);
        $this->load->view('users/profile');
        //$this->load->view('templates/footer');
      }

      public function home()
      {
        $data['games'] = $this->user_model->games();
        $this->load->view('templates/userheader');
        $this->load->view('users/index', $data);
        $this->load->view('templates/userfooter');
      }
  }