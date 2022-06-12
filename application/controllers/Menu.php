<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        is_logged_in();
           $this->load->library('upload');
           $this->load->model('Model_menu');
           $this->load->model('Model_minuman');
           $this->load->model('Model_makanan');
    }

  public function index()
  {
    $data['title'] = "Menu";
    $data['konten'] = "Menu";
    $data['isi'] = 'menu/dtmenu';
    $data['data'] =$this->Model_menu->list_menu();
    $this->load->view('menu/dtmenu', $data);
  }
  public function edit($id)
    {
          $data['title'] = "Menu";
      $data['menuminuman'] =$this->Model_minuman->get_category()->result();
      $data['menumakanan'] =$this->Model_makanan->get_category()->result();
          $data['status'] =$this->Model_menu->get_menu()->result();
      $kondisi = array('id' => $id );
      $data['data'] = $this->Model_menu->get_by_id($kondisi);
      return $this->load->view('Menu/edit_data',$data,);
    }
    public function tambah()
    {
      $data['title'] = "Menu";
    $data['konten'] = "Menu";
    $data['isi'] = 'Menu/dtminuman';
    $data['menumakanan'] =$this->Model_makanan->get_category()->result();
    $data['menuminuman'] =$this->Model_minuman->get_category()->result();
      return $this->load->view('Menu/tambahdata',$data);
    }
      public function insertdata()
    {
      $kode_menu   = $this->input->post('kode_menu');
      $nama_menu   = $this->input->post('nama_menu');
      $harga_menu = $this->input->post('harga_menu');
      $status_menu = $this->input->post('status_menu');
      $id_minuman = $this->input->post('id_minuman');
      $id_makanan = $this->input->post('id_makanan');
      // get foto
      $config['upload_path'] = './assets/picture';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['fotopost']['name'];

      $this->upload->initialize($config);

      if (!empty($_FILES['fotopost']['name'])) {
          if ( $this->upload->do_upload('fotopost') ) {
              $foto = $this->upload->data();
              $data = array(
                            'kode_menu'       => $kode_menu,
                            'nama_menu'       => $nama_menu,
                            'harga_menu'       => $harga_menu,
                            'status_menu'       => $status_menu,
                            'id_minuman'       => $id_minuman,
                            'foto'       => $foto['file_name'],
                          );
              $this->Model_menu->insert($data);
              redirect('Menu');
          }else {
              die("gagal upload");
          }
      }else {
        echo "tidak masuk";
      }

    }
    
    public function updatedata()
    {
      $id   = $this->input->post('id');
      $kode_menu   = $this->input->post('kode_menu');
      $nama_menu   = $this->input->post('nama_menu');
      $harga_menu   = $this->input->post('harga_menu');
      $status_menu = $this->input->post('status_menu');
      $id_minuman = $this->input->post('id_minuman');
      $id_makanan = $this->input->post('id_makanan');

      $path = './assets/picture';

      $kondisi = array('id' => $id );

      // get foto
      $config['upload_path'] = './assets/picture';
      $config['allowed_types'] = 'jpg|png|jpeg|gif';
      $config['max_size'] = '2048';  //2MB max
      $config['max_width'] = '4480'; // pixel
      $config['max_height'] = '4480'; // pixel
      $config['file_name'] = $_FILES['fotopost']['name'];

      $this->upload->initialize($config);

      if (!empty($_FILES['fotopost']['name'])) {
          if ( $this->upload->do_upload('fotopost') ) {
              $foto = $this->upload->data();
              $data = array(

                            'kode_menu'       => $kode_menu,
                            'nama_menu'       => $nama_menu,
                            'harga_menu'       => $harga_menu,
                            'status_menu'       => $status_menu,
                            'id_minuman'       => $id_minuman,                            
                            'id_makanan'       => $id_makanan,
                            'foto'       => $foto['file_name'],
                            
                          );
              // hapus foto pada direktori
              @unlink($path.$this->input->post('filelama'));

              $this->Model_menu->update($data,$kondisi);
              redirect('Menu');
          }else {
              die("gagal update");
          }
      }else {
        echo "tidak masuk";
      }

  }

  public function deletedata($id)
  {
      $path = './assets/picture/';
      @unlink($path.$foto);

      $where = array('id' => $id );
      $this->Model_menu->delete($where);
      return redirect('Menu');
  }

} 