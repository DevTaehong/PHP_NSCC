<?php
    function makeHeading1($string, $number){
        if($number == 1){
            echo "<h1>" . $number . "</h1>";
        }

        elseif ($number == 2){
            echo "<h2>" . $number . "</h2>";
        }

        elseif ($number == 3){
            echo "<h3>" . $number . "</h3>";
        }

        elseif ($number == 4){
            echo "<h4>" . $number . "</h4>";
        }

        elseif ($number == 5){
            echo "<h5>" . $number . "</h5>";
        }

        elseif ($number == 6){
            echo "<h6>" . $number . "</h6>";
        }

        else {
            echo "An error.";
        }

        for ($counter=1; $counter<=7; $counter++){
            makeHeading1($counter);
        }
    }
