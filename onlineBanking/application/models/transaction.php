<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mince
 * Date: 7/1/13
 * Time: 8:31 PM
 * To change this template use File | Settings | File Templates.
 */

class Transaction extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    /**
     * Getting account.id as a parameter and returning all transaction including incoming and outgoing transaction.
     * @param $accountID
     * @return mixed
     */
    public function getTransactionHistory($accountID)
    {
        $query = $this->db->get_where('account', array('id' => $accountID, 'customer_id' => $this->session->userdata('customerID')) );
        if($query->num_rows() != 1)
        {
            return False;
        }
        $sql = "
        SELECT
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
        WHERE (transaction.source_id = ? OR  transaction.destination_id = ?);
        ";
        $query = $this->db->query($sql,array($accountID, $accountID));
        return  $query->result();
    }

    public function getTransactionDetail($transactionID)
    {
        $sql = "
        SELECT
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
        WHERE (transaction.id = ? );
        ";
        $query = $this->db->query($sql,array($transactionID));
        if($query->num_rows() != 1)
        {
            return False;
        }
        return  $query->result();
    }

}