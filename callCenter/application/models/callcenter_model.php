<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mince
 * Date: 06.07.2013
 * Time: 23:59
 * To change this template use File | Settings | File Templates.
 */

class callcenter_model extends CI_Model {

    function __construct(){
        parent::__construct();

    }

    /**
     * Getting account.id as a parameter and returning all transaction including incoming and outgoing transaction.
     * @param $accountID
     * @return mixed
     */
    public function getTransactionHistory($customerNumber)
    {
        $sql = "SELECT
        transaction.id,
        transaction.source_id,
        transaction.destination_id,
        A.account_number as source_number,
        B.account_number as destination_number,
        transaction.transfer_date,
        transaction.description,
        transaction.amount
        FROM
        transaction
        JOIN customer
        on transaction.customer_id = customer.id
        JOIN account AS A
        on transaction.source_id = A.id
        JOIN account AS B
        on transaction.destination_id = B.id
        WHERE customer.customer_number = ?
        ORDER BY transfer_date DESC";
        $query = $this->db->query($sql, array($customerNumber));
        return $query->result();
    }

    /**
     * return account details
     * @param $accountNumber
     */
    public function getAccountDetail($accountNumber)
    {
        $query = $this->db->get_where('account', array('account_number' => $accountNumber));
        return $query->result();
    }
}