<?php

class Organism_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('organisms',$data);
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('organisms', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('organisms');
    }

    public function selectAll()
    {
        $query = $this->db->get('organisms');
        return $query->result_array();
    }

    public function selectByID($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('organisms');
        return $query->result_array();
    }

}