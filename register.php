<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
        <script src="java.js" type="text/javascript" ></script>
    </head>
    <body>
        <h1>Member Register</h1>
        <form method="post" action="register.php">
            <table>
            <tr>
                <td>
                    <label for="userName">UserName:</label>
                </td>
                <td>
                    <input name="userName" id="userName" type="text" />
                </td>
            </tr>
            <tr>
                <td>
                    <label for="userPwd">Password:</label>
                </td>
                <td>
                    <input name="userPwd" id="userPwd" type="password" />
                </td>
            </tr>
            </table>
            <input type="submit" name="submit" id="submit" value="Test Register" />

        </form>
        <form method="post" action="mainLogin.html">
            <input type="submit" name="submit" id="submit" value="Go back to login page" />
        </form>
        <?php
            function checkIsStrongPassword($password)
            {
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number = preg_match('@[0-9]@', $password);
                $specialChars = preg_match('@[^\w]@', $password);

                if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8)
                {
                    return false;
                }
                else
                {
                    return true;
                }
            }
        ?>
        <?php
            require_once ('dbcon.php');
            $conn = getDbConnection();

            if (!empty($_POST['userName']) && !empty($_POST['userPwd']))
            {

                $userName = $_POST['userName'];
                $password = $_POST['userPwd'];

                $sql = "SELECT * FROM users WHERE user_name = ";
                $sql .= $_POST['userPwd'];
                $sql .= ";";

                $result = mysqli_query($conn,$sql);

                if ($result){
                    echo "The username is already in user\n";
                }
                else
                {
                    $chkStrongPwd = checkIsStrongPassword($password);

                    if (!$chkStrongPwd)
                    {
                        echo 'Password should be at least 8 characters in length and should include 
                        at least one upper case letter, one number, and one special character.';
                    }
                    else
                    {
                        $hashedPwd = password_hash($_POST['userPwd'],PASSWORD_BCRYPT);

                        $sql = "INSERT INTO users (user_name, user_pwd) VALUES ('";
                        $sql .= $_POST['userName'];
                        $sql .= "','";
                        $sql .= $hashedPwd;
                        $sql .= "');";

                        $result = mysqli_query($conn,$sql);

                        if (!$result){
                            die("Unable to register: " . mysqli_error($conn));
                        }
                        else{
                            echo "Successfully the username is added.";
                        }
                    }//end else
                }//end else
            }//end if
        mysqli_close($conn);
        ?>
    </body>
</html>
