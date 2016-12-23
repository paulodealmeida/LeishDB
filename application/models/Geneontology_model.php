<?php

class Geneontology_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('geneontology',$data);
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('geneontology', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('geneontology');
    }

    public function selectAll()
    {
        $query = $this->db->get('geneontology');
        return $query;
    }

    public function selectByID($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('geneontology');
        return $query->result_array();
    }

}