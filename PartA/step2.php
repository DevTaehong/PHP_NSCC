<?php
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

