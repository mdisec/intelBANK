<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Money extends CI_Controller {

    var $data = array();

    public function __construct(){
        parent::__construct();

        if($this->session->userdata("is_logged_in") == False)
        {
            redirect("login");
            return;
        }

        $this->load->model('transfer');
    }

	public function index()
	{

       $this->data['center'] = 'money_order';
       $this->data['accountData'] = $this->transfer->getCustomerAccounts($this->session->userdata('customerID'));
       $this->load->view('index',$this->data);

	}

    public function send()
    {
        $this->form_validation->set_rules('source_account', 'Source Account', 'required');
        $this->form_validation->set_rules('destination_account_number', 'Destination Account Number', 'required');
        $this->form_validation->set_rules('amount', 'Amount', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if($this->form_validation->run() == FALSE)
        {
            $this->index();
            return;
        }
        $source_account_id = $this->input->post('source_account');
        $destination_account_number = $this->input->post('destination_account_number');
        $amount = $this->input->post('amount');
        $description = $this->input->post('description');

        // destination account exist check
        if(!$this->transfer->isAccountExist($destination_account_number))
        {
            $this->data['is_account_number_valid'] = False;
            $this->index();
            return;
        }
        // amount check
        if(!$this->transfer->isBalanceEnough($source_account_id ,$amount))
        {
            $this->data['is_balance_enough'] = False;
            $this->index();
            return;
        }
        // money transfer

        $this->transfer->transfer_it($this->session->userdata("customerID"),$source_account_id, $destination_account_number, $amount, $description);
        $this->data['center'] = 'success_transfer';
        $this->load->view('index.php',$this->data);
    }

}

/* End of file money.php */
/* Location: ./application/controllers/money.php */