<?php
		include "connection.php";
        $conn = OpenCon();
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
        $cid=$_POST['cid'];
        $num=$_POST['num'];
        for ($x = 1; $x <= $num; $x++) {
            $type=$_POST["type$x"];
            $hours=$_POST["hours$x"];
            $month=$_POST["month$x"];
            $amount=$_POST["amt$x"];
					if($month<(int)date("m"))
		            $d = date("Y")+1 . "/" . $month . "/01";
		        else
		            $d = date("Y") . "/" . $month . "/01";

            $sql="replace INTO toolRentalInvestment(cid,toolId,month,hours,rent)VALUES($cid,$type,'$d',$hours,$amount);";

            mysqli_query($conn,$sql);
        }
            $newURL="../yield.html?cid=$cid";
header('Location: '.$newURL);
        }

$conn->close();
?>
