<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Minuman extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        is_logged_in();
           $this->load->library('upload');
           $this->load->model('Model_minuman');
    }

  public function index()
  {
    $data['title'] = "Minuman";
    $data['konten'] = "Minuaman";
    $data['isi'] = 'minuman/dtminuman';
    $data['data'] =$this->Model_minuman->list_minuman();
    $this->load->view('minuman/dtminuman', $data);
  }
  public function edit($id)
    {
          $data['title'] = "Minuman";
      $data['menuminuman'] =$this->Model_minuman->get_category()->result();
      $kondisi = array('id' => $id );
      $data['data'] = $this->Model_minuman->get_by_id($kondisi);
      return $this->load->view('minuman/edit_data',$data,);
    }
    public function tambah()
    {
      $data['title'] = "Minuman";
    $data['konten'] = "Minuman";
    $data['isi'] = 'Minuman/dtqurban';
      return $this->load->view('minuman/tambahdata',$data);
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
              $this->Model_minuman->insert($data);
              redirect('Minuman');

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

              $this->Model_minuman->update($data,$kondisi);
              redirect('Minuman');

  }

  public function deletedata($id)
  {

      $where = array('id' => $id );
      $this->Model_minuman->delete($where);
      return redirect('Minuman');
  }

} 
