<?php

require_once('connection.php');
$carid=$_GET['id'];
$sql="DELETE from cars where CAR_ID=$carid";
$result=mysqli_query($con,$sql);

echo '<script>alert("VEHLICULO ELEMINADO CORRECTAMENTE")</script>';
echo '<script> window.location.href = "adminvehicle.php";</script>'; 

?>