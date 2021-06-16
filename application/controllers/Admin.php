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

    public function games()
    {
        $data["games"] = $this->admin_model->games();
        $page['title'] = 'Admin Games';

        $this->load->view('templates/adminheader', $page);
        $this->load->view('admin/games', $data);
        $this->load->view('templates/adminfooter');
    }

    public function publisher()
    {
      $page['title'] = 'Admin Publisher';
      $data["publishers"] = $this->admin_model->publishers();
      $this->load->view('templates/adminheader', $page);
      $this->load->view('admin/publisher', $data);
      $this->load->view('templates/adminfooter');
    }

    public function createPublisher()
    {
      $page['title'] = 'Tambah Publisher';
      $this->load->view('templates/adminheader', $page);
      $this->load->view('admin/publishercreate');
      $this->load->view('templates/adminfooter');
    }

    public function storePublisher()
    {
      $this->form_validation->set_rules('name', 'Nama', 'required|min_length[5]');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[20]');

      if ($this->form_validation->run() === FALSE) {
        $page['title'] = 'Tambah Publisher';
        $this->load->view('templates/adminheader', $page);
        $this->load->view('admin/publishercreate');
        $this->load->view('templates/adminfooter');
      } else {
        $publisher = array (
          'id' => NULL,
          'name' => $this->input->post('name'),
          'description' => $this->input->post('deskripsi'),
          'country' => $this->input->post('country'),
          'cover' => 'dummy.jpg'
        );

        $cover = $this->uploadImage('cover');
        if ($cover) {
          $publisher["cover"] = $cover["upload_data"]["file_name"];
        }

        $this->admin_model->create('game_publisher', $publisher);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect(base_url('management/publishers/create'));
      }
    }

    public function editPublisher($id)
    {
      $this->form_validation->set_rules('name', 'Nama', 'required|min_length[5]');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[20]');

      if ($this->form_validation->run() === FALSE) {
        $page['title'] = 'Tambah Publisher';
        $data["publisher"] = $this->admin_model->show('game_publisher', $id);
        $this->load->view('templates/adminheader', $page);
        $this->load->view('admin/publisheredit', $data);
        $this->load->view('templates/adminfooter');
      } else {
        $id = $this->input->post('id');
        $data_update = array(
          'name' => $this->input->post('name'),
          'description' => $this->input->post('deskripsi'),
          'country' => $this->input->post('country'),
          'cover' => ''
        );

        $old_cover = $this->input->post('old_cover');

        if ($this->input->post('del_cover') == 1) {
          $path = FCPATH."asset/src/images/".$old_cover;
          unlink($path);
        }

        $cover = $this->uploadImage('cover');

        if ($cover) {
           $data_update['cover'] = $cover['upload_data']['file_name'];
           if ($old_cover != NULL) {
             $path = FCPATH."asset/src/images/".$old_cover;
             unlink($path);
           }
        }
        
        $this->admin_model->updateData('game_publisher', $data_update, $id);
        $this->session->set_flashdata('success', 'Berhasil diupdate');
        return redirect(base_url('management/publishers'));

      }
    }

    public function deletePublisher($id)
    {
      $data = $this->admin_model->show('game_publisher', $id);
      $img = $data->cover; 
      $path = FCPATH."asset/src/images/".$data->cover;

      if ($query = $this->admin_model->del('game_publisher', $id)) {
        if ($img != "dummy.jpg") unlink($path);
        $this->session->set_flashdata('success', 'Berhasil dihapus');
      } else {
        $this->session->set_flashdata('danger', 'Gagal dihapus');
      }
      
      return redirect(base_url('management/publishers'));
    }

  }