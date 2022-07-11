<!DOCTYPE html>
<html>
    <head>
        <title>Step1</title>
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

            <?php
                $fileTmpName = $_FILES['userImage']['tmp_name'];
                $fileOrigName = $_FILES['userImage']['name'];
                $fileSize = $_FILES['userImage']['size'];
                $fileUploadError = $_FILES['userImage']['error']; // 0 means success
                $result = move_uploaded_file($fileTmpName,"uploads/".$fileOrigName);

                echo "<br>" . "Tmp: " . $fileTmpName . "<br>";
                echo "Orig: " . $fileOrigName . "<br>";
                echo "Size: " . $fileSize . "<br>";
                echo "Error: " . $fileUploadError . "<br>";

                if($result){
                    echo "successfully stored.";
                }
            ?>
        </h1>
    </body>
</html>
