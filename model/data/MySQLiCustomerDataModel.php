<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/data/iCustomerDataModel.php';
class MySQLiCustomerDataModel implements iCustomerDataModel
{

    private $dbConnection;
    private $result;

    // because the class implements the iCustomerDataModel interface,
    // the class MUST implement all of the functions defined in the
    // interface...they are listed below

    public function connectToDB()
    {
         $this->dbConnection = @new mysqli("localhost","root", "inet2005","sakila");
         if (!$this->dbConnection)
         {
               die('Could not connect to the Sakila Database: ' .
                        $this->dbConnection->connect_errno);
         }
    }

    public function closeDB()
    {  
        $this->dbConnection->close();
    }

    //executes a select statement query to get all of the customers
    //from the db....including related address data (via joins)
    public function selectCustomers()
    {
        //build the sql statement to get all customer data from
        //the database including the related address data
        $selectStatement = "SELECT * FROM customer";
        $selectStatement .= " LEFT JOIN address ON customer.address_id = address.address_id";
        $selectStatement .= " LIMIT 0,10;";
        //execute the query and store the result in the
        //$result member variable defined above
        $this->result = @$this->dbConnection->query($selectStatement);
        if(!$this->result)
        {
               die('Could not retrieve records from the Sakila Database: ' .
                       $this->dbConnection->error);
        }

    }
    
    public function selectCustomerById($custID)
    {
        //build select statment with WHERE clause to get
        //specific customer from db
        $selectStatement = "SELECT * FROM customer";
        $selectStatement .= " LEFT JOIN address ON customer.address_id = address.address_id";
        $selectStatement .= " WHERE customer.customer_id = $custID;";
        $this->result = @$this->dbConnection->query($selectStatement);
        if(!$this->result)
        {
               die('Could not retrieve records from the Sakila Database: ' .
                       $this->dbConnection->error);
        }
    }
    

    public function fetchCustomer()
    {
        //make sure there is a result from which to get records
        if(!$this->result)
        {
                die('No records in the result set: ' .
                        $this->dbConnection->error);
        }
        //returns the record as an array
        return $this->result->fetch_array();
    }
    
    public function updateCustomer($custID,$first_name,$last_name)
    {
        //build an UPDATE sql statment with the data provided to the function
        //this should always include the customer id
        $updateStatement = "UPDATE customer";
        $updateStatement .= " SET first_name = '$first_name',last_name='$last_name'";
        $updateStatement .= " WHERE customer_id = $custID;";
        //execute the statement and store the result in the appropriate
        //member variable
        $this->result = @$this->dbConnection->query($updateStatement);
        if(!$this->result)
        {
               die('Could not update records in the Sakila Database: ' .
                       $this->dbConnection->error);
        }

        //return the number of rows that were affected by executing
        //the update statement. Successful = 1 - Unsuccessful = 0
        return $this->dbConnection->affected_rows;
    }
    
    public function fetchCustomerID($row)
    {
        //extract the specific customer id from the appropriate
        //column with the current row of customer data you are focused on
        return $row['customer_id'];
    }

    public function fetchCustomerFirstName($row)
    {
        //extract the specific first name from the appropriate
        //column with the current row of customer data you are focused on
        return $row['first_name'];
    }

    public function fetchCustomerLastName($row)
    {
        //extract the specific last name from the appropriate
        //column with the current row of customer data you are focused on
        return $row['last_name'];
    }
    
    public function fetchAddressID($row)
    {
        //extract the specific related address id from the appropriate
        //column with the current row of customer data you are focused on
        return $row['address_id'];
    }

    public function fetchAddress1($row)
    {
        //extract the specific related address 1 data from the appropriate
        //column with the current row of customer data you are focused on
        return $row['address'];
    }

    public function fetchAddress2($row)
    {
        //extract the specific related address 2 data from the appropriate
        //column with the current row of customer data you are focused on
        return $row['address2'];
    }
}

?>
