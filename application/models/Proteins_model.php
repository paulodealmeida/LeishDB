<?php

class Proteins_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function insert($data)
    {
        return $this->db->insert('proteins', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('proteins', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('proteins');
    }

    public function selectAll()
    {
        $query = $this->db->get('proteins');
        return $query;
    }

    public function selectByID($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('proteins');
        return $query->result_array();
    }

    public function selectAllGoTermsByID($id)
    {
        $sql = "select * from proteinsgo as pgo where pgo.protein_id LIKE '%" . $this->db->escape_like_str($id) . "%'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectAllGoTermsByType($id, $type)
    {
        $sql = "select pgo.*, go.* from proteinsgo as pgo, geneontology as go where TRIM(go.id) = TRIM(pgo.geneontology_id) and 
                pgo.protein_id LIKE '%" . $this->db->escape_like_str($id) . "%' and go.type LIKE '%" .
                $this->db->escape_like_str($type) . "%'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectDatabasesByID($id)
    {
        $sql = "select c.*,d.* from crossreference as c
		left join `databases` as d on c.database_id = d.id where  c.protein_id = '{$this->db->escape_like_str($id)}'";
        $query = $this->db->query($sql);

        return $query->result_array();
    }

    public function selectPublicationsByID($id)
    {
        $sql = "select p.* from publications as p where  p.protein_id LIKE '%{$this->db->escape_like_str($id)}%'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
