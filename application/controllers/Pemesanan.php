<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

  public function __construct()
    {
        parent::__construct();
        is_logged_in();
           $this->load->library('upload');
           $this->load->model('Model_pemesanan');
          $this->load->helper('short_number');
           $this->load->model('Model_menu');
           $this->load->model('Model_minuman');
           $this->load->model('Model_makanan');
    }
  public function edit_pemesanan($id)
    {
          $data['title'] = "Pemesanan";
      $data['menuminuman'] =$this->Model_minuman->get_category()->result();
            $data['menumakanan'] =$this->Model_makanan->get_category()->result();
          $data['status'] =$this->Model_menu->get_menu()->result();
      $kondisi = array('id' => $id );
      $data['data'] = $this->Model_menu->get_by_id($kondisi);
      return $this->load->view('pemesanan/edit_data_menu',$data,);
    }
  public function index()
  {
    $data['title'] = "Pemesanan";
    $data['konten'] = "Pemesanan";
    $data['isi'] = 'pemesanan/dtpemesanan';
    $data['data'] =$this->Model_menu->list_menu();
    $this->load->view('pemesanan/dtpemesanan', $data);
  }
  public function dtpesan()
  {
    $data['title'] = "Pesan";
    $data['konten'] = "Pesan";
    $data['isi'] = 'pemesanan/dtpesan';
    $data['data'] =$this->Model_pemesanan->list_pemesanan();
    $this->load->view('pemesanan/dtpesan', $data);
  }
  public function edit($id)
    {

          $data['title'] = "Menu";
                $data['menuminuman'] =$this->Model_minuman->get_category()->result();
                $data['menumakanan'] =$this->Model_makanan->get_category()->result();
          $data['status'] =$this->Model_menu->get_menu()->result();
      $kondisi = array('id' => $id );

      $data['data'] = $this->Model_pemesanan->get_by_id($kondisi);
      return $this->load->view('pemesanan/edit_pesanan',$data);
    }
    public function tambah()
    {
      $data['title'] = "Data Testimoni";
    $data['konten'] = "Data Testimoni";
    $data['isi'] = 'testimoni/dttestimoni';
      return $this->load->view('testimoni/tambahdata',$data);
    }
    public function insertdata()
    {
      $tanggal_pemesan   = $this->input->post('tanggal_pemesan');
      $kode_pemesanan   = $this->input->post('kode_pemesanan');
      $nama_pembeli = $this->input->post('nama_pembeli');
      $id_menu = $this->input->post('id_menu');
      $id_minuman = $this->input->post('id_minuman');      
      $id_makanan = $this->input->post('id_makanan');
      $no_hp = $this->input->post('no_hp');
      $status_order = $this->input->post('status_order');
      $jumlah_pemesanan = $this->input->post('jumlah_pemesanan');

      
              $data = array(
                            'tanggal_pemesan'       => $tanggal_pemesan,
                            'kode_pemesanan'       => $kode_pemesanan,
                            'nama_pembeli'       => $nama_pembeli,
                            'nama_pembeli'       => $nama_pembeli,
                            'id_menu'       => $id_menu,
                            'id_minuman'       => $id_minuman,
                            'id_makanan'       => $id_makanan,
                            'no_hp'       => $no_hp,
                            'status_order'       => $status_order,
                            'jumlah_pemesanan'       => $jumlah_pemesanan,
                          );
              $this->Model_pemesanan->insert($data);
              redirect('Pemesanan/dtpesan');
      
    }
    public function updatedata()
    {

      $id   = $this->input->post('id'); 
      $tanggal_pemesan   = $this->input->post('tanggal_pemesan');
      $kode_pemesanan   = $this->input->post('kode_pemesanan');
      $nama_pembeli = $this->input->post('nama_pembeli');
      $id_menu = $this->input->post('id_menu');
      $id_minuman = $this->input->post('id_minuman');
      $id_makanan = $this->input->post('id_makanan');
      $no_hp = $this->input->post('no_hp');
      $status_order = $this->input->post('status_order');
      $jumlah_pemesanan = $this->input->post('jumlah_pemesanan');

      $kondisi = array('id' => $id );

              $data = array(
                            'tanggal_pemesan'       => $tanggal_pemesan,
                            'kode_pemesanan'       => $kode_pemesanan,
                            'nama_pembeli'       => $nama_pembeli,
                            'id_menu'       => $id_menu,
                            'id_minuman'       => $id_minuman,
                            'id_makanan'       => $id_makanan,
                            'no_hp'       => $no_hp,
                            'status_order'       => $status_order,
                            'jumlah_pemesanan'       => $jumlah_pemesanan,
                            
                          );
            
              $this->Model_pemesanan->update($data,$kondisi);
              redirect('pemesanan/dtpesan');
          

  }
    public function deletedata($id = null)
      {
        $where = array('id' => $id);
        $this->Model_pemesanan->delete($where);
        return redirect('pemesanan/dtpesan');
      }

      
} 
