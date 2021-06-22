<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('auth_model');
    }

    public function create(){
        $data['title'] = 'SIGN UP';

        $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
        $this->form_validation->set_rules('re_enter', 'Konformasi Password', 'required|matches[password]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('name', 'Nama', 'required');

        if($this->form_validation->run() === FALSE){      
            $this->load->view('auth/create');       
        }else{
            $password = password_hash($this->input->post('password'), PASSWORD_BCRYPT);
            $data = array(
                'id' => NULL,
                'username' => $this->input->post('username'),
                'password' => $password,
                'email' => $this->input->post('email'),
                'name' => $this->input->post('name'),
                'status' => 'AKTIF'
            );

            $this->auth_model->create('users', $data);
            return redirect('login');
        }
    }
  

    public function login(){
        $data['title'] = 'Login';

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('auth/login');
        }else{
            $username_check = $this->auth_model->check_username('users', $this->input->post('username'));
            if ($username_check) {
                $isPasswordTrue = password_verify($this->input->post('password'), $username_check->password);
                if ($isPasswordTrue) {
                    $session_user = array(
                        'id' => $username_check->id,
                        'username' => $this->input->post('username'),
                        'login_status' => TRUE
                    );
                    $this->session->set_userdata($session_user);
                    redirect(base_url('profile/'.$session_user["username"]));
                }else{
                    $this->session->set_userdata('msg', TRUE);
                    redirect(base_url('login'));
                }
            }else{
                $this->session->set_userdata('msg', TRUE);
                redirect(base_url('login'));
            }
        }
  }

  public function loginAdmin(){
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('auth/loginadmin');
    }else{
      $username_check = $this->auth_model->check_username('admin', $this->input->post('username'));
      if ($username_check) {
        $isPasswordTrue = password_verify($this->input->post('password'), $username_check->password);
        if ($isPasswordTrue) {
          $session_user = array(
            'id' => $username_check->id,
            'username' => $this->input->post('username'),
            'login_status' => TRUE,
            'admin' => TRUE
          );
          $this->session->set_userdata($session_user);
          redirect(base_url('adminhome'));
        }else{
          $this->session->set_userdata('msg', TRUE);
          redirect(base_url('loginadmin'));
        }
      }else{
        $this->session->set_userdata('msg', TRUE);
        redirect(base_url('loginadmin'));
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect(base_url('home'));
  }

  public function logoutadmin()
  {
    $this->session->sess_destroy();
    redirect(base_url('loginadmin'));
  }
}