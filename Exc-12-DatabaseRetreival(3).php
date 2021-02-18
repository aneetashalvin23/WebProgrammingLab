<?php
include "dbconnection.php";
$sql="select * from registration";
$sel=mysqli_query($dbcon,$sql);
if(mysqli_num_rows($sel))
{
  echo "<table border=1 style='border-collapse:collapse;'>";
 while($r=mysqli_fetch_assoc($sel))
 {
 	echo "<tr><td>".$r['Name']."</td><td>".$r['Phone number']."</td><td>".$r['Email']."</td><td>".$r['Password']."</td></tr>";
 }
 echo "</table>";
}
else
{
	echo "<script>alert('No data found');</script>";
}
?>