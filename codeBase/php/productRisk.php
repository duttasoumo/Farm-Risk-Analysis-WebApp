<?php
include "connection.php";
$conn = OpenCon();
if($_SERVER['REQUEST_METHOD']=="POST")
{
  $selling=$_POST['sellingPrice'];
      $crop=$_POST['crop'];
      $cid=$_POST['cid'];

  $sql2="select state from farmerinfo where cid='$cid';";
          $result2=mysqli_query($conn,$sql2);
          if ($result2 && $row2 = $result2->fetch_row())
              $state=$row2[0];
     $json='[
  {
    "crop": "Rice",
    "State": "Jharkhand",
    "MSP": "1550",
    "Market": "1900",
    "Max":"7600"
  },
  {
    "crop": "Wheat",
    "State": "Jharkhand",
    "Market": "1735",
    "MSP": "1600",
    "Max":"1735"
  },
  {
    "crop": "Rice",
    "State": "Andhra Pradesh",
    "MSP": "1590",
    "Market": "2950",
    "Max":"7600"
  },
  {
    "crop": "Wheat",
    "State": "Andhra Pradesh",
    "MSP": "1735",
    "Market": "2000",
    "Max":"1735"
  }
]';
$j = json_decode($json,true);
$MSP=0;
$P1=0;
$Pmax=0;
foreach ($j as $obj){
    if($obj["State"]==$state and $obj["crop"]==$crop){
      $MSP=$obj["MSP"];
      $P1=$obj["Market"];
      $Pmax=$obj["Max"];
    }
}


        $r=($selling-$MSP)/$selling;
        $P2=$selling*(1+$r);
        $risk1=($P1-$P2)/$P1;
		if($risk1<-1) $risk1=-1;
		if($risk1>1) $risk1=1;
		$risk1+=1;
		$risk1/=2;
        $json=array();
        $json['risk']=$risk1;
        print (json_encode($json));
}
?>
