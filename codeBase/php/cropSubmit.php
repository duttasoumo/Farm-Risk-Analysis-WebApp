<?php
include "connection.php";
$conn = OpenCon();

if($_SERVER['REQUEST_METHOD']=="POST")
{
		//cid is auto-generated

		$cid=$_POST['cid'];
		$rcrop1=$_POST['rcrop1'];
		$rcrop2=$_POST['rcrop2'];
		$rcrop3=$_POST['rcrop3'];
		$scrop1=$_POST['scrop1'];
		$scrop2=$_POST['scrop2'];
		$scrop3=$_POST['scrop3'];
		$kcrop1=$_POST['kcrop1'];
		$kcrop2=$_POST['kcrop2'];
		$kcrop3=$_POST['kcrop3'];
		$rsow=$_POST['rsow'];
		$rhar=$_POST['rhar'];
		$ssow=$_POST['ssow'];
		$shar=$_POST['shar'];
		$ksow=$_POST['ksow'];
		$khar=$_POST['khar'];

		if($rsow<(int)date("m") and $rsow>0)
				$rsd = (int)date("Y")+1 . "/" . $rsow . "/01";
		else
				$rsd = (int)date("Y") . "/" . $rsow . "/01";
		if($rhar<(int)date("m") and $rhar>0)
				$rhd = (int)date("Y")+1 . "/" . $rhar . "/01";
		else
				$rhd = (int)date("Y") . "/" . $rhar . "/01";
		if($ssow<(int)date("m") and $ssow>0)
				$ssd = (int)date("Y")+1 . "/" . $ssow . "/01";
		else
				$ssd = (int)date("Y") . "/" . $ssow . "/01";
		if($shar<(int)date("m") and $shar>0)
				$shd = (int)date("Y")+1 . "/" . $shar . "/01";
		else
				$shd = (int)date("Y") . "/" . $shar . "/01";
		if($ksow<(int)date("m") and $ksow>0)
				$ksd = (int)date("Y")+1 . "/" . $ksow . "/01";
		else
				$ksd = (int)date("Y") . "/" . $ksow . "/01";
		if($khar<(int)date("m") and $khar>0)
						$khd = (int)date("Y")+1 . "/" . $khar . "/01";
				else
						$khd = (int)date("Y") . "/" . $khar . "/01";
					//	print('ok');
				if($rcrop1>0){
				$rsql="replace INTO cropsRabi(cid, sowing, harvesting, crop1, crop2, crop3) VALUES ($cid,'$rsd','$rhd',$rcrop1,$rcrop2,$rcrop3)";
				mysqli_query($conn,$rsql);
			}
				print($rsql);
				if($kcrop1>0)
				{$ksql="replace INTO cropsKharif(cid, sowing, harvesting, crop1, crop2, crop3) VALUES ($cid,'$ksd','$khd',$kcrop1,$kcrop2,$kcrop3)";mysqli_query($conn,$ksql);}
				if($scrop1>0)
				{$ssql="replace INTO cropsSummer(cid, sowing, harvesting, crop1, crop2, crop3) VALUES ($cid,'$ssd','$shd',$scrop1,$scrop2,$scrop3)";mysqli_query($conn,$ssql);}



}
$newURL="../productRisk.html?cid=$cid";
header('Location: '.$newURL);
$conn->close();
?>
