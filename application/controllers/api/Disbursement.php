<?php

require APPPATH . 'libraries/REST_Controller.php';

class Disbursement extends REST_Controller {
  public function __construct() {
     parent::__construct();
     $this->load->model('DisbursementModel');
     $this->load->model('BankUsersModel');
     $this->load->model('BankFlipModel');
     $this->load->library('TextToImage');
     $this->load->helper(array('string','url'));
  }

	public function index_get($id = 0){
    $model = $this->DisbursementModel;
    if(!empty($id)){
      $model->where('id', $id);
      $data = $model->get()->row_array();
    }else{
      $data = $model->get()->result();
    }

    if (!empty($data)) {
      $this->response($data, REST_Controller::HTTP_OK);
    }else{
      $res = [
        'data' => 'Not Found'
      ];
      $this->response($res, REST_Controller::HTTP_NOT_FOUND);
    }

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
    $model_dis->bank_code = $req->bank_code;
    $model_dis->account_number = $req->account_number;
    $model_dis->recipient_name = $res['account_name'];
    $model_dis->amount = $req->amount;
    $model_dis->status = 'PENDING' ;
    $model_dis->sender_bank = $req->sender_bank;
    $model_dis->remark = $req->remark;
    $res_id = $model_dis->insert();


    $res = $model_dis->find($res_id)->row_array();
    $this->response($res,REST_Controller::HTTP_CREATED);
  }

  public function index_put($id){
    // request
    $json = file_get_contents('php://input');
    $req = json_decode($json);

    // random strings
    $string = 'TRX{$randnum}';
    $randnum = random_string('numeric',6);
    $filename = str_replace('{$randnum}', $randnum, $string);

    //model
    $model = $this->DisbursementModel;

    // condision
    if ($req->status == 'DONE') {
      $data = $model->find($id)->row_array();
      if ($data['status'] == 'DONE') {
        $this->response(['data' => 'Status Already Done'], REST_Controller::HTTP_OK);
      }else{
        $img = New TextToImage;
        //create image from text
        $text = 'BUKTI TRANSAKSI\n
        Waktu Terkirim          : '. $data["time_served"] .'
        Nama Pemerima           : '. $data["recipient_name"] .'
        Bank Penerima           : '. $data["bank_code"] .'
        Nomor Rekening Penerima : '. $data["account_number"] .'
        Berita Transfer         : '. $data["remark"].'\n\n\n\n\n';

        $img->createImage($text);
        //save image as jpg format
        $img->saveAsJpg($filename,'receipt/');

        $model->receipt = base_url('/receipt/'.$filename.'.jpg');
        $model->status = $req->status;
        $model->update($id);

        $res = $model->find($id)->row_array();
        $this->response($res, REST_Controller::HTTP_OK);
      }
    } elseif ($req->status = 'CENCELED') {
      $model->status = $req->status;
      $model->receipt = '';
      $model->update($id);
      $res = $model->find($id)->row_array();
      $this->response($res, REST_Controller::HTTP_OK);
    }else {
      $this->response(['data' => 'Status Not Found'], REST_Controller::HTTP_NOT_FOUND);
    }

  }

  public function index_delete($id){

  }

}
