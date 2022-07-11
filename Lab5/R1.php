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

        <form method="post" name="myForm" action="R1.php" onsubmit="return validateForm()">
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
                try
                {
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

                    $stmt = $conn->prepare($sql);
                    $stmt->execute();

                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $results = $stmt->fetch(PDO::FETCH_ASSOC);
                    $allCount = $results['cntRows'];

                    if (empty($_POST['search']) && empty($_POST['fName']) && empty($_POST['lName']) && empty($_POST['birthDate'])
                        && empty($_POST['gender']) && empty($_POST['hireDate']))
                    {
                        $sql = "SELECT * FROM employees ORDER BY emp_no LIMIT $row, $rowPerPage";

                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                    }
                    elseif (!empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['birthDate'])
                        && !empty($_POST['gender']) && !empty($_POST['hireDate']))
                    {
                        $sql = "INSERT INTO employees (first_name, last_name, birth_date, gender, hire_date) VALUES (:fName, :lName, :birthDate, :gender, :hireDate);";

                        $stmt = $conn->prepare($sql);
                        $stmt->bindParam(":fName", $_POST['fName']); //neutralizes any sql injection code
                        $stmt->bindParam(":lName", $_POST['lName']); //neutralizes any sql injection code
                        $stmt->bindParam(":birthDate", $_POST['birthDate']);
                        $stmt->bindParam(":gender", $_POST['gender']);
                        $stmt->bindParam(":hireDate", $_POST['hireDate']);

                        $stmt->execute();
                    }
                    else
                    {
                        $sql = "SELECT * FROM employees WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'";

                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                    }

                    $sno = $row + 1;

                    if (!empty($_POST['fName']) && !empty($_POST['lName']) && !empty($_POST['birthDate'])
                        && !empty($_POST['gender']) && !empty($_POST['hireDate']))
                    {
                        $lastId = $conn->lastInsertId();
                        $count = $stmt->rowCount();
                        echo "<h2>" . "Successfully added " . $count . " record(s).  Last inserted ID is: " . $lastId . "</h2>";
                        $sql = "SELECT * FROM employees ORDER BY emp_no LIMIT $row, $rowPerPage";
                        $conn ->exec($sql);
                    }

                    $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    $results = $stmt->fetchALL();

                    foreach ($results as $fetch)
                    {
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
                    }
                }
                catch (PDOException $ex){
                    echo $ex->getMessage();
                }
                finally {
                    //cleanup code
                    //close the connection
                    $conn = null;
                }
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