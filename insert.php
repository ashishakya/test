<?php include 'header.php';
$productNameErr=$productPriceErr=$productQuantityErr="";?>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
	<b>NEW PRODUCT DETAIL ENTRY</b>
	<hr style="margin-bottom:0px;">
	<span class="error">* REQUIRED FIELDS</span><br><br>	
	Name:<input type="text" name="productName"/>
	<span class="error">*<?php echo $productNameErr;?></span> <br> 

	Price:<input type="number" name="productPrice"/>
	<span class="error">*<?php echo $productPriceErr;?></span><br>

	Quantity:<input type="number" name="productQuantity"/>
	<span class="error">*<?php echo $productQuantityErr;?></span><br>

	<input type="reset" value="Clear">
	<input type="submit" value="Store" name="submit">
</form>
<?php
	$productNameErr=$productPriceErr=$productQuantityErr="";
	if(isset($_POST["submit"])){

		function validateInput($data){
			$data = strtoupper($data);
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if(empty($_POST['productName'])) {
			$productNameErr="Name is required";
		}else{
			$productName = validateInput($_POST['productName']);
		}

		if(empty($_POST['productPrice'])) {
			$productPriceErr="Price is required";
		}else{
			$productPrice = validateInput($_POST['productPrice']);
		}

		if(empty($_POST['productQuantity'])) {
			$productQuantityErr="Quantity is required";
		}else{
			$productQuantity = validateInput($_POST['productQuantity']);
		}
		
		
		if($productNameErr=="" && $productPriceErr== "" && $productQuantityErr==""){

			// link establish
			include 'connection.php';
			
			// write the query
			$insert = "INSERT INTO `tbl_inventory` (`p_name`, `p_price`, `p_qty`) VALUES ('$productName', '$productPrice', '$productQuantity')";
			
			//execute query
			$run=mysqli_query($link,$insert);
			if($run)
			 echo"<h5>Successfully added</h5>";
			}
		else{
			echo "<span class='error'>";echo"*Fill the Requirement"; echo "</span>";
		}	


	}	
?>
	<head>
		<style type="text/css">
			.error {color: #FF0000;}
		</style>
	</head>



<hr>


</body>
</html>
