<?php
/**
 *
 */
class Model_makanan extends CI_Model
{

  public function list_makanan()
  {
      $this->db->from('makanan');
      $query = $this->db->get();
      return $query->result();
  }


  public function get_by_id($kondisi)
  {
      $this->db->from('makanan');
      $this->db->where($kondisi);
      $query = $this->db->get();
      return $query->row();
  }

  public function insert($data)
  {
      $this->db->insert('makanan',$data);
      return TRUE;
  }
  public function update($data,$kondisi)
  {
      $this->db->update('makanan',$data,$kondisi);
      return TRUE;
  }

  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('makanan');
      return TRUE;
  }
  // function list_menu(){
  //        $this->db->order_by('id', 'ASC');
  //       return $this->db->from('menu')
  //         ->join('id', 'makanan.id=menu.id')
  //         ->get()
  //         ->result();
  //   }
  function get_category(){
        $query = $this->db->get('makanan');
        return $query;  
    }
}
