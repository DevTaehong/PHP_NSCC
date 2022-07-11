<?php

    require_once ("dbcon.php");
    $conn = getDbConnection();

    $actorId = $_POST['actorId'];
    //retrieving the existing record for the specified actor id
    $sql = "SELECT first_name,last_name FROM actor WHERE actor_id = $actorId;";
    $result = mysqli_query($conn, $sql);
    if(!$result)
    {
        die("Actor with id $actorId was not found");
    }
    else
    {
        $data = mysqli_fetch_assoc($result);
        $firstName = $data['first_name'];
        $lastName = $data['last_name'];
    }

?>
<!DOCTYPE html>
    <html>
    <head>
        <title>Update actors</title>
    </head>
    <body>
        <form id="updateActor" name="updateActor" method="post" action="update2.php">
            <p><label>First Name: <input type="text" name="firstName" id="firstName" value="<?php echo $firstName; ?>" /></label></p>
            <p><label>Last Name: <input type="text" name="lastName" id="lastName" value="<?php echo $lastName; ?>" /></label></p>
            <p><input type="hidden" name="actorId" id="actorId" value="<?php echo $actorId; ?>" /></p>
            <p><input type="submit" id="submit" value="update" /></p>
        </form>
    </body>
</html>
