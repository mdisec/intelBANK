<?php
/**
 * Created by JetBrains PhpStorm.
 * User: mince
 * Date: 7/1/13
 * Time: 8:31 PM
 * To change this template use File | Settings | File Templates.
 */

class Company_model extends CI_Model{

    function __construct(){
        parent::__construct();
    }

    public function getCompany()
    {
        $query = $this->db->get('company');
        return $query->result();
    }

}