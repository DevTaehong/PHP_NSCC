<?php

require_once('../model/CustomerModel.php');

class CustomerController 
{
    public $model;
    
    public function __construct()
    {
        $this->model = new CustomerModel();
    }
    
    public function displayAction()
    {
        //retrieve an array of all the customers in the db
        //as customer objects
        $arrayOfCustomers = $this->model->getAllCustomers();

        //include the view that will iterate over the array
        //and display the customers in a table
        include '../view/displayCustomers.php';
    }

    public function updateAction($custID)
    {
        //get the current customer by id as it is in the db
        //return it as a customer object
        $currentCustomer = $this->model->getCustomer($custID);

        //load in the editCustomer view which contains the form
        //and pre-populate the form with the customer data
        //you just retrieved from the db
        include '../view/editCustomer.php';
    }

    public function commitUpdateAction($custID,$fName,$lName)
    {
        $lastOperationResults = "";

        //get the current customer as it currently exists
        //in the database...get it as a customer object
        $currentCustomer = $this->model->getCustomer($custID);

        //update the object with the new values from the form
        $currentCustomer->setFirstName($fName);
        $currentCustomer->setLastName($lName);

        //send the updated customer object back to the database
        //so that it can be saved in the db
        $lastOperationResults = $this->model->updateCustomer($currentCustomer);

        //get the entire customer list again...this time
        //containing the updated customer you just finished
        //updating
        $arrayOfCustomers = $this->model->getAllCustomers();

        //choose the displayCustomers view to display the
        //customers in the array
        include '../view/displayCustomers.php';
    }


}

?>
