<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
        <form action="index.php" method="post">
            <fieldset>
                <legend>Circle:</legend>
                <label for="circle">Radius:</label>
                <input type="text" id="Radius" name="Radius" value="<?php echo $_POST['Radius']; ?>">
                Enter percent: <input type="text" name="percent">
                <input type="submit" name="grow" value="Grow">
                <input type="submit" name="shrink" value="Shrink"><br>
            </fieldset>
            <fieldset>
                <legend>Rectangle:</legend>
                <label for="Rectangle">Width:</label>
                <input type="text" id="Width" name="Width" value="<?php echo $_POST['Width']; ?>">
                <label for="Rectangle">Length:</label>
                <input type="text" id="Length" name="Length" value="<?php echo $_POST['Length']; ?>"><br>
            </fieldset>
            <fieldset>
                <legend>Triangle:</legend>
                <label for="Triangle">Base:</label>
                <input type="text" id="Base" name="Base" value="<?php echo $_POST['Base']; ?>">
                <label for="Triangle">Height:</label>
                <input type="text" id="Height" name="Height" value="<?php echo $_POST['Height']; ?>">
                Enter percent: <input type="text" name="percentTri">
                <input type="submit" name="growTri" value="Grow">
                <input type="submit" name="shrinkTri" value="Shrink"><br>
            </fieldset>
            <input type="submit" name="calculate" value="calculate">
        </form>
    </head>
    <body>
        <?php
            include_once("Circle.php");
            include_once("Rectangle.php");
            include_once("Triangle.php");

            if (!empty($_POST['calculate']) || !empty($_POST['shrink']) || !empty($_POST['grow'])
                || !empty($_POST['shrinkTri']) || !empty($_POST['growTri']))
            {

                $radius = $_POST['Radius'];

                $length = $_POST['Length'];
                $width = $_POST['Width'];

                $base = $_POST['Base'];
                $height = $_POST['Height'];

                $myCircle = new Circle("Circle","$radius");
                $myRectangle = new Rectangle("Rectangle", "$length", "$width");
                $myTriangle = new Triangle("Triangle", "$base", "$height");

                if (!empty($_POST['Radius'])){
                    echo "<h3>" . "Shape: " . $myCircle->getName() . "</h3>";
                    echo "<p>" . "Area: " . $myCircle->CalculateArea() . "</p>";
                }

                if (!empty($_POST['shrink']) || !empty($_POST['grow'])){
                    $percent = $_POST['percent'];
                    echo "<p>" . "Resized Area: " . $myCircle->Resize("$percent")  . "</p>";
                }


                if (!empty( $_POST['Length']) && !empty($_POST['Width'])){
                    echo "<h3>" . "Shape: " . $myRectangle->getName() . "</h3>";
                    echo "<p>" . "Area: " . $myRectangle->CalculateArea() . "</p>";
                }

                if (!empty($_POST['Base']) && !empty($_POST['Height']))
                {
                    echo "<h3>" . "Shape: " . $myTriangle->getName() . "</h3>";
                    echo "<p>" . "Area: " . $myTriangle->CalculateArea() . "</p>";
                }


                if (!empty($_POST['shrinkTri']) || !empty($_POST['growTri'])){
                    $percent = $_POST['percentTri'];
                    echo "<p>" . "Resized Area: " . $myTriangle->Resize("$percent")  . "</p>";
                }
            }


        ?>
    </body>
</html>