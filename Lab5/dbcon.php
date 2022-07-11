<?php
function getDbConnection()
{
    //DEFINE SOME ENVIRONMENT VARIABLES
    $host = isset($_ENV['DB_HOST']) ? $_ENV['DB_HOST'] : "database";
    $dbname = isset($_ENV['DB_NAME']) ? $_ENV['DB_NAME'] : "employees";
    $username = isset($_ENV['DB_USERNAME']) ? $_ENV['DB_USERNAME'] : "employeesApp";
    $password = isset($_ENV['DB_PASSWORD']) ? $_ENV['DB_PASSWORD'] : "inet2005";


    if (isset($_ENV['DB_HOST'])){
        $host = $_ENV['DB_HOST'];
    }
    else{
        $host = "database";
    }

    //MYSQLI version of creating a connection
    //establish a db connection
//    $conn = mysqli_connect("$host", "$username", "$password", "$dbname");
//    if(!$conn)
//    {
//        die("Unable to connect to database: " . mysqli_connect_error());
//    }

    //PDO version of creating a connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", "$username", $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $conn;
}