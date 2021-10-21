<?php
    session_start();

    require_once("dbcon.php");
    $conn = getDbConnection();
    if(!$conn){
        die("Unable to connect: ". mysqli_connect_error());
    }

    $username = $_POST['loginUser'];
    $pwd = $_POST['loginPwd'];

    //sanitize our inputs
    $username = stripslashes($username);
    $username = mysqli_real_escape_string($conn, $username);

    $sql = "SELECT * FROM users WHERE user_name = '$username'";

    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("An error occured in query: " . mysqli_error($conn));
    }
    mysqli_close($conn);

    $count = mysqli_num_rows($result);

    if($count == 1) {
        //a row was returned....
        $row = mysqli_fetch_assoc($result);
        //get the hashed value from the user_pwd
        $hash = $row['user_pwd'];

        if(password_verify($pwd, $hash)){
            //password matches, grant access
            $_SESSION['LoggedInUser'] = $username;
            header("location:R1.php");
        }
    }

    echo "Incorrect Login<br/>";
    echo "<a href='mainLogin.html'>Try Again</a>";