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
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
            </thead>
            <tbody>
                <?php
                    require_once ("dbcon.php");
                    $conn = getDbConnection();

                    $result2 = mysqli_query($conn,"SELECT * FROM actor ORDER BY actor_id DESC LIMIT 10");

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

                        echo"</tr>";
                    endwhile;
                ?>

                <?php
                    if(!empty($_POST['actorId']))
                    {
                        require_once ("dbcon.php");
                        $conn = getDbConnection();

                        $sql = "DELETE FROM actor WHERE actor_id = ";
                        $sql .= $_POST['actorId'];
                        $sql .= ";";

                        $result = mysqli_query($conn, $sql);

                        if(!$result)
                        {
                            die("Unable to delete record: " . mysqli_error($conn));
                        }
                        else
                        {
                            echo "<h2>" . "Successfully deleted " . mysqli_affected_rows($conn) . " record(s)" . "</h2>";
                            echo "<a href='http://localhost/lab3/PartB/delete.php'>" . "Back to Actor List" . "</a>";
                        }
                        mysqli_close($conn);
                    }//if end
                ?>
            </tbody>
        </table>
        <form id="deleteActor" name="deleteActor" method="post" action="delete.php">
            <p><label>ID to Delete: <input type="text" name="actorId" id="actorId" /></label></p>
            <p><input type="submit" id="submit" value="delete" /></p>
        </form>
        <form id="updateActor" name="updateActor" method="post" action="update.php">
            <p><label>ID to Update: <input type="text" name="actorId" id="actorId" /></label></p>
            <p><input type="submit" id="submit" value="update" /></p>
        </form>
    </body>
</html>
