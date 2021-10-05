<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
    if (isset($_POST['target']) && isset($_POST['guess'])) // has any date been posted/submitted
    {
        $numberTarget = $_POST['target'];
        $numberGuessed = $_POST['guess']; // was  target....

        if ($numberGuessed < $numberTarget) // was  <=
        {
            $message = "Guess Higher";
        } elseif ($numberGuessed > $numberTarget)
        {
            $message = "Guess Lower";
        } elseif ($numberGuessed == $numberTarget)
        {
            $message = "You got it!";
        }
    }
    else
    {
        $numberGuessed = "";
        $message = "Welcome to my guessing game!";//assume that this page is loading in for the first time
        $numberTarget = rand(1,100);
    }
?>
<html>
    <head>
        <title>A PHP number guessing script</title>
    </head>
    <body>
        <h1>
            <?php print $message ?>
        </h1>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post" name="guessinggame">
            <p>Number:
                <input name="guess" type="text" value="<?php echo $numberGuessed ?>">
            </p>
            <p>
                <input type="hidden" name="target" value="<?php echo $numberTarget ?>">
            </p>
            <p>
                <input name="" type="submit">
            </p>
        </form>
    </body>
</html>

