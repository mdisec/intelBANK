<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

    var $data = array();

    public function __construct(){
        parent::__construct();
        if($this->session->userdata("is_logged_in") == True)
        {
            redirect("main");
            return;
        }
        $this->load->model('credential');
    }
	public function index()
	{
        $this->data['center'] = "login";
		$this->load->view('login.php', $this->data);

	}

    public function attempt()
    {

        $this->form_validation->set_rules('customerNumber', 'Customer Number', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('login.php', $this->data);
            return;
        }
        $customerNumber = $this->input->post('customerNumber');
        $password = md5($this->input->post('password'));
        $ip_address = $this->input->get_request_header("x-forwarded-for");
        if(!$ip_address)
            $ip_address = $this->input->ip_address();

        if($this->credential->customerLogin($customerNumber,$password, $ip_address) == True)
        {
            $customerData = $this->credential->getCustomerData(null, $customerNumber, $password);
            $sessionData = array("is_logged_in"     => True,
                                 "customerID"       => $customerData->id,
                                 "customerName"     => $customerData->name,
                                 "customerSurname"  => $customerData->surname,
                                 "customerNumber"   => $customerData->customer_number
                                );
            $this->session->set_userdata($sessionData);
            redirect("main");
            return;
        }
        $this->data['loginError'] =  True;
        $this->load->view('login.php', $this->data);
    }
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */