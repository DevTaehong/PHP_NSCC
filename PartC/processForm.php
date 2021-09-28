<!DOCTYPE html>
<html>
    <head>
        <title>Process Page for Post</title>
    </head>
    <body>
        <h1>
            <?php
            echo "Your first name is: " . $_POST['fName'] . "<br>";
            echo "Your last name is: " . $_POST['lName'] .  "<br>";

            if(!empty($_POST['iHeight']))
            {
                $iHeight = number_format($_POST['iHeight'] * 0.0254,2);
                echo "Your height in metres is: " . $iHeight;
            }

            elseif (!empty($_POST['fHeight'])){
                $fHeight = number_format($_POST['fHeight'] * 0.3048,2);
                echo "Your height in metres is: " . $fHeight;
            }
            ?>
        </h1>
    </body>
</html>
