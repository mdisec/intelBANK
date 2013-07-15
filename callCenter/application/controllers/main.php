<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

    var $data = array();

    public function __construct(){
        parent::__construct();
    }

    /**
     * Default function of this controller
     */
    public function index()
	{
        $this->data['center'] = "transaction";
		$this->load->view('index.php', $this->data);
	}

    /**
     * render account page to the visitor.
     */
    public function account()
    {
        $this->data['center'] = "account";
        $this->load->view('index.php', $this->data);
    }

    /**
     * returns account detail.
     */
    public function account_detail()
    {
        $accountNumber = $this->uri->segment(3);
        if(!isset($accountNumber))
        {
            $this->data['accountNumberIsNull'] =  True;
            $this->account();
            return;
        }
        $this->load->model('callcenter_model');
        $this->data['accountData'] = $this->callcenter_model->getAccountDetail($accountNumber);
        if(!$this->data['accountData'])
        {
            $this->data['emptyTransaction'] = True;
            $this->account();
            return;
        }
        $this->data['dataEnable'] = True;
        $this->account();
        return;
    }
    /**
     * Returns result of customer's transactions history
     */
    public function query()
    {
        $customerNumber = $this->input->post('customerNumber');
        if(!isset($customerNumber))
        {
            $this->data['customerNumberIsNull'] = True;
            $this->index();
            return;
        }
        $this->load->model('callcenter_model');
        $this->data['transactionData'] = $this->callcenter_model->getTransactionHistory($customerNumber);
        if(!$this->data['transactionData'])
        {
            $this->data['emptyTransaction'] = True;
            $this->index();
            return;
        }
        $this->data['dataEnable'] = True;
        $this->index();
        return;
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */