<?php
class Report_search_model extends CI_Model{
 
    function search_report($title){
        // $this->db->like('name', $title , 'both');
        // $this->db->order_by('name', 'ASC');
        // $this->db->limit(10);
        // return $this->db->get('tbl_report')->result();

        $this->db->select('*')->from('tbl_report'); 
        $this->db->like('name',$title,'after'); 
        $this->db->group_by("name");
        $query = $this->db->get();     
        return $query->result(); 
    }

    function addNewreport($userInfo)
    {
        $this->db->trans_start();
        $this->db->insert('tbl_report', $userInfo);
        
        
        
        $this->db->trans_complete();
        $query = $this->db->query("SELECT DISTINCT(name) as rname, COUNT(name) AS num FROM tbl_report WHERE tbl_report.approval= '1' GROUP BY name ORDER BY num DESC ");
        return $query->result();
        
    }
    function findReport($key){
        $query = $this->db->query("SELECT * FROM tbl_report WHERE tbl_report.name= '$key'   ORDER BY tbl_report.date");
        return $query->result();
    }
}