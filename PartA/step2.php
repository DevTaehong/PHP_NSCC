<!DOCTYPE html>
<html>
    <head>
        <title>Our film List</title>
        <style>
            table, th, tr, td { border: solid 2px red;}
        </style>
    </head>
    <body>
        <table border="1">
            <thead>
                <th>Film</th>
                <th>Description</th>
            </thead>
            <tbody>
            <?php
                require_once("step3.php");
                $conn = getDbConnection();
                $des = $_POST['search'];

                $result = mysqli_query($conn,"SELECT * FROM film WHERE description LIKE '%$des%'");
                if(!$result)
                {
                    die("Could not retrieve records from database: " . mysqli_error($conn));
                }

                while($row = mysqli_fetch_assoc($result)):
            ?>
                <tr>
                    <td><?php echo $row['title'] ?></td>
                    <td><?php echo $row['description'] ?></td>
                </tr>
            <?php
                endwhile;
                mysqli_close($conn);
            ?>
            </tbody>
        </table>
    </body>
</html>