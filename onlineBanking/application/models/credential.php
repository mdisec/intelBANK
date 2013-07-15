<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mince
 * Date: 7/1/13
 * Time: 8:31 PM
 * To change this template use File | Settings | File Templates.
 */

class Credential extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    /**
     * Customer user login. Returns True if credentials are correct!
     * @param $customerNumber
     * @param $password
     * @param $ip_address
     * @return bool
     */
    public function customerLogin($customerNumber, $password, $ip_address)
    {
        $query = $this->db->get_where("customer", array('customer_number' => $customerNumber, 'password' => $password));
        if($query->num_rows() == 1)
        {
            $result = $query->result();
            $this->db->insert("log",array("customer_id" => $result[0]->id, "ip_address" => $ip_address));
            return True;
        }
        return False;
    }

    /**
     * Returns customer's data with customerID or customerNumber and password. Similar with customerLogin() method.
     * @param null $customerID
     * @param null $customerNumber
     * @param null $password
     */
    public function getCustomerData($customerID = null, $customerNumber = null, $password = null )
    {
        if($customerID != NULL)
            $query = $this->db->get_where("customer", array("id" => $customerID));
        else
            $query = $this->db->get_where("customer", array('customer_number' => $customerNumber, 'password' => $password));
        $result = $query->result();
        return $result[0];
    }

}