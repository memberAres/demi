<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * Class : User (UserController)
 * User Class to control all user related operations.
 * @author : Kishor Mali
 * @version : 1.1
 * @since : 15 November 2016
 */
  class Upload extends CI_Controller{
        
    function upload_file() {

        //upload file
        $config['upload_path'] ='./uploads/';
         
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
         // $config['max_size'] = '1024'; //1 MB
        ini_set('upload_max_filesize', '500M');
        ini_set('post_max_size', '550M');
        ini_set('memory_limit', '1024M');
        ini_set('max_input_time', 300);
        ini_set('max_execution_time', 300);
        echo json_encode($_FILES['file']['name']);exit;
        if (isset($_FILES['file']['name'])) {
            if (0 < $_FILES['file']['error']) {
                echo 'Error during file upload' . $_FILES['file']['error'];
            } else {
                if (file_exists(base_url().'assets/Uploads/' . $_FILES['file']['name'])) {
                    echo 'File already exists : assets/Uploads/' . $_FILES['file']['name'];
                } else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('file')) {
                        echo $this->upload->display_errors();
                    } else {
                        echo base_url().'/assets/Uploads/' . $_FILES['file']['name'];
                    }
                }
            }
        } else {
            echo 'Please choose a file';
        }
    }

}