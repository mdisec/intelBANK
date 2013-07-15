<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mince
 * Date: 7/1/13
 * Time: 8:31 PM
 * To change this template use File | Settings | File Templates.
 */

class Account extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function getAccountByCustomerID($customerID)
    {
        $query = $this->db->get_where("account", array("customer_id" => $customerID));
        $result = $query->result();
        return  $result;
    }

    public function getAccountDetail($accountID)
    {
        $this->db->select('account.description,account.create_date,account.balance,account.id,account.account_number');
        $this->db->from('account');
        $this->db->join('customer', 'account.customer_id = customer.id');
        $this->db->where(array('account.id' => $accountID, 'customer.id' => $this->session->userdata('customerID')));
        $query = $this->db->get();
        return  $query->result();
    }

}