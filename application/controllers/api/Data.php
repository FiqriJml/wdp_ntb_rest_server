<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Data extends REST_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('data_model','mData');
    }
    public function index_get()
    {
        $id = $this->get('id');
        if($id === null){
            $data = $this->mData->get();
        } else {
            $data = $this->mData->get($id);
        }
        
        if($data){
            $this->response([
                'status' => true,
                'data' => $data,
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
