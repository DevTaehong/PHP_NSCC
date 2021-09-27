<?php
    $age = 29;
    function usingGlobal()
    {
        global $age;
        echo "<h1>You are $age years old. </h1>";
    }

    usingGlobal();
