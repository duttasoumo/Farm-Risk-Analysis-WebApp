<?php
include "connection.php";
$conn = OpenCon();
if($_SERVER['REQUEST_METHOD']=="POST")
{

  $cid=$_POST['cid'];

  $sql="select productRisk, resourceRisk, demographicRisk from risks where cid='$cid';";
  $result=mysqli_query($conn,$sql);

  $json=array();
  foreach($result as $risk)
  {
    $json=$risk;
  }

  print(json_encode($json));
}

$conn->close();
?>
