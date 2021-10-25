<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Customers</title>
        <style type="text/css">
            table
            {
               border: 1px solid purple;
            }
            th, td
            {
               border: 1px solid red;
            }
        </style>
    </head>
    <body>
        <?php
            if(!empty($lastOperationResults)):
        ?>
        <h2><?php echo $lastOperationResults; ?></h2>
        <?php
            endif;
        ?>
        <h1>Current Customers:</h1>
        <table>
            <thead>
                <tr>
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Update</th>
                    <th>Address ID</th>
                    <th>Address 1</th>
                    <th>Address 2</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach($arrayOfCustomers as $customer):
                    ?>
                        <tr>
                            <td><?php echo $customer->getID(); ?></td>
                            <td><?php echo $customer->getFirstName(); ?></td>
                            <td><?php echo $customer->getLastName(); ?></td>
                            <td>
                                <a href="<?php echo $_SERVER['PHP_SELF']; ?>?idUpdate=<?php echo $customer->getID(); ?>">
                                    <img src="images/edit_icon.png" height="25px" width="25px"/>
                                </a>
                            </td>
                            <td><?php echo $customer->getAddress()->getID(); ?></td>
                            <td><?php echo $customer->getAddress()->getAddress(); ?></td>
                            <td><?php echo $customer->getAddress()->getAddress2(); ?></td>
                        </tr>
                    <?php
                    endforeach;
                ?>
            </tbody>
            <tfoot></tfoot>
        </table>  
    </body>
</html>
