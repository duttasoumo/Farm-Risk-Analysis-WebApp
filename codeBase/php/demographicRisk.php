<?php
include "connection.php";
$conn = OpenCon();
if($_SERVER['REQUEST_METHOD']=="POST")
{

$cid=$_POST['cid'];
$yield1=$_POST['yield1'];
$yield2=$_POST['yield2'];
$yield3=$_POST['yield3'];
$yield4=$_POST['yield4'];
$yield5=$_POST['yield5'];
$ret1=$_POST['ret1'];
$ret2=$_POST['ret2'];
$ret3=$_POST['ret3'];
$ret4=$_POST['ret4'];
$ret5=$_POST['ret5'];

$avgYield=$yield1+$yield2+$yield3+$yield4+$yield5;
$avgYield/=5;
$avgRet=$ret1+$ret2+$ret3+$ret4+$ret5;
$avgRet/=5;
$threshold=150;
$shortfall=$threshold-$yield5;
$indemnity=$shortfall/$threshold*$avgRet;
$risk=1-$indemnity/1000;
if($risk<0)$risk=0;
print($risk);
$conn->close();
}
?>
