<?php
include "connection.php";
$conn = OpenCon();

if($_SERVER['REQUEST_METHOD']=="POST")
{
		//cid is auto-generated
		$cid=$_POST['cid'];
        $dRisk=$_POST['dRisk'];
$sql="UPDATE risks SET demographicRisk = '$dRisk' WHERE cid = $cid ;";
mysqli_query($conn,$sql);
        //add database insertion here

		$newURL="../allrisks.html?cid=$cid";
			header('Location: '.$newURL);
}
$conn->close();
?>
