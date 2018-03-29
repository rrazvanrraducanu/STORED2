<?php
$dbms="mysql";
$host="localhost";
$db="flori";
$user="root";
$pass="";
$dsn="$dbms:host=$host;dbname=$db";
$con=new PDO($dsn, $user, $pass);
