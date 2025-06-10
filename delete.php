<?php
include 'studentdata.php';
$id = intval($_GET['id']);
$sql= "DELETE FROM Application WHERE id = $id";
$result= mysqli_query($con,$sql);
header("Location: table.php");
?>
