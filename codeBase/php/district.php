<?php
include "connection.php";
$conn = OpenCon();
$sql="select distinct(district) district from farmerinfo ;";
$result=mysqli_query($conn,$sql);
$json=array();
        if($result)
		foreach($result as $row)
		{
			$json[]=$row;
		}
		print (json_encode($json));
		$conn->close();
		
?>