<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
interface iCustomerDataModel
{
    public function connectToDB();

    public function closeDB();

    public function selectCustomers();
    
    public function selectCustomerById($custID);

    public function fetchCustomer();
    
    public function updateCustomer($custID,$first_name,$last_name);

    // field access functions
    public function fetchCustomerID($row);

    public function fetchCustomerFirstName($row);

    public function fetchCustomerLastName($row);
    
    public function fetchAddressID($row);

    public function fetchAddress1($row);

    public function fetchAddress2($row);
}
?>
