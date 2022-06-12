<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_model extends CI_Model
{
    protected string $table = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function all()
    {
        $sql = $this->db->get($this->table);
        return $sql->result();
    }

    public function select(...$args): Main_model
    {
        $this->db->select($args);
        return $this;
    }

    public function orderBy($columnName, $orderType = 'asc'): Main_model
    {
        $this->db->order_by($columnName, $orderType);
        return $this;
    }

    public function limit($limit, $start)
    {
        $this->db->limit($limit, $start);
        return $this;
    }

    public function findById($id, $columnName = 'id')
    {
        $sql = $this->db->get_where($this->table, [
            $columnName => $id
        ]);
        return $sql->row();
    }

    public function getBy($column, $value, $all = FALSE)
    {
        if (is_array($column) && is_bool($value)) {
            $sql = $this->db->select('*')->from($this->table)->where($column)->get();
        } else if (is_string($column) && is_string($value)) {
            $sql = $this->db->select('*')->from($this->table)->where($column, $value)->get();
        }

        if ($all != FALSE || (is_bool($value) && $value == true)) {
            return $sql->result();
        }
        return $sql->row();

    }

    public function insert($data = [], $batch = FALSE)
    {
        if ($batch) {
            $insert = $this->db->insert_batch($this->table, $data);
        } else {
            $insert = $this->db->insert($this->table, $data);
        }
        return $insert;
    }

    public function update($data = [], $where = [])
    {
        $column = array_keys($where)[0];
        $value = array_values($where)[0];
        return $this->db->where($column, $value)->update($this->table, $data);
    }

    public function delete($where = [])
    {
        $column = array_keys($where)[0];
        $value = array_values($where)[0];
        return $this->db->where($column, $value)->delete($this->table);
    }

    public function count()
    {
        $sql = $this->db->get($this->table);
        return $sql->num_rows();
    }

    public function first()
    {
        return $this->db->limit(1)->get($this->table)->row();
    }

    public function get($rows)
    {
        $sql = $this->db->limit($rows)->get($this->table);
        return $sql->result();
    }

    public function getLastInsertID()
    {
        return $this->db->insert_id();
    }

    public function rawQuery($query)
    {
        return $this->db->query($query);
    }
}