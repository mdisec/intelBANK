<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class support extends CI_Controller {

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
        echo "<script>window.close();</script>";
    }
	public function live()
	{
        $customerID = $this->uri->segment(3);
        $customerNumber = $this->uri->segment(4);

        $customer_data = $this->credential->getCustomerData($customerID, null, null);
        $this->data['name'] = $customer_data->surname;
        $this->load->view('support.php', $this->data);

	}

}

/* End of file support.php */
/* Location: ./application/controllers/Support.php */