<!DOCTYPE html>
<html>
    <style>
        th, td {
            color: black;
        }
        thead tr {
            background-color: gray;
        }
        tbody tr:nth-child(2n) {
            background-color: gray;
        }
    </style>
    <head>
        <a href="http://localhost/lab2/PartB/FahrenheitConversion.php">Go to Fahrenheit to Celsius Converter</a>
    </head>
    <body>
        <table border="1">
            <thead>
                <th>Celsius</th>
                <th>Fahrenheit</th>
            </thead>
            <tbody>
                <?php

                $min_cel = 0;
                $max_cel = 100;

                $celsius = 0;
                $counter = 0;

                while ($min_cel <= $max_cel)
                {
                    $fahrenheit = ($min_cel * 9 /5) + 32;
                    $RoundF = round($fahrenheit);
                    echo "<tr><td>$counter</td><td>$RoundF</td></tr>";

                    ++$min_cel;
                    ++$counter;
                }
                ?>
            </tbody>
        </table>
    </body>
</html>