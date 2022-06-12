<?php
/**
 *
 */
class Model_menu extends CI_Model
{

  public function list_menu()
  {
      $this->db->from('menu');
      $query = $this->db->get();
      return $query->result();
  }


  public function get_by_id($kondisi)
  {
      $this->db->from('menu');
      $this->db->where($kondisi);
      $query = $this->db->get();
      return $query->row();
  }

  public function insert($data)
  {
      $this->db->insert('menu',$data);
      return TRUE;
  }
  public function update($data,$kondisi)
  {
      $this->db->update('menu',$data,$kondisi);
      return TRUE;
  }

  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('menu');
      return TRUE;
  }
  // function list_menu(){
  //        $this->db->order_by('id', 'ASC');
  //       return $this->db->from('menu')
  //         ->join('id', 'kategori.id=menu.id')
  //         ->get()
  //         ->result();
  //   }
  function get_menu(){
        $query = $this->db->get('menu');
        return $query;  
    }
}
