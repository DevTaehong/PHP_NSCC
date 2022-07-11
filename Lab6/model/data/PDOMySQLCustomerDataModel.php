<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../model/data/iCustomerDataModel.php'; //interface file must be included
class PDOMySQLCustomerDataModel implements iCustomerDataModel
{

    private $dbConnection; //<-the db connection is stored here after successful connection
    private $result; //<-results of queries are stored here
    private $stmt;

    // because the class implements the iCustomerDataModel interface,
    // the class MUST implement all of the functions defined in the
    // interface...they are listed below

    public function connectToDB()
    {
        try
        {
            //connects to mysql db via PDO
            //if connection is successful, the resulting connection
            //is stored in the $dbConnection member variable defined above
            $this->dbConnection = new PDO("mysql:host=database;dbname=sakila","root","inet2005");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex)
        {
            die('Could not connect to the Sakila Database via PDO: ' . $ex->getMessage());
        }
    }

    public function closeDB()
    {
        // set a PDO connection object to null to close it
        $this->dbConnection = null;
    }

    //executes a select statement query to get all of the customers
    //from the db....including related address data (via joins)
    public function selectCustomers()
    {
        // hard-coding for first ten rows
        $start = 0;
        $count = 10;

        //build the SQL STATEMENT
        //notice the placeholders for the start and count
        $selectStatement = "SELECT * FROM customer";
        $selectStatement .= " LEFT JOIN address ON customer.address_id = address.address_id";
        $selectStatement .= " ORDER BY customer_id DESC";
        $selectStatement .= " LIMIT :start,:count;";

        try
        {
            //prepare the select statement by inserting the two values
            //into the parameters/placeholders
            $this->stmt = $this->dbConnection->prepare($selectStatement );
            $this->stmt->bindParam(':start', $start, PDO::PARAM_INT);
            $this->stmt->bindParam(':count', $count, PDO::PARAM_INT);
            //execute the select statement and store it in the $stmt
            //member variable
            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Could not select records from Sakila Database via PDO: ' . $ex->getMessage());
        }

    }
    
    public function selectCustomerById($custID)
    {
        //build select statment with WHERE clause to get
        //specific customer from db
        //note the :custID parameter placeholder...this is PDO-specific
        $selectStatement = "SELECT * FROM customer";
        $selectStatement .= " LEFT JOIN address ON customer.address_id = address.address_id";
        $selectStatement .= " WHERE customer.customer_id = :custID;";

        try
        {
            //prepare the statement by inserting in the customer id
            //that was passed into the function
            $this->stmt = $this->dbConnection->prepare($selectStatement);
            $this->stmt->bindParam(':custID', $custID, PDO::PARAM_INT);
            //execute the select statement and store in $stmt member variable
            $this->stmt->execute();
        }
        catch(PDOException $ex)
        {
            die('Could not select records from Sakila Database via PDO: ' . $ex->getMessage());
        }
    }

    public function fetchCustomer()
    {
        //at this point....a query should have been executed and stored
        //in the $stmt variable. here we can fetch the results
        //row by row by calling the fetch method off of the statement
        try
        {
            //this returns one row of data if there is one
            $this->result = $this->stmt->fetch(PDO::FETCH_ASSOC);
            return $this->result;
        }
        catch(PDOException $ex)
        {
            die('Could not retrieve from Sakila Database via PDO: ' . $ex->getMessage());
        }
    }


    public function updateCustomer($custID,$first_name,$last_name)
    {
        //build an UPDATE sql statment with the data provided to the function
        //this should always include the customer id
        //note the parameters/placeholders in the statement
        $updateStatement = "UPDATE customer";
        $updateStatement .= " SET first_name = :firstName,last_name=:lastName";
        $updateStatement .= " WHERE customer_id = :custID;";

        try
        {
            //prepare the sql statement by inserting into the
            //placeholders the values that we wish to use to perform
            //the update
            $this->stmt = $this->dbConnection->prepare($updateStatement);
            $this->stmt->bindParam(':firstName', $first_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $last_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':custID', $custID, PDO::PARAM_INT);
            //perform the update statement and store in the $stmt member variable
            $this->stmt->execute();
            //return the number of rows that the update statement
            //affected - if successful in this case, the value returned should
            //be 1 - it could possibly return 0 if no rows were affected
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('Could not update record from Sakila Database via PDO: ' . $ex->getMessage());
        }
    }

    public function deleteCustomer($custID)
    {
        $deleteStatement = "DELETE FROM customer WHERE customer_id = :custId;";

        try {
            //prepare the statement
            $this->stmt = $this->dbConnection->prepare($deleteStatement);
            //bind any parameters
            $this->stmt->bindParam(':custId', $custID, PDO::PARAM_INT);
            //execute
            $this->stmt->execute();

            //return the number of rows that the update statement
            //affected - if successful in this case, the value returned should
            //be 1 - it could possibly return 0 if no rows were affected
            return $this->stmt->rowCount();
        }
        catch(PDOException $ex)
        {
            die('Could not delete record from Sakila Database via PDO: ' . $ex->getMessage());
        }
    }

    public function insertCustomer($first_name, $last_name)
    {
        $insertStatement = "INSERT INTO customer (first_name, last_name, store_id, address_id) ";
        $insertStatement .= "VALUES (:firstName, :lastName, 1, 1);";

        try {
            //prepare
            $this->stmt = $this->dbConnection->prepare($insertStatement); //returns our stmt object
            //bind
            $this->stmt->bindParam(':firstName', $first_name, PDO::PARAM_STR);
            $this->stmt->bindParam(':lastName', $last_name, PDO::PARAM_STR);
            //execute
            $this->stmt->execute();

            return $this->stmt->rowCount();//should be 1
        }
        catch(PDOException $ex)
        {
            die('Could not insert record into Sakila Database via PDO: ' . $ex->getMessage());
        }
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
