<?php 
include 'header.php';
include 'connection.php';
$query = "SELECT * FROM `tbl_inventory`";
$run = mysqli_query($link,$query);
echo "<table class='table'>
		<thead class='table table-sm'>
			<tr>	      
		      <th scope='col'>Id</th>
		      <th scope='col'>Product</th>
		      <th scope='col'>Price</th>
		      <th scope='col'>Quantity</th>
			</tr>
		</thead>";
		while($row=mysqli_fetch_array($run)){
			echo "<tbody><tr>";
				 echo "<td>".$row['p_id']."</td>";
			     echo "<td>".$row['p_name']."</td>";
			     echo "<td>".$row['p_price']."</td>";
			     echo "<td>".$row['p_qty']."</td>";
		    echo "</tr>";
		}  
		echo"</tbody>	</table>";
?>