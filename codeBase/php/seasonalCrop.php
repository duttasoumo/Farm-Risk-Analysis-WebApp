<?php
		include "connection.php";
        $conn = OpenCon();
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
		$cid=$_POST['cid'];
        $season=$_POST['season'];
        $json=array();
        $table="crops".$season;
        $sql1="select (select name from crop where cropId=crop1)crop1,(select name from crop where cropId=crop2)crop2, (select name from crop where cropId=crop3)crop3,sowing,harvesting from $table where cid='$cid';";
        //echo($sql1);
        $result1=mysqli_query($conn,$sql1);
        if ($result1)
        foreach($result1 as $row)
            $json[]=$row;
        
        print (json_encode($json));
		$conn->close();
        }
?>