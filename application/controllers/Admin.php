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
      $data = array(
        "games" => $this->admin_model->getNumRows("games"),
        "publisher" => $this->admin_model->getNumRows("game_publisher"),
        "category" => $this->admin_model->getNumRows("game_categories"),
        "users" => $this->admin_model->getNumRows("users"),
        "forums" => $this->admin_model->getNumRows("forums"),
        "comments" => $this->admin_model->getNumRows("forum_comments")
      );

      $this->load->view('templates/adminheader', $page);
      $this->load->view('admin/index', $data);
      $this->load->view('templates/adminfooter');
    }

     public function notFound()
      {
         $this->load->view('errors/404');
      }

      public function isFound($param)
      {
        if ($param == NULL) return redirect(base_url("notfound"));
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
        $this->load->view('admin/game/games', $data);
        $this->load->view('templates/adminfooter');
    }

    public function storeGame()
    {
      $this->form_validation->set_rules('title', 'Judul', 'required|min_length[5]');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[20]');
      $this->form_validation->set_rules('release_date', 'Tanggal Rilis', 'required');
      $this->form_validation->set_rules('categories[]', 'Kategori', 'required');

      if ($this->form_validation->run() === FALSE) {
        $page["title"] = "Games";
        $data["publishers"] = $this->admin_model->publishers();
        $categories = $this->admin_model->categories();
        $name_cat = array();
        foreach ($categories as $cat) {
          array_push($name_cat, $cat["name"]);
        }

        $data["categories"] = $name_cat;

        $this->load->view('templates/adminheader', $page);
        $this->load->view('admin/game/gamecreate', $data);
        $this->load->view('templates/adminfooter');
      } else {
        $game = array(
          'title' => html_escape($this->input->post('title')),
          'description' => $this->input->post('deskripsi'),
          'release_date' => $this->input->post('release_date'),
          'categories' => implode(" ", $this->input->post('categories')),
          'difficulty' => $this->input->post('difficulty'),
          'publisher_id' => $this->input->post('publisher_id'),
          'rating_age' => $this->input->post('rating_age'),
          'ratings' => 0,
          'cover' => NULL
        );

        $cover = $this->uploadImage('cover');

        if ($cover) {
          $game["cover"] = $cover["upload_data"]["file_name"];
        }

        $this->admin_model->create('games', $game);
        $this->session->set_flashdata('success', 'Berhasil disimpan');
        redirect(base_url('management/games/store'));
      }
    }

    public function editGame($id)
    {
      $this->form_validation->set_rules('title', 'Judul', 'required|min_length[5]');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[20]');
      $this->form_validation->set_rules('release_date', 'Tanggal Rilis', 'required');
      $this->form_validation->set_rules('categories[]', 'Kategori', 'required');

      if ($this->form_validation->run() === FALSE) {
        $page["title"] = "Games";
        $data["game"] = $this->admin_model->show("games", $id);
        $this->isFound($data["game"]);
        $data["publishers"] = $this->admin_model->publishers();
        $categories = $this->admin_model->categories();
        $name_cat = array();
        foreach ($categories as $cat) {
          array_push($name_cat, $cat["name"]);
        }

        $data["categories"] = $name_cat;

        $this->load->view('templates/adminheader', $page);
        $this->load->view('admin/game/gameedit', $data);
        $this->load->view('templates/adminfooter');
      } else {
        $old_cover = $this->input->post('old_cover');
        $data_update = array(
          'title' => html_escape($this->input->post('title')),
          'description' => $this->input->post('deskripsi'),
          'release_date' => $this->input->post('release_date'),
          'categories' => implode(" ", $this->input->post('categories')),
          'difficulty' => $this->input->post('difficulty'),
          'publisher_id' => $this->input->post('publisher_id'),
          'rating_age' => $this->input->post('rating_age'),
          'cover' => $this->input->post('old_cover')
        );

        if ($this->input->post('del_cover') == 'on') {
          $path = FCPATH."asset/src/images/".$old_cover;
          unlink($path);
          $data_update["cover"] = NULL;
        }

        $cover = $this->uploadImage('cover');

        if ($cover) {
           $data_update['cover'] = $cover['upload_data']['file_name'];
           if ($old_cover != NULL) {
             $path = FCPATH."asset/src/images/".$old_cover;
             unlink($path);
           }
        }
        
        $this->admin_model->updateData('games', $data_update, $id);
        $this->session->set_flashdata('success', 'Berhasil diupdate');
        return redirect(base_url('management/games'));

      }
    }

    public function deleteGame($id)
    {
      $data = $this->admin_model->show('games', $id);
      $img = $data->cover; 
      $path = FCPATH."asset/src/images/".$data->cover;

      if ($query = $this->admin_model->del('games', $id)) {
        if ($img != "dummy.jpg") unlink($path);
        $this->session->set_flashdata('success', 'Berhasil dihapus');
      } else {
        $this->session->set_flashdata('danger', 'Gagal dihapus');
      }

      return redirect(base_url('management/games'));
    }

    public function publishers()
    {
      $page['title'] = 'Admin Publisher';
      $data["publishers"] = $this->admin_model->publishers();
      $this->load->view('templates/adminheader', $page);
      $this->load->view('admin/publisher/publishers', $data);
      $this->load->view('templates/adminfooter');
    }

    public function createPublisher()
    {
      $page['title'] = 'Tambah Publisher';
      $this->load->view('templates/adminheader', $page);
      $this->load->view('admin/publisher/publishercreate');
      $this->load->view('templates/adminfooter');
    }

    public function storePublisher()
    {
      $this->form_validation->set_rules('name', 'Nama', 'required|min_length[5]');
      $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|min_length[20]');

      if ($this->form_validation->run() === FALSE) {
        $page['title'] = 'Tambah Publisher';
        $this->load->view('templates/adminheader', $page);
        $this->load->view('admin/publisher/publishercreate');
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
        $this->isFound($data["publisher"]);
        $this->load->view('templates/adminheader', $page);
        $this->load->view('admin/publisher/publisheredit', $data);
        $this->load->view('templates/adminfooter');
      } else {
        $id = $this->input->post('id');
        $old_cover = $this->input->post('old_cover');
        $data_update = array(
          'name' => $this->input->post('name'),
          'description' => $this->input->post('deskripsi'),
          'country' => $this->input->post('country'),
          'cover' => $old_cover
        );

        if ($this->input->post('del_cover') == 'on') {
          $path = FCPATH."asset/src/images/".$old_cover;
          unlink($path);
          $data_update["cover"] = "";
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

    public function categories()
    {
      $page["title"] = "Kategori";
      $data["categories"] = $this->admin_model->categories();
      $this->load->view('templates/adminheader', $page);
      $this->load->view('admin/category/categories', $data);
      $this->load->view('templates/adminfooter');
    }

    public function storeCategories()
    {
       $this->form_validation->set_rules('name', 'Nama', 'required|min_length[3]');

       if ($this->form_validation->run() === FALSE) {
          $page["title"] = "Kategori";
          $this->load->view('templates/adminheader', $page);
          $this->load->view('admin/category/categoriescreate');
          $this->load->view('templates/adminfooter');
       } else {
          $data = array("name" => html_escape($this->input->post('name')));
          $query = $this->admin_model->create('game_categories', $data);
          $this->session->set_flashdata('success', 'Berhasil ditambahkan');
          return redirect(base_url('management/categories/store'));
       }
    }

    public function editCategories($id)
    {
      $this->form_validation->set_rules('name', 'Nama', 'required|min_length[3]');
      if ($this->form_validation->run() === FALSE) {
          $page["title"] = "Kategori";
          $data["category"] = $this->admin_model->show("game_categories", $id);
          $this->load->view('templates/adminheader', $page);
          $this->load->view('admin/category/categoriesedit', $data);
          $this->load->view('templates/adminfooter');
       } else {
          $data = array("name" => html_escape($this->input->post('name')));
          $query = $this->admin_model->updateData('game_categories', $data, $id);
          $this->session->set_flashdata('success', 'Berhasil diupdate');
          return redirect(base_url('management/categories'));
       }
    }

    public function deleteCategories($id)
    {
      $this->admin_model->del('game_categories', $id);
      $this->session->set_flashdata('success', 'Berhasil dihapus');
      return redirect(base_url('management/categories'));
    }

    public function users()
    {
      $page["title"] = "User";
      $data["users"] = $this->admin_model->users();
      $this->load->view('templates/adminheader', $page);
      $this->load->view('admin/user/user', $data);
      $this->load->view('templates/adminfooter');
    }

    public function userDetail($id)
    {

    }

    public function userLogs($id)
    {
      $page["title"] = "User Logs";
      $data["logs"] = $this->admin_model->getUserLogs($id);
      //$this->isFound($data["logs"]);
      $this->load->view('templates/adminheader', $page);
      $this->load->view('admin/user/log', $data);
      $this->load->view('templates/adminfooter');
    }

    public function isBlock($id)
    {
      $user = $this->admin_model->show("users", $id);
      return ($user->status == "NONAKTIF") ? 1 : 0;
    }

    public function blockUser($id)
    {
      if ($this->isBlock($id) == 0)
      $this->admin_model->updateData("users", array("status" => "NONAKTIF"), $id);
      $this->session->set_flashdata('success', 'User '.$id." Di Blokir");
      return redirect(base_url('management/users'));
    }

    public function unblockUser($id)
    {
      if ($this->isBlock($id) == 1)
      $this->admin_model->updateData("users", array("status" => "AKTIF"), $id);
      $this->session->set_flashdata('success', 'User '.$id." Di Pulihkan");
      return redirect(base_url('management/users'));
    }

    public function forums()
    {
      $page["title"] = "User";
      $data["forums"] = $this->admin_model->forums();
      $this->load->view('templates/adminheader', $page);
      $this->load->view('admin/forum/forums', $data);
      $this->load->view('templates/adminfooter');
    }

    public function storeForum()
    {
       $this->form_validation->set_rules('game_id', 'ID Game', 'required');

       if ($this->form_validation->run() === FALSE) {
          $page["title"] = "Kategori";
          $data["games"] = $this->admin_model->games();
          $this->load->view('templates/adminheader', $page);
          $this->load->view('admin/forum/forumcreate', $data);
          $this->load->view('templates/adminfooter');
       } else {
          $data_temp = explode(",", $this->input->post('game_id'));
          $data = array(
            "name" => $data_temp[1],
            "game_id" => $data_temp[0]
          );
          $query = $this->admin_model->create('forums', $data);
          $this->session->set_flashdata('success', 'Berhasil ditambahkan');
          return redirect(base_url('management/forums/store'));
       }
    }

    public function deleteForum($id)
    {
      $this->admin_model->del('forums', $id);
      $this->session->set_flashdata('success', 'Berhasil dihapus');
      return redirect(base_url('management/forums'));
    }


  }
