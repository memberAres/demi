<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
class Reportapproval extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('ReportApproval_model');

    }
 
    function index(){
        $id =  $this->input->post('approval_id');
        $type =  $this->input->post('approval_type');
        $data = $this->ReportApproval_model->ApproveData($id,$type);
        echo json_encode($data);
    }
    function deleteReport()
    {
        $id =  $this->input->post('Del_id');
        $data = $this->ReportApproval_model->DeleteReport($id);
        echo json_encode($data);
    }
    function viewRportNum(){
        $data = $this->input->post('val');
        $number = $this->ReportApproval_model->viewRportNum($data);
        echo json_encode($number);
    }
    function editurl(){
        $id =  $this->input->post('edit_id');
        $url =  $this->input->post('edit_url');
        $data = $this->ReportApproval_model->editurl($id,$url);
        echo json_encode($data);
    }
}