<html>
    <h1> Step 4</h1>
    <?php
        echo "<h1>" . "This page was rendered in PHP version: " . phpversion(); "</h1>";
        echo "<h1>" . "ZEND Version is : " . zend_version(); "</h1>";
        echo "<h1>" . "The dafault mime type is: " . ini_get("default_mimetype") . "</h1>";
    ?>
</html>
