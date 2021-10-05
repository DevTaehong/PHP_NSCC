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
                    function getDbConnection()
                    {
                        $conn = mysqli_connect("database", "root", "inet2005", "sakila");
                        if(!$conn)
                        {
                            die("Unable to connect to database: " . mysqli_connect_error());
                        }

                        return $conn;
                    }
                ?>
                <?php
                    $conn = getDbConnection();

                    $result = mysqli_query($conn,"SELECT * FROM film LIMIT 0,10");
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