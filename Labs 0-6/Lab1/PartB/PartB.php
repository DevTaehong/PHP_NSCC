<html>
    <head>
    </head>
    <body>
        <h1>
            <?php
                echo "Greetings from Lab1.";
            ?>
        </h1>
        <p>I live in Dartmouth.</p>
        <?php
            echo "<h3>PHP Heading 3</h3>";
        ?>

        <h1>
            <?php
                echo "Step2";
            ?>
        </h1>
        <?php
            $name = "Taehong";
            echo "My name is " . $name;
        ?>

        <h1>
            Step 3
        </h1>
        <?php
            $string = "I am working on " . "Lab 1.";
            echo $string;
        ?>

        <h1>
            Step 4
        </h1>
        <?php
            $cal1 = (32 * 14) + 83;
            $cal2 = (1024/128)-7;
            $cal3 = 769%6;

            echo "(32 * 14) + 83 = " . $cal1 . "<br>";
            echo "(1024 / 128) - 7 = " . $cal2 . "<br>";
            echo "The remainder of 769 divided by 6 is " . $cal3;
        ?>

        <h1>
            Step 5
        </h1>
        <?php
            for($counter=10;$counter>=0;$counter--)
            {
                if ($counter != 0){
                    echo $counter . "...";
                }
                if ($counter == 0){
                    echo "Blast Off";
                }
            }
        ?>
        <h1>Step 6</h1>
        <?php
            $Colours = array(
                    "Red",
                    "Blue",
                    "Black",
                    "Yellow",
                    "Green",
                    "Gray",
                    "White"
            );
            for ($counter=0;$counter<count($Colours);$counter++){
                echo "$Colours[$counter]<br>";
            }
            echo "<br>";
            foreach ($Colours as $ColNum => $Col){
                echo "$Col<br>";
            }

            echo "<pre>";
            print_r($Colours);
            echo "<pre>";
        ?>
    </body>
</html>

