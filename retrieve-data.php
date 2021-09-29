<?php


include 'mydbCon.php';

$query="select * from manga limit 100"; // limit may vary
$c_query="select * from chapters";

$result=mysqli_query($dbCon,$query);
$c_result=mysqli_query($dbCon,$c_query);

?>