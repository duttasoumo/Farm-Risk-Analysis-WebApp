<?php
include "connection.php";
$conn = OpenCon();
if($_SERVER['REQUEST_METHOD']=="POST")
{
		//cid is auto-generated
		$fName=$_POST['fName'];
		$fPhone=$_POST['fPhone'];
    $fAadhar=$_POST['fAadhar'];
		$fSex=$_POST['fSex'];
		$fVillage=$_POST['fVillage'];
		$fBlock=$_POST['fBlock'];
		$fDistrict=$_POST['fDistrict'];
		$fState=$_POST['fState'];
    $fLand=$_POST['fLand'];

    $sql="replace into farmerinfo (aadhar, name, phone, sex, village, block, district, state, size) values ('$fAadhar', '$fName', '$fPhone', '$fSex', '$fVillage', '$fBlock', '$fDistrict', '$fState', '$fLand'); ";
		//print($sql);
		mysqli_query($conn,$sql);
    $sql="select cid from farmerinfo where aadhar='$fAadhar'";
    $result=mysqli_query($conn,$sql);
		$json=array();
    if ($result)
	  	foreach($result as $row)
	      $json[]=$row;
		$cid=$json[0]['cid'];
		//echo (json_encode($json));


		$newURL="../crops.html?cid=$cid";
		header('Location: '.$newURL);
}
$conn->close();
?>
