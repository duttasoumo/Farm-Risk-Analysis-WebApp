<?php
include "connection.php";
$conn = OpenCon();
if($_SERVER['REQUEST_METHOD']=="POST")
{
$cid=$_POST['cid'];
$json=array();
$sql1="select name,cropId from crop ;";
$result1=mysqli_query($conn,$sql1);
if($result1)
foreach($result1 as $rowCrop)
		{
			$json['allCrops'][]=$rowCrop;
		}
$sql2="select district from farmerinfo where cid='$cid';";
        $result2=mysqli_query($conn,$sql2);
        if ($result2 && $row2 = $result2->fetch_row()) 
            $district=$row2[0];

 $table = array("cropsRabi", "cropsSummer", "cropsKharif");
 $x=array("crop1","crop2","crop3","sowing","harvesting");
    $i=0;
while($i<=2){
    $j=0;
    while($j<=4){
    $sql="select $x[$j] from $table[$i] natural join farmerinfo where district='$district' group by $x[$j] order by count($x[$j]) desc limit 1;";
       // print($sql);
    $result=mysqli_query($conn,$sql);
    if ($result && $row = $result->fetch_row())
        $json[$table[$i]][$x[$j]]=$row[0];
    $j++;
    }
    $i++;
}
    print (json_encode($json));
		$conn->close();
        }
?>