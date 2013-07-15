<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

    var $data = array();

    public function __construct(){
        parent::__construct();
        //if (!$this->input->is_ajax_request()) {
        //    exit('No direct script access allowed');
        //}
        if($this->session->userdata("is_logged_in") == False)
        {
            redirect("login");
            return;
        }

        $this->load->model('transfer');
    }

    /**
     * Displays current user's account.id and account.account_number
     * @return bool
     */
    public function accounts()
	{

        $this->load->model('api_model');
        $accountData = $this->api_model->getCustomerAccounts($this->session->userdata('customerID'));
        if (!$accountData)
            return False;
        $this->output->set_header('Content-type: application/json');
        echo json_encode($accountData);
    }

    public function getAccountBalance()
    {
        $accountID = $this->uri->segment(3);
        if(!is_numeric($accountID))
            http_response_code(999);
        $this->load->model('api_model');
        $accountData = $this->api_model->getAccountBalance($accountID);
        if (is_null($accountData))
        {
            $this->output->set_header('Content-type: application/json');
            echo json_encode(null);
            return;
        }
        $this->output->set_header('Content-type: application/json');
        echo json_encode($accountData[0]);
    }

    public function getCompanyService()
    {
        $this->load->model('api_model');
        $companyID = $this->input->post('company_id');
        $serviceData = $this->api_model->getCompanyService($companyID);
        if (is_null($serviceData))
        {
            $this->output->set_header('Content-type: application/json');
            echo json_encode(null);
            return;
        }
        $this->output->set_header('Content-type: application/json');
        echo json_encode($serviceData);
    }

}

/* End of file api.php */
/* Location: ./application/controllers/api.php */