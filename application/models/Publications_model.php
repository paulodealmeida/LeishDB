<?php

class Publications_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function insert($data)
    {
        return $this->db->insert('publications', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('publications', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('publications');
    }

    public function selectAll()
    {
        $query = $this->db->get('publications');
        return $query;
    }

    public function selectByID($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('publications');
        return $query->result_array();
    }

    public function selectByProteinID($protein_id)
    {
        $this->db->where('protein_id', $protein_id);
        $query = $this->db->get('publications');
        return $query->result_array();
    }

}
