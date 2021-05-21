<?php
include "connection.php";
$conn = OpenCon();
if($_SERVER['REQUEST_METHOD']=="POST")
{
		$user=$_POST['user'];
        $pass=$_POST['password'];
        $sql="select user from techinfo where user='$user' and password=SHA2('$pass',256);";
        $result=mysqli_query($conn,$sql);
        if ($result)
            print("Success");
        else
            print("Failure");
					}
					$conn->close();
					?>
