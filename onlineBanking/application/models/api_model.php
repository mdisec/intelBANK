<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mince
 * Date: 7/1/13
 * Time: 8:31 PM
 * To change this template use File | Settings | File Templates.
 */

class api_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function getCustomerAccounts($customer_id)
    {
        $this->db->select('account_number, account.id');
        $this->db->from('account');
        $this->db->join('customer', 'account.customer_id = customer.id');
        $this->db->where(array('customer.id' => $customer_id));
        $query = $this->db->get();
        if($query->num_rows() == 0)
        {
            return null;
        }
        return  $query->result();
    }

    public function getAccountBalance($account_id)
    {
        $this->db->select('balance');
        $this->db->from('account');
        $this->db->where(array('account.id' => $account_id));
        $query = $this->db->get();
        if($query->num_rows() == 0)
        {
            return False;
        }
        return  $query->result();
    }

    public function getCompanyService($companyID)
    {
        $sql = "SELECT * FROM company_service WHERE company_id = ".$companyID;
        return $this->db->query($sql)->result_array();
    }
}