<?php

class Genes_model extends CI_Model
{
    public function __construct()	{
        $this->load->database();
    }

    public function insert($data) {
        return $this->db->insert('genes',$data);
    }

    public function update($id,$data) {
        $this->db->where('id', $id);
        return $this->db->update('genes', $data);
    }

    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('genes');
    }

    public function selectAll()
    {
        $sql = "select g.*, p.entryname, p.proteinname, p.genename, p.organism, p.taxonomiclineage, 
                    p.proteinfamily from genes as g left join proteins as p" . " on (g.proteinid = p.id) 
                 ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectByID($id)
    {
        $sql = "select g.*, p.entryname, p.proteinname, p.genename, p.organism, p.taxonomiclineage, 
                    p.proteinfamily from genes as g left join proteins as p" . " on (g.proteinid = p.id) 
                    where  g.id = {$this->db->escape_like_str($id)} ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectGenesByCoordinates($chromosomeid, $start, $end)
    {
        $sql = "select g.*,p.entryname, p.proteinname, p.genename, p.organism, p.proteinfamily from genes as g left join 
        proteins as p on (g.proteinid = p.id) where g.chromosomeid = {$this->db->escape_like_str($chromosomeid)}" . ($start > 0 or
        $end >0 ? " AND (g.start >= {$this->db->escape_like_str($start)} AND g.end <= {$this->db->escape_like_str($end)})" : "") ;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectByEverything($term)
    {
        $sql = "select g.*,p.entryname, p.proteinname, p.genename, p.organism,
        
        p.proteinfamily from genes as g left join proteins as p" .

            " on (g.proteinid = p.id) where UPPER(p.proteinname) LIKE UPPER('%" . $this->db->escape_like_str($term) . "%') or " .
            " UPPER(g.proteinid) LIKE UPPER('%" . $this->db->escape_like_str($term) . "%') or g.id LIKE '" .
            $this->db->escape_like_str($term) . "' " . " or UPPER(p.genename) LIKE UPPER('" . $this->db->escape_like_str($term) .
            "') and g.proteinid <> '' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function countGeneswithfunctions()
    {
        $sql = "select count(*) as count from genes where proteinid <> '' ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function countORFs()
    {
        $sql = "select count(*) as count from genes ";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function selectDatabasesByID($id)
    {
        $sql = "select c.*,d.* from crossreference as c
		left join `databases` as d on c.databaseid = d.id where  c.geneid = '{$this->db->escape_like_str($id)}'";
        $query = $this->db->query($sql);

        return $query->result_array();
    }
}