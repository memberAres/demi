<?php
class AllReports_model extends CI_Model{
 
    function AllReports(){
        $query = $this->db->query("SELECT * FROM tbl_report  ORDER BY tbl_report.date DESC");  
        return $query->result(); 
    }
}