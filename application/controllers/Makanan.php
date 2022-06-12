<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Makanan extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        is_logged_in();
           $this->load->library('upload');
           $this->load->model('Model_makanan');
    }

  public function index()
  {
    $data['title'] = "Makanan";
    $data['konten'] = "Makanan";
    $data['isi'] = 'makanan/dtmakanan';
    $data['data'] =$this->Model_makanan->list_makanan();
    $this->load->view('makanan/dtmakanan', $data);
  }
  public function edit($id)
    {
          $data['title'] = "Makanan";
      $data['menumakanan'] =$this->Model_makanan->get_category()->result();
      $kondisi = array('id' => $id );
      $data['data'] = $this->Model_makanan->get_by_id($kondisi);
      return $this->load->view('makanan/edit_data',$data,);
    }
    public function tambah()
    {
      $data['title'] = "Makanan";
    $data['konten'] = "Makanan";
    $data['isi'] = 'makanan/dtmakanan';
      return $this->load->view('makanan/tambahdata',$data);
    }
    public function insertdata()
    {
      $nama_kategori   = $this->input->post('nama_kategori');
      $jenis_kategori   = $this->input->post('jenis_kategori');
      $stok   = $this->input->post('stok');
      
              $data = array(
                            'nama_kategori'       => $nama_kategori,
                            'jenis_kategori'       => $jenis_kategori,
                            'stok'       => $stok,
                            
                          );
              $this->Model_makanan->insert($data);
              redirect('Makanan');

    }
    public function updatedata()
    {
      $id   = $this->input->post('id');
      $nama_kategori   = $this->input->post('nama_kategori');
      $jenis_kategori   = $this->input->post('jenis_kategori');
      $stok   = $this->input->post('stok');
      
      $kondisi = array('id' => $id );

              $data = array(
                            'nama_kategori'       => $nama_kategori,
                            'jenis_kategori'       => $jenis_kategori,
                            'stok'       => $stok,
                            
                          );

              $this->Model_makanan->update($data,$kondisi);
              redirect('Makanan');

  }

  public function deletedata($id)
  {

      $where = array('id' => $id );
      $this->Model_makanan->delete($where);
      return redirect('Makanan');
  }

} 
