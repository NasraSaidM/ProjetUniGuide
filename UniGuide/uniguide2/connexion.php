<?php
$server="localhost";
$utilisateur="root";
$motdepasse="";
$base="guide";
$conn=mysqli_connect($server,$utilisateur,$motdepasse,$base);
mysqli_set_charset($conn, "utf8");
?>