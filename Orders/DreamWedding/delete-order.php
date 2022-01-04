<?php require_once('./INC/connection.php'); ?>
<?php

$OrderID = "";

if (isset($_GET['Order_ID'])) {

    //getting order information
    $OrderID = mysqli_real_escape_string($connection, $_GET['Order_ID']); 

} else {

    header('Location: customer-cart.php?err=OrderID_not_found');
}

$query = "DELETE from order_table where OrderID='$OrderID'";

$result = mysqli_query($connection, $query);

if ($result) {

    //query success
    header('Location: customer-cart.php?Order_deleted=success');

} else {

    //query failed
    header('Location: customer-cart.php?Order_deleted=failed');
    
}

?>