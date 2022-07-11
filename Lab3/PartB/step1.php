<!DOCTYPE html>
<html>
    <head>
        <title>Our actor List</title>
        <style>
            table, th, tr, td { border: solid 2px red;}
        </style>
    </head>
    <body>
        <table border="1">
            <thead>
                <th>actor_id</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>last_update</th>
            </thead>
            <tbody>
                <?php
                    if(!empty($_POST['fName']) && !empty($_POST['lName']))
                    {
                        //include the function ato attempt to connect
                        require_once("dbcon.php");
                        $conn = getDbConnection();

                        //build out our query based on the submitted data from the form
                        //WARNING... HUGE security issue with this sql statement
                        $sql = "INSERT INTO actor (first_name, last_name) VALUES ('";
                        $sql .= $_POST['fName'];
                        $sql .= "','";
                        $sql .= $_POST['lName'];
                        $sql .= "');";

                        $result = mysqli_query($conn, $sql);
                        if (!$result)
                        {
                            die("Unable to insert record: " . mysqli_error($conn));
                        }
                        else
                        {
                            $result2 = mysqli_query($conn,"SELECT * FROM actor ORDER BY actor_id DESC LIMIT 10");
                            echo "<h2>Success! Record was entered.</h2>";
                            while ($row = mysqli_fetch_assoc($result2)):

                                echo "<tr>";

                                echo "<td>";
                                echo $row['actor_id'];
                                echo "</td>";

                                echo "<td>";
                                echo $row['first_name'];
                                echo "</td>";

                                echo "<td>";
                                echo $row['last_name'];
                                echo "</td>";

                                echo "<td>";
                                echo $row['last_update'];
                                echo "</td>";

                                echo"</tr>";

                            endwhile;
                            mysqli_close($conn);
                        }
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>