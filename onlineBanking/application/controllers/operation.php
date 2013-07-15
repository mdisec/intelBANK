<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Operation extends CI_Controller {

    var $data = array();

    public function __construct(){
        parent::__construct();

        if($this->session->userdata("is_logged_in") == False)
        {
            redirect("login");
            return;
        }

        $this->load->model('credential');
    }

	public function index()
	{

       redirect("main");

	}

    /**
     * Display transaction history.
     */
    public function transaction_history()
   {
       $this->data['center'] = 'transaction_history';
       $this->load->model('transaction');
       $accountID = $this->uri->segment(3);
       $transactionData= $this->transaction->getTransactionHistory($accountID);
       if(!$transactionData)
       {
           $this->data['permissionError'] = True;
           $this->load->view('index',$this->data);
           return;
       }

       $this->data['account_id'] = $accountID;
       $this->data['transactionData'] = $transactionData;
       $this->load->view('index',$this->data);

   }

    /**
     * Display all detail about single one transaction
     */
    public function transaction_detail()
    {
        $this->load->model('transaction');
        $this->data['center'] = 'transaction_detail';
        $transactionID = $this->uri->segment(3);
        $transactionData = $this->transaction->getTransactionDetail($transactionID);
        if(!$transactionData)
        {
            $this->data['notFound'] = True;
            $this->load->view('index',$this->data);
            return;
        }
        $this->data['transactionID'] = $transactionID;
        $this->data['transactionData'] =$transactionData;
        $this->load->view('index',$this->data);
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */