<?php
/*
This is the php file that establishes the connection with MySQL server.
All other php files must require, not include this file.
*/

$servername = 'phpmyadmin.in.cs.ucy.ac.cy';	//The IP or domain name of the server. Usually 127.0.0.1:80
$user = 'lagaleriedb';						//Username to login to the Database. Ask Bananas for details.
$pass = '47Z4YQvDdrw';						//Password to login to the Database. Ask Bananas for details.
$db = 'lagaleriedb';						//Name of the Database. Ask Bananas for God's sake!

$conn = mysqli_connect($servername,$user, $pass, $db) or die("Unable to connect");

echo "Great Work! <br><br><br>"; //for debugging purposes
?>