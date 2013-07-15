<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends CI_Controller {

    var $data = array();

    public function __construct(){
        parent::__construct();

        if($this->session->userdata("is_logged_in") == False)
        {
            redirect("login");
            return;
        }

        $this->load->model('company_model');
    }

	public function index()
	{

        $this->data['companyData'] = $this->company_model->getCompany();
        $this->data['center'] = 'company';
        $this->load->view('index',$this->data);


    }



}

/* End of file main.php */
/* Location: ./application/controllers/main.php */