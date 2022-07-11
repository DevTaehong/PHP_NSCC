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
            require_once("dbcon.php");
            $conn = getDbConnection();

            $sql = "SELECT * FROM employees WHERE emp_no = ";
            $sql .= $_POST['emp_no'];
            $sql .= ";";

            if(!empty($_POST['delete']))
            {
                $sql = "DELETE FROM employees WHERE emp_no = ";
                $sql .= $_POST['emp_no'];
                $sql .= ";";

                $result = mysqli_query($conn,$sql);
                if (!$result)
                {
                    die("Unable to delete record: " . mysqli_error($conn));
                }
                else
                {
                    echo "<h2>" . "Successfully deleted " . mysqli_affected_rows($conn) . " record(s)" . "</h2>";
                }
            }
            mysqli_close($conn);
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
