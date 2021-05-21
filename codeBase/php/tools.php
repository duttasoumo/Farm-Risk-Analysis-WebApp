<?php
		include "connection.php";
        $conn = OpenCon();
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
        $cid=$_POST['cid'];
        $sql="select toolId,name,efficiency from tools ;";
$result=mysqli_query($conn,$sql);
$json=array();
        if($result)
		foreach($result as $row)
		{
			$json['tools'][]=$row;
		}
        
        $sql1="select size from farmerinfo where cid='$cid';";
        $result1=mysqli_query($conn,$sql1);
        if ($result1 && $row1 = $result1->fetch_row()) 
            $json['size']=$row1[0];
         print (json_encode($json));
        //print($sql);
		$conn->close();
		}
?>