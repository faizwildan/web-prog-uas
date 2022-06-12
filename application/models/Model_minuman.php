<?php
/**
 *
 */
class Model_minuman extends CI_Model
{

  public function list_minuman()
  {
      $this->db->from('minuman');
      $query = $this->db->get();
      return $query->result();
  }


  public function get_by_id($kondisi)
  {
      $this->db->from('minuman');
      $this->db->where($kondisi);
      $query = $this->db->get();
      return $query->row();
  }

  public function insert($data)
  {
      $this->db->insert('minuman',$data);
      return TRUE;
  }
  public function update($data,$kondisi)
  {
      $this->db->update('minuman',$data,$kondisi);
      return TRUE;
  }

  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('minuman');
      return TRUE;
  }
  // function list_menu(){
  //        $this->db->order_by('id', 'ASC');
  //       return $this->db->from('menu')
  //         ->join('id', 'minuman.id=menu.id')
  //         ->get()
  //         ->result();
  //   }
  function get_category(){
        $query = $this->db->get('minuman');
        return $query;  
    }
}
