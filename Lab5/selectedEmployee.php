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
            try
            {
                require_once("dbcon.php");
                $conn = getDbConnection();

                $sql = "SELECT * FROM employees WHERE emp_no = ";
                $sql .= $_POST['emp_no'];
                $sql .= ";";

                if(!empty($_POST['update']))
                {

                    $sql = "UPDATE employees SET first_name = :first_name, last_name = :last_name, birth_date = :birth_date, gender = :gender, hire_date = :hire_date WHERE emp_no = :emp_no";

                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(":first_name", $_POST['first_name']);
                    $stmt->bindParam(":last_name", $_POST['last_name']);
                    $stmt->bindParam(":birth_date", $_POST['birth_date']);
                    $stmt->bindParam(":gender", $_POST['gender']);
                    $stmt->bindParam(":hire_date", $_POST['hire_date']);
                    $stmt->bindParam(":emp_no", $_POST['emp_no']);

                    $stmt->execute();
                }

                if (empty($_POST['update']))
                {
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $data = $stmt->fetch(PDO::FETCH_ASSOC);
                }
                else
                {
                    echo "<h2>" . "Successfully updated " . $stmt->rowCount() . " record(s)" . "</h2>";
                }
            }
            catch (PDOException $ex){
                echo $ex->getMessage();
            }
            finally {
                $conn = null;
            }
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
