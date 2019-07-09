<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class ReportApproval_model extends CI_Model
{
    /**
     * This function is used to get the user listing count
     * @param string $searchText : This is optional search text
     * @return number $count : This is row count
     */
    function ApproveData($id)
    {
        $this->db->set('approval', 1);   
        $this->db->where('id', $id);  
        $this->db->update('tbl_report');
        $query = $this->db->query("SELECT * FROM tbl_report WHERE tbl_report.approval= '0' ORDER BY tbl_report.date");
        return $query->result();
    }
    function DeleteReport($id){
        $this->db->where('id',$id);
        $this->db->delete('tbl_report');
        $query = $this->db->query("SELECT * FROM tbl_report WHERE tbl_report.approval= '0' ORDER BY tbl_report.date");
        return $query->result();
    }
    function viewRportNum($data){
        // echo $data;
        $currentdate = date("Y-m-d  H:i:s");
        $date=date_create("2013-03-15 00:00:00");
        
        $beforedate = date_format($date,"Y-m-d H:i:s");
//         select * from tbl_report 
// where date between '2019-04-03 00:00:00' and '2019-04-04 23:59:00' 

        // echo date("Y-m-d  H:i:s",strtotime('-7 days'));
        if ($data=='1') {
            $beforedate = date("Y-m-d  H:i:s",strtotime('-1 hour'));
        } elseif($data=="2") {
            $beforedate = date("Y-m-d  H:i:s",strtotime('-1 days'));
        }elseif($data=='3') {
            $beforedate = date("Y-m-d  H:i:s",strtotime('-7 days'));
        }elseif($data=='4') {
            $beforedate = date("Y-m-d  H:i:s",strtotime('-1 months'));
        }elseif($data=='5') {
            $beforedate = date("Y-m-d  H:i:s",strtotime('-1 year'));
        }
        elseif($data == '6'){
            $query = $this->db->query("SELECT COUNT(id) AS number FROM tbl_report");
            return $query->result();
        }
       
        $query = $this->db->query("SELECT COUNT(id) AS number FROM tbl_report where date between '$beforedate' and '$currentdate'");
        return $query->result();
    }
}
?>