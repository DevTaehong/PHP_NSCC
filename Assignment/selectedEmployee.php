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

            if(!empty($_POST['update']))
            {
                $sql = "UPDATE employees SET first_name = '";
                $sql .= $_POST['first_name'];
                $sql .= "', last_name = '";
                $sql .= $_POST['last_name'];
                $sql .= "', birth_date = '";
                $sql .= $_POST['birth_date'];
                $sql .= "', gender = '";
                $sql .= $_POST['gender'];
                $sql .= "', hire_date = '";
                $sql .= $_POST['hire_date'];
                $sql .= "' WHERE emp_no = ";
                $sql .= $_POST['emp_no'];
                $sql .= ";";
            }

            $result = mysqli_query($conn,$sql);

            if (empty($_POST['update']))
            {
                $data = mysqli_fetch_assoc($result);
            }
            else
            {
                echo "<h2>" . "Successfully updated " . mysqli_affected_rows($conn) . " record(s)" . "</h2>";
            }
             mysqli_close($conn);
        ?>
        <form id="R" method="post" action="selectedEmployee.php">
            Employee's Number:<input type="text" name="emp_no" value="<?php echo $data['emp_no']; ?>" /><br>
            First Name:<input type="text" name="first_name" id="first_name" value="<?php echo $data['first_name']; ?>" /><br>
            Last Name:<input type="text" name="last_name" value="<?php echo $data['last_name']; ?>" /><br>
            Birth date:<input type="text" name="birth_date" value="<?php echo $data['birth_date']; ?>" /><br>
            Gender:<input type="text" name="gender" value="<?php echo $data['gender']; ?>" /><br>
            Hire Date<input type="text" name="hire_date" value="<?php echo $data['hire_date']; ?>" /><br>
            <input type="submit" name="update" value="Update">
        </form>
        <form name="LogoutForm" action="logOut.php" method="post">
            <input type="submit" name="logoutButton" value="Log Out" />
        </form>
        <a href="R1.php">Go Back</a>
    </body>
</html>
