<?php 
$servername = "localhost";
$username = "root";
$password = "root";
$database = "php-blog";

try{
  $pdo = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
  $pdo -> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  // echo "<h1>Connected successfully</h1>";
}
catch(PDOException $e){
  echo "<h1>Connected failed:</h1>" . $e->getMessage();
}
