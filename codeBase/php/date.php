<!DOCTYPE html>
<html>
<body>

<?php
    $month=1;
echo "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
if($month<(int)date("m"))
        $date = (int)date("Y")+1 . "/" . $month . "/01";
echo "Today is " . $date . "<br>";
echo "Today is " . date("l");
?>

</body>
</html>