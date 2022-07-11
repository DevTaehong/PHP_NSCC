<?php
require('isLoggedIn.php');
checkIfLoggedIn();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Update Employee</title>
    </head>
    <body>
    <?php
        if(!empty($_POST['delete']))
        {
            try
            {
                require_once("dbcon.php");
                $conn = getDbConnection();
                $sql = "CALL deleteEmployee(:emp_no);";

                $stmt = $conn->prepare($sql);
                $stmt->bindParam(":emp_no",$_POST['emp_no']);

                $stmt->execute();
                echo "<h2>" . "Successfully deleted " . $stmt->rowCount() . " record(s)" . "</h2>";
            }
            catch (PDOException $ex){
                echo $ex->getMessage();
            }
            finally {
                //cleanup code
                //close the connection
                $conn = null;
            }
        }
    ?>
        <form method="post" action="deleteEmployee.php">
            <p>Employee ID:<input type="text" name="emp_no" value="<?php echo $_POST['emp_no'];?>"</p>
            <h2>Will you really delete it?</h2><input type="submit" name="delete" value="Delete">
        </form>
        <form name="LogoutForm" action="logOut.php" method="post">
            <input type="submit" name="logoutButton" value="Log Out" />
        </form>
        <a href="R1.php">Go Back</a>
    </body>
</html>
