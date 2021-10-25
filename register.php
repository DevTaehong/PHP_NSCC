<!DOCTYPE html>
<html>
    <head lang="en">
        <meta charset="UTF-8">
        <title></title>
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
            <input type="submit" name="submit" id="submit" value="Register" />

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
            try
            {
                require_once("dbcon.php");
                $conn = getDbConnection();

                if (!empty($_POST['userName']) && !empty($_POST['userPwd']))
                {

                    $userName = $_POST['userName'];
                    $password = $_POST['userPwd'];

                    $sql = "SELECT * FROM users WHERE user_name = '";
                    $sql .= $userName;
                    $sql .= "';";

                    $stmt = $conn->prepare($sql);
                    $result = $stmt->execute();

                    if ($stmt->rowCount() > 0)
                    {
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

                            $sql = "INSERT INTO users (user_name, user_pwd) VALUES (:user_name, :user_pwd);";

                            $stmt = $conn->prepare($sql);
                            $stmt->bindParam(":user_name", $_POST['userName']);
                            $stmt->bindParam(":user_pwd", $hashedPwd);
                            $result=$stmt->execute();

                            echo "Successfully the username is added.";
                        }//end else
                    }//end else
                }//end if
            }
            catch (PDOException $ex){
                echo $ex->getMessage();
            }
            finally {
                $conn = null;
            }
        ?>
    </body>
</html>
