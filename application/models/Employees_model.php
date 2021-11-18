<?php

class Employees_model extends CI_Model
{
    //menampilkan data
    public function getAll()
    {
        $this->db->select('employees.*, departement');
        $this->db->from('employees');
        $this->db->join('departement', 'departement.id = employees.departement_id');
        return $this->db->get()->result();
    }

    //menampilkan data
    public function get($id)
    {
        $this->db->where('ID', $id);
        return $this->db->get('employees')->row_array();
    }

    //insert data
    public function add($parameter)
    {
        $this->db->insert('employees', $parameter);
    }

    //update data
    public function update($ID, $parameter)
    {
        $this->db->where('ID', $ID);
        $this->db->update('employees', $parameter);
    }

    //delete data
    public function delete($ID)
    {
        $this->db->where('ID', $ID);
        $this->db->delete('employees');
    }
}
