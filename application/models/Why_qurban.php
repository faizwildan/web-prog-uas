<?php
/**
 *
 */
class Why_qurban extends CI_Model
{

  public function list_whyqurban()
  {
      $this->db->from('tbl_whyqurban');
      $query = $this->db->get();
      return $query->result();
  }


  public function get_by_id($kondisi)
  {
      $this->db->from('tbl_whyqurban');
      $this->db->where($kondisi);
      $query = $this->db->get();
      return $query->row();
  }

  public function insert($data)
  {
      $this->db->insert('tbl_whyqurban',$data);
      return TRUE;
  }
  public function update($data,$kondisi)
  {
      $this->db->update('tbl_whyqurban',$data,$kondisi);
      return TRUE;
  }

  public function delete($where)
  {
      $this->db->where($where);
      $this->db->delete('tbl_whyqurban');
      return TRUE;
  }

}
