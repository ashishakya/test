<?php include 'header.php';?>
<b>ENTRY OF EXISTING PRODUCT</b><hr>
<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  	<select name="product">
        <option value="0">Choose...</option>
        <?php
			include 'connection.php';
			$sql =  "SELECT * FROM `tbl_inventory`";
			$run = mysqli_query($link,$sql);
			while($res=mysqli_fetch_array($run)){
				
				// <option value="2">Two</option>
				// echo "<option>".$res['p_name']."</option>";

				echo "<option value='". $res['p_id'] ."'>".$res['p_name']."</option>";

			}
			
		?>
	</select>&nbsp;&nbsp;
	<input type="number" name="productQuantity" placeholder="Enter new units">	
       
    
    <button type="submit" name="submit">Submit</button>
   
</form>


<?php
	if(isset($_POST['submit'])) {
		if( !($_POST['product']==0 || empty($_POST['productQuantity'])) ) {
			// echo "validated";
			include 'connection.php';

			// UPDATE `tbl_inventory` SET `p_id`=[value-1],`p_name`=[value-2],`p_price`=[value-3],`p_qty`=[value-4] WHERE 1
			$sql =  "UPDATE `tbl_inventory` SET `p_qty`= `p_qty`+" .$_POST['productQuantity']. " WHERE `p_id`=".$_POST['product'];
			$run = mysqli_query($link,$sql);
			if($run)
				echo " Database Successfully updated";
			else{
				echo "Data is not updated in db";
			}

		}
	else{
		echo "Fields are not seleted ";
	}	

		
	}
?>


        
   