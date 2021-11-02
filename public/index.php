<?php

require_once '../controller/CustomerController.php';

$custController = new CustomerController();

// routing the request to the correct controller action
if(isset($_GET['idUpdate']))
{
    $custController->updateAction($_GET['idUpdate']);
}
elseif (isset($_GET['idDelete'])){
    $custController->deleteAction($_GET['idDelete']);
}
elseif (isset($_GET['create'])){
    $custController->createAction();//load the form

}
elseif (isset($_POST['UpdateBtn']))
{
    $custController->commitUpdateAction($_POST['editCustId'],$_POST['firstName'],$_POST['lastName']);
}
elseif (isset($_POST['CreateBtn'])){
    $custController->commitCreateAction($_POST['firstName'], $_POST['lastName']);
}
else
{
    $custController->displayAction(); //display customers
}

?>