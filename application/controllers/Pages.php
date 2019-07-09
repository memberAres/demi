<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
	class Pages extends CI_Controller{
		function __construct(){
	        parent::__construct();
	        $this->load->model('Page_Model');
    	}

		public function view($page = 'home'){
			if (!file_exists(APPPATH.'views/pages/'.$page.'.php')) {
				show_404();
			}
			$this->load->model('Page_Model');
			$data['title'] = ucfirst($page);
			$data['topreports'] = $this->Page_Model->AllReports();
			// echo json_encode($data);
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
		public function get_autocomplete()
		{
			 $keyword = $this->input->post('term');  
		     $data['response'] = 'false';
		     $query = $this->Page_Model->search_report($keyword);
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
	public function addNewreport()
	{
		$name = $this->input->post('rname');
                $url = $this->input->post('rsubject');
                $upload = $this->input->post('rimg_src');
                $comment = $this->input->post('rcomment');
                date_default_timezone_set('US/Central');
                $userInfo = array('src'=>$url, 'comment'=>$comment, 'name'=> $name,
                                    'img_src'=>$upload, 'date'=>date('Y-m-d H:i:s'));
                $this->load->model('report_search_model');
                //$result = $this->report_search_model->addNewreport($userInfo);
                $data['topreports'] = $this->report_search_model->addNewreport($userInfo);
                
                if($data > 0)
                {
                    $this->session->set_flashdata('success', 'New Report created successfully');
                }
                else
                {
                    $this->session->set_flashdata('error', 'Report creation failed');
                }
                echo json_encode($data);
                // $this->loadViews("usersReport", $this->global, $data, NULL);
	}
}