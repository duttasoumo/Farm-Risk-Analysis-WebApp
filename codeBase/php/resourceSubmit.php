SeedWeedicide<?php
include "connection.php";
$conn = OpenCon();

if($_SERVER['REQUEST_METHOD']=="POST")
{
		//cid is auto-generated
		$cid=$_POST['cid'];
    $seed=$_POST['seed'];
		$fert=$_POST['fert'];
		$pest=$_POST['pest'];
		$weed=$_POST['weed'];
		$manure=$_POST['manure'];
		$risk=$_POST['risk'];
		$sql1="select district,size from farmerinfo where cid='$cid';";
        $result1=mysqli_query($conn,$sql1);
        if ($result1 && $row1 = $result1->fetch_row()) {
            $district=$row1[0];
            $size=$row1[1];
        }
		if($seed>0 and $_POST['seedRisk']<0.9){
			$sql="replace INTO resourceinvestment(cid, resourceId, investment) VALUES ($cid,(SELECT resourceId FROM resources WHERE name='Seed'),$seed/$size)";
			mysqli_query($conn,$sql);
			$sql="update standerds set avgPrice=(select avg(investment) from resourceInvestment natural join farmerinfo where district = '$district' and resourceId in (SELECT resourceId FROM resources WHERE name='Seed')) where district = '$district' and resourceId in (SELECT resourceId FROM resources WHERE name='Seed');";
			mysqli_query($conn,$sql);
		}
		if($fert>0 and $_POST['fertRisk']<0.9){
			$sql="replace INTO resourceinvestment(cid, resourceId, investment) VALUES ($cid,(SELECT resourceId FROM resources WHERE name='Fertilizer'),$fert/$size)";
			mysqli_query($conn,$sql);
			$sql="update standerds set avgPrice=(select avg(investment) from resourceInvestment natural join farmerinfo where district = '$district' and resourceId in (SELECT resourceId FROM resources WHERE name='Fertilizer')) where district = '$district' and resourceId in (SELECT resourceId FROM resources WHERE name='Fertilizer');";
			mysqli_query($conn,$sql);
		}
		if($pest>0  and $_POST['pestRisk']<0.9){
			$sql="replace INTO resourceinvestment(cid, resourceId, investment) VALUES ($cid,(SELECT resourceId FROM resources WHERE name='Pesticide'),$pest/$size)";
			mysqli_query($conn,$sql);
			$sql="update standerds set avgPrice=(select avg(investment) from resourceInvestment natural join farmerinfo where district = '$district' and resourceId in (SELECT resourceId FROM resources WHERE name='Pesticide')) where district = '$district' and resourceId in (SELECT resourceId FROM resources WHERE name='Pesticide');";
			mysqli_query($conn,$sql);
		}
		if($weed>0  and $_POST['weedRisk']<0.9){
			$sql="replace INTO resourceinvestment(cid, resourceId, investment) VALUES ($cid,(SELECT resourceId FROM resources WHERE name='Weedicide'),$weed/$size)";
			mysqli_query($conn,$sql);
			$sql="update standerds set avgPrice=(select avg(investment) from resourceInvestment natural join farmerinfo where district = '$district' and resourceId in (SELECT resourceId FROM resources WHERE name='Weedicide')) where district = '$district' and resourceId in (SELECT resourceId FROM resources WHERE name='Weedicide');";
			mysqli_query($conn,$sql);
		}
		if($manure>0  and $_POST['manureRisk']<0.9){
			$sql="replace INTO resourceinvestment(cid, resourceId, investment) VALUES ($cid,(SELECT resourceId FROM resources WHERE name='Manure'),$manure/$size)";
			mysqli_query($conn,$sql);
			$sql="update standerds set avgPrice=(select avg(investment) from resourceInvestment natural join farmerinfo where district = '$district' and resourceId in (SELECT resourceId FROM resources WHERE name='Manure')) where district = '$district' and resourceId in (SELECT resourceId FROM resources WHERE name='Manure');";
			mysqli_query($conn,$sql);
		}
		$sql="UPDATE risks SET resourceRisk = '$risk' WHERE cid = '$cid' ;";
		mysqli_query($conn,$sql);
		echo($sql);
        //add database replaceion here

		$newURL="../tools.html?cid=$cid";
		header('Location: '.$newURL);
}
$conn->close();
?>
