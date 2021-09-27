<?php

    function makeHeading1($number, $string)
    {
        if ($number == 1) {
            echo "<h1>" . $number . "</h1>";
        }
        elseif ($number == 2) {
            echo "<h2>" . $number . "</h2>";
        }
        elseif ($number == 3) {
            echo "<h3>" . $number . "</h3>";
        }
        elseif ($number == 4) {
            echo "<h4>" . $number . "</h4>";
        }
        elseif ($number == 5) {
            echo "<h5>" . $number . "</h5>";
        }
        elseif ($number == 6) {
            echo "<h6>" . $number . "</h6>";
        }
        else {
            echo "An error occurred.";
        }
    }
        for ($counter=1; $counter<=7; $counter++)
        {
            makeHeading1($counter, $counter);
        }

//step 2
    function appendMessageByValue($AppendByValue)
    {
        ++$AppendByValue;
        echo "<p> appendMessageByValue function value is $AppendByValue.</p>";
    }

    function appendMessageByRef(&$AppendByRef)
    {
        $AppendByRef .= $AppendByRef;
        echo "<p> appendMessageByRef function value is $AppendByRef.</p>";
    }

    $message = "I am working on lab 2.";

    echo "<p> Main program starting value is $message.</p>";
    appendMessageByValue($message);
    echo "<p> Main program ending value is $message</p>";

    echo "<p> Main program starting value is $message</p>";
    appendMessageByRef($message);
    echo "<p> Main program ending value is $message</p>";

//step3

    $age = 29;
    function usingGlobal()
    {
        global $age;
        echo "<h1>You are $age years old. </h1>";
    }

    usingGlobal();