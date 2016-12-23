<?php

class Databases_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('databases',$data);
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('databases', $data);
    }

    public function delete($id) {
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

    public function selectDatabasesByProteinID($proteinid)
    {
        $sql = "select c.*,d.* from crossreference as c	left join `databases` as d on c.databaseid = d.id where  
          c.proteinid = '{$this->db->escape_like_str($proteinid)}' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectDatabasesByGeneID($geneid)
    {
        $sql = "select c.*,d.* from crossreference as c left join `databases` as d on c.databaseid = d.id where  
          c.geneid = '{$this->db->escape_like_str($geneid)}' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

}