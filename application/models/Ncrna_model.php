<?php

class Ncrna_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('ncrna',$data);
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('ncrna', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('ncrna');
    }

    public function selectAll()
    {
        $sql = "select * from ncrna as rna ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectByID($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('ncrna');
        return $query->result_array();
    }

    public function selectByType($type)
    {
        $this->db->like('LOWER(type)', strtolower($type),'both');
        $query = $this->db->get('ncrna');
        return $query->result_array();
    }

    public function selectByEverything($query)
    {
        $sql = "select * from ncrna as rna where UPPER(rna.type) LIKE UPPER('%" . $this->db->escape_like_str($query) . "%') or " .
        " UPPER(rna.family) LIKE UPPER('%" . $this->db->escape_like_str($query) . "%') ".
        " or rna.id = '" . $this->db->escape_like_str($query). "' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectByCoordinates($chromosomeid, $start, $end)
    {
        $sql = "select rna.* from ncrna as rna where rna.chromosomeid = {$this->db->escape_like_str($chromosomeid)}"
      . ($start > 0 && $end >0 ? " AND (rna.start >= {$this->db->escape_like_str($start)} AND rna.end <=
       {$this->db->escape_like_int($end)})" : "");
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function countncRNA()
    {
        $sql = "select count(*) as count from ncrna";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}