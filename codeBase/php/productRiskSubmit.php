<?php
include "connection.php";
$conn = OpenCon();
if($_SERVER['REQUEST_METHOD']=="POST")
{
$dRisk=$_POST['totalRisk'];
$cid=$_POST['cid'];

$sql="replace INTO risks (cid, productRisk) VALUES ('$cid', '$dRisk');";
print($sql);
mysqli_query($conn,$sql);
}
$newURL="../resources.html?cid=$cid";
header('Location: '.$newURL);
$conn->close();
?>
