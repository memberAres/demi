<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
class AllReports extends BaseController
{
    /**
     * This is default constructor of the class
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AllReports_model');
        $this->isLoggedIn();   
    }
    
    /**
     * This function used to load the first screen of the user
     */
    public function index()
    {
        if($this->isAdmin() == TRUE)
        {
            $this->loadThis();
        }
        else
        {
            $this->load->model('AllReports_model');
        
            // $searchText = $this->input->post('searchText');
            // $data['searchText'] = $searchText;
            
            $this->load->library('pagination');
            
            // $count = $this->user_model->Allreport($searchText);

            // $returns = $this->paginationCompress ( "userListing/", $count, 5 );
            
            $data['userRecords'] = $this->AllReports_model->AllReports();
            // echo "string";exit;
            // $data['topreports'] = $this->user_model->Topreport();

            $this->global['pageTitle'] = 'Digital Ethiopia';
            // echo json_encode($data);exit;
            $this->loadViews("Allreports", $this->global, $data, NULL);
        }
    }

}

?>