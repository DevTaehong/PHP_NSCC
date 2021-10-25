<?php
    try
    {
        session_start();
        require_once("dbcon.php");
        $conn = getDbConnection();
        $username = $_POST['loginUser'];
        $pwd = $_POST['loginPwd'];

        $sql = "SELECT * FROM users WHERE user_name = :loginUser";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":loginUser", $_POST['loginUser']);
        $stmt->execute();

        $count = $stmt->rowCount();

        if($count == 1)
        {
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            $hash = $row['user_pwd'];
            if(password_verify($pwd, $hash))
            {
                //password matches, grant access
                $_SESSION['LoggedInUser'] = $username;
                header("location:R1.php");
            }
        }
        echo "Incorrect Login<br/>";
        echo "<a href='mainLogin.html'>Try Again</a>";
    }
    catch (PDOException $ex){
        echo $ex->getMessage();
    }
    finally {
        //cleanup code
        //close the connection
        $conn = null;
    }