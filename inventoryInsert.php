<?php

include 'connection.php';
$productName = strtoupper(($_POST['productName']));
$productPrice = $_POST['productPrice'];
$productQuantity = $_POST['productQuantity'];
$insert = "INSERT INTO `tbl_inventory` (`p_name`, `p_price`, `p_qty`) VALUES ('$productName', '$productPrice', '$productQuantity')";
$run=mysqli_query($link,$insert);
if($run)
 echo"<h1> Successfully added</h1>";
?>