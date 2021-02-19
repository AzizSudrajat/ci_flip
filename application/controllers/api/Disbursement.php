<?php

require APPPATH . 'libraries/REST_Controller.php';

class Disbursement extends REST_Controller {
  public function __construct() {
     parent::__construct();
     $this->load->model('DisbursementModel');
     $this->load->model('BankUsersModel');
     $this->load->model('BankFlipModel');
  }

	public function index_get($id = 0){

  }

  public function index_post(){
    // request
    $json = file_get_contents('php://input');
    $req = json_decode($json);

    // get bank account
    $model_b_user = $this->BankUsersModel;
    $model_b_user->where('bank_code', $req->bank_code);
    $model_b_user->where('account_number', $req->account_number);
    $res = $model_b_user->get()->row_array();

    // insert disbursement
    $model_dis = $this->DisbursementModel;
    $model_dis->bank_code = ;
    $model_dis->account_number = ;
    $model_dis->recipient_name = ;
    $model_dis->amount = ;
    $model_dis->status = 'PENDING' ;
    $model_dis->sender_bank = ;
    $model_dis->remark = ;


    // $res = $model->find($res_id)->row_array();
    // $this->response($json,REST_Controller::HTTP_CREATED);
  }

  public function index_put($id){

  }

  public function index_delete($id){

  }

}
