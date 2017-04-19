<?php

class Databases_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function insert($data)
    {
        return $this->db->insert('databases', $data);
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('databases', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('databases');
    }

    public function selectAll()
    {
        $query = $this->db->get('databases');
        return $query;
    }

    public function selectByID($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('databases');
        return $query->result_array();
    }

    public function selectDatabasesByProteinID($protein_id)
    {
        $sql = "select c.*,d.* from crossreference as c	left join `databases` as d on c.database_id = d.id where  
          c.protein_id = '{$this->db->escape_like_str($protein_id)}' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectDatabasesByGeneID($gene_id)
    {
        $sql = "select c.*,d.* from crossreference as c left join `databases` as d on c.database_id = d.id where  
          c.gene_id = '{$this->db->escape_like_str($gene_id)}' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}
