<?php
	class Page_Model extends CI_Model
	{
		public function AllReports(){
			$query = $this->db->query("SELECT DISTINCT(name) as rname, COUNT(name) AS num FROM tbl_report WHERE tbl_report.approval= '1' GROUP BY name ORDER BY num DESC ");
        	return $query->result();
		}
		public function search_report($title)
		{
			$this->db->select('*')->from('tbl_report'); 
        	$this->db->like('name',$title,'after'); 
        	$this->db->group_by("name");
        	$query = $this->db->get();     
        	return $query->result(); 
		}
		// public function save_image()
		// {
			
		// }
	}
?>