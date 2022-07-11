<?php
    require_once ("dbcon.php");
    $conn = getDbConnection();

    if(!empty($_POST['actorId']) && !empty($_POST['firstName']) && !empty($_POST['lastName']))
    {
        $sql = "UPDATE actor SET first_name = '";
        $sql .= $_POST['firstName'];
        $sql .= "', last_name = '";
        $sql .= $_POST['lastName'];
        $sql .= "' WHERE actor_id = ";
        $sql .= $_POST['actorId'];
        $sql .= ";";

        $result = mysqli_query($conn, $sql);
        if(!$result)
        {
            die("Unable to update record: " . mysqli_error($conn));
        }
        else
        {
            echo "<h2>" . "Successfully updated " . mysqli_affected_rows($conn) . " record(s)" . "</h2>";
            echo "<a href='http://localhost/lab3/PartB/delete.php'>" . "Back to Actor List" . "</a>";
        }
    }
?>
<?php mysqli_close($conn); ?>