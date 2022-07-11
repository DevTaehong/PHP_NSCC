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
        <a href="http://localhost/lab2/PartB/CelsiusConversion.php">Go to Celsius to Fahrenheit Converter</a>
    </head>
    <body>

        <table border="1">
            <thead>
                <th>Fahrenheit</th>
                <th>Celsius</th>
            </thead>
            <tbody>
                <?php
                    $min_fahr = 0;
                    $max_fahr = 100;
                    $fahrenheit = 0;
                    $counter = 0;

                    while ($min_fahr <= $max_fahr)
                    {
                        $celsius = ($min_fahr - 32) * (5 / 9);
                        $RoundCelsius = round($celsius);
                        echo "<tr><td>$counter</td><td>$RoundCelsius</td></tr>";

                        ++$min_fahr;
                        ++$counter;
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>