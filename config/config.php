<?php

$host = 'localhost';
$dbname ='bookstore';
$user = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

/* if($conn){
  echo "work fine";
}else{
  echo "error in connection";
} */