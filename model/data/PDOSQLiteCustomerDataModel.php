<?php

require_once '../model/data/iCustomerDataModel.php'; //interface file must be included
class PDOSQLiteCustomerDataModel implements iCustomerDataModel
{
    private $dbConnection; //<-the db connection is stored here after successful connection
    private $result; //<-results of queries are stored here
    private $stmt;

    public function connectToDB()
    {
        try
        {
            //connects to mysql db via PDO
            //if connection is successful, the resulting connection
            //is stored in the $dbConnection member variable defined above
            $this->dbConnection = new PDO("sqlite:../model/database/customers.sqlite");
            $this->dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $ex)
        {
            die('Could not connect to the SQLite Database via PDO: ' . $ex->getMessage());
        }
    }

    public function closeDB()
    {
        // set a PDO connection object to null to close it
        $this->dbConnection = null;
    }

    public function selectCustomers()
    {
        // hard-coding for first ten rows
        $start = 0;
        $count = 10;

        //build the SQL STATEMENT
        //notice the placeholders for the start and count
        $selectStatement = "SELECT * FROM customers";
        $selectStatement .= " ORDER BY custId DESC";
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
        $selectStatement = "SELECT * FROM customers";
        $selectStatement .= " WHERE custId = :custID;";

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
            die('Could not select records from SQLite Database via PDO: ' . $ex->getMessage());
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

    public function updateCustomer($custID, $first_name, $last_name)
    {
        //build an UPDATE sql statment with the data provided to the function
        //this should always include the customer id
        //note the parameters/placeholders in the statement
        $updateStatement = "UPDATE customers";
        $updateStatement .= " SET fName = :firstName,lName=:lastName";
        $updateStatement .= " WHERE custId = :custID;";

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
            die('Could not update record from SQLite Database via PDO: ' . $ex->getMessage());
        }
    }

    public function deleteCustomer($custID)
    {
        $deleteStatement = "DELETE FROM customers WHERE custId = :custId;";

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
            die('Could not delete record from SQLite Database via PDO: ' . $ex->getMessage());
        }
    }

    public function insertCustomer($first_name, $last_name)
    {
        $insertStatement = "INSERT INTO customers (fName, lName) ";
        $insertStatement .= "VALUES (:firstName, :lastName);";

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
            die('Could not insert record into SQLite Database via PDO: ' . $ex->getMessage());
        }
    }

    public function fetchCustomerID($row)
    {
        //extract the specific customer id from the appropriate
        //column with the current row of customer data you are focused on
        return $row['custId'];
    }

    public function fetchCustomerFirstName($row)
    {
        //extract the specific first name from the appropriate
        //column with the current row of customer data you are focused on
        return $row['fName'];
    }

    public function fetchCustomerLastName($row)
    {
        //extract the specific last name from the appropriate
        //column with the current row of customer data you are focused on
        return $row['lName'];
    }

    public function fetchAddressID($row)
    {
        //extract the specific related address id from the appropriate
        //column with the current row of customer data you are focused on
        return $row['addressId'];
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