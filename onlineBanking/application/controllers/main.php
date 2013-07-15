<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {

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

        $this->data['center'] = "main";
		$this->load->view('index.php', $this->data);

	}

    public function account()
    {
        $this->load->model('account');
        $account_data = $this->account->getAccountByCustomerID($this->session->userdata("customerID"));

        $this->data['center'] = "account";
        $this->data['accountData'] = $account_data;
        $this->load->view('index.php', $this->data);
    }

    public function account_detail()
    {
        $this->load->model('account');
        $accountID = $this->uri->segment(3);
        $account_data = $this->account->getAccountDetail($accountID);
        $this->data['center'] = "account_detail";
        $this->data['accountData'] = $account_data;
        $this->load->view('index.php', $this->data);
    }

    public function logout()
    {
        $this->session->unset_userdata("is_logged_in");
        redirect("login");
    }
}

/* End of file main.php */
/* Location: ./application/controllers/main.php */