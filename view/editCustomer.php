<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Customer Update</title>
    </head>
    <body>
        <h1>Edit Customer:</h1>
        <form id="formUpdate" name="formUpdate" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">  
            <p>    
		<label>Customer ID: 
                    <input type="text" 	readonly="readonly" name="editCustId" id="editCustId" value="<?php echo $currentCustomer->getID();?>"/> 
                </label>  
            </p>
            <p>    
		<label>First Name: 
                    <input type="text" name="firstName" id="firstName" value="<?php echo $currentCustomer->getFirstName();?>"/> 
                </label>  
            </p>  
            <p>    
		<label>Last Name:
                    <input type="text" name="lastName" id="lastName" value="<?php echo $currentCustomer->getLastName();?>"/>
                </label>  
            </p>  
            <p> 
                <input type="submit" name="UpdateBtn" id="UpdateBtn" value="Update" onclick="return confirm('Really Update?')"/>  
            </p>
        </form>
    </body>
</html>
