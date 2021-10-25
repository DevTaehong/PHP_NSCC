<?php

require_once '../controller/CustomerController.php';

$custController = new CustomerController();

if(isset($_GET['idUpdate']))
{
    $custController->updateAction($_GET['idUpdate']);
}
elseif (isset($_POST['UpdateBtn']))
{
    $custController->commitUpdateAction($_POST['editCustId'],$_POST['firstName'],$_POST['lastName']);
}
else
{
    $custController->displayAction();
}

?>