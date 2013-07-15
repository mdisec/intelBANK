<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mince
 * Date: 7/1/13
 * Time: 8:31 PM
 * To change this template use File | Settings | File Templates.
 */

class Transfer extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    /**
     * Returns account.account_number and account.id specifics customer.id
     * @param $customer_id
     * @return bool
     */
    public function getCustomerAccounts($customer_id)
    {
        $this->db->select('account_number, account.id');
        $this->db->from('account');
        $this->db->join('customer', 'account.customer_id = customer.id');
        $this->db->where(array('customer.id' => $customer_id));
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        }
        return $query->result();
    }

    /**
     * Check account.account_number is valid
     * @param $account_number
     * @return bool
     */
    public function isAccountExist($account_number)
    {
        $query = $this->db->get_where('account', array('account_number' => $account_number));
        if ($query->num_rows() > 0)
            return True;
        return False;
    }

    public function isBalanceEnough($account_id, $amount)
    {
        $this->db->select('balance');
        $this->db->from('account');
        $this->db->where('id', $account_id);
        $result = $this->db->get()->result();
        $amount = number_format($amount, 2, '.', '');
        $balance = number_format($result[0]->balance, 2, '.', '');
        log_message('error',$amount.":".$balance);
        if ($amount <= $balance)
            return True;
        return False;
    }

    public function transfer_it($customer_id,$source_account_id, $destination_account_number, $amount, $description)
    {
        // get source account balance and calculate new balance
        $source_account_balance = $this->db->select('balance')->from('account')->where('id', $source_account_id)->get()->result();
        $new_source_balance = $source_account_balance[0]->balance - $amount;

        // reduce source account balance and update on account.balance
        $this->db->where('id', $source_account_id)->update('account',array('balance' => $new_source_balance));

        // get destination account balance and calculate new balance
        $destination_account_balance = $this->db->select('balance')->from('account')->where('account_number', $destination_account_number)->get()->result();
        $new_destination_balance = $destination_account_balance[0]->balance + $amount;

        // increase destination account balance on account.balance
        $this->db->where('account_number', $new_destination_balance)->update('account', array('balance' => $new_destination_balance));

        // generate transaction data
        $destination_id = $this->db->select('id')->from('account')->where('account_number', $destination_account_number)->get()->result();
        $transaction_data = array(
            "customer_id"   => $customer_id,
            "source_id"     => $source_account_id,
            "destination_id"=> $destination_id[0]->id,
            "amount"        => $amount,
            "description"   => $description
        );
        $this->db->insert('transaction', $transaction_data);
    }

}

































