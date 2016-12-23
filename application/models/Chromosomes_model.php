<?php

class Chromosomes_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('chromosomes',$data);
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('chromosomes', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('chromosomes');
    }

    public function selectAll()
    {
        $query = $this->db->get('chromosomes');
        return $query;
    }

    public function selectByID($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('chromosomes');
        return $query->result_array();
    }

    public function selectByOrganismID($id)
    {
        $this->db->where('organismid', $id);
        $this->db->order_by('number', "asc");
        $query = $this->db->get('chromosomes');
        return $query->result_array();
    }
    
    public function getSequence($chromosomeid, $start, $end)
    {
        $sql = "SELECT SUBSTRING(chromosomes.sequence FROM {$this->db->escape_like_str($start)} FOR 
          ({$this->db->escape_like_str($end)}-{$this->db->escape_like_str($start)})) as sequence
          FROM chromosomes WHERE chromosomes.id = {$this->db->escape_like_str($chromosomeid)}" ;

        $query = $this->db->query($sql);
        return $query->result_array();
    }

}