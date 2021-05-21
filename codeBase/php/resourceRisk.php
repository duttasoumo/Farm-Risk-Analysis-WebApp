<?php
		include "connection.php";
        $conn = OpenCon();
		if($_SERVER['REQUEST_METHOD']=="POST")
		{
		$cid=$_POST['cid'];
        $itemName=$_POST['resource'];
        $investment=$_POST['investment'];
        $json=array();
        $sql1="select district,size from farmerinfo where cid='$cid';";
        $result1=mysqli_query($conn,$sql1);
        if ($result1 && $row1 = $result1->fetch_row()) {
            $district=$row1[0];
            $size=$row1[1];
        }

        $sql2="select resourceId from resources where name='$itemName';";
        $result2=mysqli_query($conn,$sql2);
        if ($result2 && $row2 = $result2->fetch_row())
            $item=$row2[0];
      //  print($sql2);

        $sql3="select max(investment) max,min(investment) min from resourceInvestment where resourceId='$item' and cid in (select cid from farmerinfo where district='$district');";
        $result3=mysqli_query($conn,$sql3);
        //print($sql3);
        if ($result3 && $row3 = $result3->fetch_row()) {
            $maxPrice=$row3[0];
            $minPrice=$row3[1];
        }


        $sql="select avgPrice,govtPrice,leadPrice from standerds where resourceId='$item' and district='$district';";
        //print($sql);
        $result=mysqli_query($conn,$sql);
        if ($row = $result->fetch_row())
            $optimalPrice=($row[0]+$row[1]+$row[2])/3;
        $json['optimalPrice']=$optimalPrice;
        if($maxPrice == $minPrice)
            $index=0;
        else $index=($investment/$size-$optimalPrice)/($maxPrice-$minPrice);
		if($index<0) $index=0;
		if($index>1) $index=1;
        $json['index']=$index;
        print (json_encode($json));
		$conn->close();
        }
?>
