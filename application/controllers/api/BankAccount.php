<?php

require APPPATH . 'libraries/REST_Controller.php';

class BankAccount extends REST_Controller {
  public function __construct() {
     parent::__construct();
     $this->load->model('BankUsersModel');
  }

	public function index_post(){
    // request
    $json = file_get_contents('php://input');
    $req = json_decode($json);

    $model = $this->BankUsersModel;
    $model->where('bank_code', $req->bank_code);
    $model->where('account_number', $req->account_number);
    $res = $model->get()->row_array();
    if (!empty($res)) {
      $res += ['status' => 'SUCCESS'];
    }else{
      $res = ['status' => 'ERROR'];
    }


    $this->response($res,REST_Controller::HTTP_OK);
  }

}
