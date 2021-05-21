<?php
		include "connection.php";
        $conn = OpenCon();
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
        $district=$_POST['district'];
        $month=$_POST['month'];
            
        if($month<(int)date("m"))
            $date = (int)date("Y")+1 . "/" . $month . "/01";
        else
            $date = (int)date("Y") . "/" . $month . "/01";
            
        if($district==='ALL'){
            $i=0;
            while($i<=2){
                $sql="select cid,name,phone,district,(select name from tools WHERE toolId=t.toolId)tool,hours,rent from farmerinfo NATURAL JOIN toolRentalInvestment t where month='$date';";
                $result=mysqli_query($conn,$sql);
                if (mysqli_num_rows($result)>0) break; 
                $i=$i+1;
            }
        }else{
            $i=0;
            while($i<=2){
                $sql="select cid,name,phone,district,(select name from tools WHERE toolId=t.toolId)tool,hours,rent from farmerinfo NATURAL JOIN toolRentalInvestment t where district='$district' and month='$date';";
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