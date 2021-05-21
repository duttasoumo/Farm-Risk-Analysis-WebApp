<?php
		include "connection.php";
        $conn = OpenCon();
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
		$season=$_POST['season'];
        $district=$_POST['district'];
        $month=$_POST['month'];
        $table = array("cropsRabi", "cropsSummer", "cropsKharif");
            
        if($month<(int)date("m"))
            $date = (int)date("Y")+1 . "/" . $month . "/01";
        else
            $date = (int)date("Y") . "/" . $month . "/01";
            
        if($district==='ALL'){
            $i=0;
            while($i<=2){
                $sql="select cid,name,phone,district,(select name from crop where cropID=crop1) crop1,(select name from crop where cropID=crop2) crop2,(select name from crop where cropID=crop3) crop3 from farmerinfo natural join $table[$i] where $season='$date';";
                $result=mysqli_query($conn,$sql);
                if (mysqli_num_rows($result)>0) break; 
                $i=$i+1;
            }
        }else{
            $i=0;
            while($i<=2){
                $sql="select cid,name,phone,district,(select name from crop where cropID=crop1) crop1,(select name from crop where cropID=crop2) crop2,(select name from crop where cropID=crop3) crop3 from farmerinfo natural join $table[$i] where district='$district' and $season='$date';";
                $result=mysqli_query($conn,$sql);
                if (mysqli_num_rows($result)>0) break; 
                $i=$i+1;
            }
        }
		$json=array();
        if ($result)
       foreach($result as $row)
		{
			$json[]=$row;
		}
		print (json_encode($json));
        //print($sql);
		$conn->close();
		}
?>