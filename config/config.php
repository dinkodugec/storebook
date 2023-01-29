<?php

$host = 'localhost';
$dbname ='bookstore';
$user = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$secret_key = "sk_test_51MVNDvDTS9oZp98BHbNKQ4oRLM3KOStbcU35zwMT1DVDvbb96fXPKYyiqs5Td3p5WVrbRsykFnFHGBMQuqO5leeX00S3VDbMsq";

?>