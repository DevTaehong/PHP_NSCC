<!DOCTYPE html>
<html>
    <head>
        <title>Step2</title>
    </head>
    <body>
        <h1>
            <?php
                echo "Hello, " . $_GET['fName'] ." " . $_GET['lName'] . "!<br>";

                switch ($_GET['Month'])
                {
                    case 3:
                        if($_GET['Date'] >= 21)
                        {
                            echo "Your zodiac sign is: Aries.";
                        }
                        else if($_GET['Date'] <= 20)
                        {
                            echo "Your zodiac sign is: Pisces.";
                        }
                        break;
                    case 4:
                        if($_GET['Date'] <= 19)
                        {
                            echo "Your zodiac sign is: Aries.";
                        }
                        else if ($_GET['Date'] >= 20)
                        {
                            echo "Your zodiac sign is: Taurus.";
                        }
                        break;
                    case 5:
                        if($_GET['Date'] <= 20)
                        {
                            echo "Your zodiac sign is: Taurus.";
                        }
                        else if($_GET['Date'] >= 21)
                        {
                            echo "Your zodiac sign is: Gemini.";
                        }
                        break;
                    case 6:
                        if($_GET['Date'] <= 21)
                        {
                            echo "Your zodiac sign is: Gemini.";
                        }
                        else if($_GET['Date'] >= 22)
                        {
                            echo "Your zodiac sign is: Cancer.";
                        }
                        break;
                    case 7:
                        if($_GET['Date'] <= 22)
                        {
                            echo "Your zodiac sign is: Cancer.";
                        }
                        else if($_GET['Date'] >= 23)
                        {
                            echo "Your zodiac sign is: Leo.";
                        }
                        break;
                    case 8:
                        if($_GET['Date'] <= 22)
                        {
                            echo "Your zodiac sign is: Leo.";
                        }
                        else if($_GET['Date'] >= 23)
                        {
                            echo "Your zodiac sign is: Virgo.";
                        }
                        break;
                    case 9:
                        if($_GET['Date'] <= 22)
                        {
                            echo "Your zodiac sign is: Virgo.";
                        }
                        else if($_GET['Date'] >= 23)
                        {
                            echo "Your zodiac sign is: Libra.";
                        }
                        break;
                    case 10:
                        if($_GET['Date'] <= 23)
                        {
                            echo "Your zodiac sign is: Libra.";
                        }
                        else if ($_GET['Date'] >= 24)
                        {
                            echo "Your zodiac sign is: Scorpius.";
                        }
                        break;
                    case 11:
                        if($_GET['Date'] <= 21)
                        {
                            echo "Your zodiac sign is: Scorpius.";
                        }
                        else if ($_GET['Date'] >= 22)
                        {
                            echo "Your zodiac sign is: Sagittarius.";
                        }
                        break;
                    case 12:
                        if ($_GET['Date'] <= 21)
                        {
                            echo "Your zodiac sign is: Sagittarius.";
                        }
                        else if ($_GET['Date'] >= 22)
                        {
                            echo "Your zodiac sign is: Capricornus.";
                        }
                        break;
                    case 1:
                        if ($_GET['Date'] <= 19)
                        {
                            echo "Your zodiac sign is: Capricornus.";
                        }
                        else if ($_GET['Date'] >= 20)
                        {
                            echo "Your zodiac sign is: Aquarius.";
                        }
                        break;
                    case 2:
                        if ($_GET['Date'] <= 18)
                        {
                            echo "Your zodiac sign is: Aquarius.";
                        }
                        else if ($_GET['Date'] >= 19)
                        {
                            echo "Your zodiac sign is: Pisces.";
                        }
                        break;
            }

            ?>
        </h1>
    </body>
</html>
