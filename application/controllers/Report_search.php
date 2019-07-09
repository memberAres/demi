<?php
class Report_search extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('report_search_model');
    }
 
    function index(){
        $this->load->view('report_search_view');
    }
 
    function get_autocomplete(){
         // process posted form data  
        $keyword = $this->input->post('term');  
        $data['response'] = 'false'; //Set default response  
        $query = $this->report_search_model->search_report($keyword); //Search DB  
        if( ! empty($query) )  
        {  
            $data['response'] = 'true'; //Set response  
            $data['message'] = array(); //Create array  
            foreach( $query as $row )  
            {  
                $data['message'][] = array(   
                                        'id'=>$row->id,  
                                        'value' => $row->name,  
                                        '' 
                                     );  //Add a row to array  
            }  
        }  
        if('IS_AJAX')  
        {  
            echo json_encode($data); //echo json string if ajax request  
        }  
        else 
        {  
            $this->load->view('show',$data); //Load html view of search results  
        }  
    }
    function findReport(){
        $keyword = $this->input->post('searchName');
        $data = $this->report_search_model->findReport($keyword);
        echo json_encode($data);
    }
 
}