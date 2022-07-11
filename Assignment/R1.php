<?php
require('isLoggedIn.php');
checkIfLoggedIn();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Our Employees List</title>
        <script src="java.js" type="text/javascript" ></script>
        <style>
            table, th, tr, td { border: solid 2px red;}
        </style>
        <form method="post" action="">
            <h3>Search First & Last Names From Database</h3>
            <p>Search:<input type="text" name="search" value="<?php echo $_POST['search']; ?>" /></p>
            <input type="submit" class="button" name="submit" value="Submit Query">
        </form>

        <form method="post" name="myForm" action="" onsubmit="return validateForm()">
            <p>First Name:<input type="text" name="fName" id="fName" onkeyup="upperFName(this.id)"/> <label id="labelFName" hidden> Enter a first name</label></p>
            <p>Last Name:<input type="text" name="lName" id="lName" onkeyup="upperLName(this.id)" /> <label id="labelLName" hidden> Enter a last name</label></p>
            <p>BirthDate:<input type="date" name="birthDate" id="birthDate"/> <label id="labelBirthDate" hidden> Enter the birthdate</label></p>
            <p>Gender:<input type="text" name="gender" id="gender" maxlength="1" oninput="functionGender()"/><label id="wrongGender"></label> <label id="labelGender" hidden> Enter the gender</label></p>
            <p>Hire Date:<input type="date" name="hireDate" id="hireDate"/> <label id="labelHireDate" hidden> Enter the hire date</label></p>
            <p><input type="submit" name="addEmployee" value="Add an employee" id="addEmployee"/></p>
        </form>
    </head>
    <body>
        <table border="1">
            <thead>
                <th>Emp Number</th>
                <th>Birth date</th>
                <th>First name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Hire Date</th>
                <th>Update</th>
                <th>Delete</th>
            </thead>
            <tbody>
                <?php
                    require_once("dbcon.php");
                    $conn = getDbConnection();

                    $rowPerPage = 25;
                    $row = 0;
                    $search = $_POST['search'];

                    //Code Source: https://makitweb.com/create-pagination-with-php/ for REQ-3
                    if(!empty($_POST['but_prev']))
                    {
                        $row = $_POST['row'];
                        $row -= $rowPerPage;
                        if( $row < 0 )
                        {
                            $row = 0;
                        }
                    }
                    if(!empty($_POST['but_next']))
                    {
                        $row = $_POST['row'];
                        $allCount = $_POST['allCount'];
                        $search = $_POST['search'];

                        $val = $row + $rowPerPage;
                        if( $val < $allCount )
                        {
                            $row = $val;
                        }
                    }
                    $sql = "SELECT COUNT(*) AS cntRows FROM employees";
                    $result = mysqli_query($conn,$sql);
                    $fetchResult = mysqli_fetch_array($result);
                    $allCount = $fetchResult['cntRows'];

                    if (empty($_POST['search']) && empty($_POST['fName']) && empty($_POST['lName']) && empty($_POST['birthDate'])
                        && empty($_POST['gender']) && empty($_POST['hireDate']))
                    {
                        $sql = "SELECT * FROM employees ORDER BY emp_no LIMIT $row, $rowPerPage";
                    }
                    elseif (!empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['birthDate'])
                        && !empty($_POST['gender']) && !empty($_POST['hireDate']))
                    {
                        $sql = "INSERT INTO employees (first_name, last_name, birth_date, gender, hire_date) VALUES ('";
                        $sql .= $_POST['fName'];
                        $sql .= "','";
                        $sql .= $_POST['lName'];
                        $sql .= "','";
                        $sql .= $_POST['birthDate'];
                        $sql .= "','";
                        $sql .= $_POST['gender'];
                        $sql .= "','";
                        $sql .= $_POST['hireDate'];
                        $sql .= "');";
                    }
                    else{
                        $sql = "SELECT * FROM employees WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'";
                    }

                    $result = mysqli_query($conn,$sql);
                    $sno = $row + 1;

                    if(!$result)
                    {
                        die("Could not retrieve records from database: " . mysqli_error($conn));
                    }
                    elseif (!empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['birthDate'])
                        && !empty($_POST['gender']) && !empty($_POST['hireDate']))
                    {
                        $lastId = mysqli_insert_id($conn);
                        echo "<h2>" . "Successfully added " . mysqli_affected_rows($conn) . " record(s).  Last inserted ID is: " . $lastId . "</h2>";
                        $sql = "SELECT * FROM employees ORDER BY emp_no LIMIT $row, $rowPerPage";
                        $result = mysqli_query($conn,$sql);
                    }
                    while($fetch = mysqli_fetch_assoc($result)):
                ?>
                    <tr>
                        <td><?php echo $fetch['emp_no'] ?></td>
                        <td><?php echo $fetch['birth_date'] ?></td>
                        <td><?php echo $fetch['first_name'] ?></td>
                        <td><?php echo $fetch['last_name'] ?></td>
                        <td><?php echo $fetch['gender'] ?></td>
                        <td><?php echo $fetch['hire_date'] ?></td>
                        <td>
                            <form name="selectForm" action="selectedEmployee.php" method="POST">
                                <input type="hidden" name="emp_no" value="<?php echo $fetch['emp_no']; ?>" />
                                <input type="submit" name="selectButton" value="Select" />
                            </form>
                        </td>
                        <td>
                            <form name="selectForm" action="deleteEmployee.php" method="POST">
                                <input type="hidden" name="emp_no" value="<?php echo $fetch['emp_no']; ?>" />
                                <input type="submit" name="deleteButton" value="Select" />
                            </form>
                        </td>
                    </tr>
                <?php
                    $sno++;
                    endwhile;
                    mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <form method="post" action="">
            <input  type="hidden" name="row" value="<?php echo $row; ?>">
            <input  type="hidden" name="allCount" value="<?php echo $allCount; ?>">
            <input type="submit" class="button" name="but_prev" value="Previous">
            <input type="submit" class="button" name="but_next" value="Next">
        </form>
        <form name="LogoutForm" action="logOut.php" method="post">
            <input type="submit" name="logoutButton" value="Log Out" />
        </form>
    </body>
</html>