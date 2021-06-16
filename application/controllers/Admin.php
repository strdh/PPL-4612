<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Admin extends CI_Controller{
    public function __construct()
    {
      parent:: __construct();

      $this->load->model('admin_model');
      if ($this->session->userdata('admin') === NULL) {
        redirect(base_url('loginadmin'));
      }
    }

    public function home()
    {
      $page['title'] = 'Admin Home';

      $this->load->view('templates/adminheader', $page);
      $this->load->view('admin/home');
      $this->load->view('templates/adminfooter');
    }

    public function games()
    {
        $data["games"] = $this->admin_model->games();
        $page['title'] = 'Admin Games';

        $this->load->view('templates/adminheader', $page);
        $this->load->view('admin/games', $data);
        $this->load->view('templates/adminfooter');
    }

  }