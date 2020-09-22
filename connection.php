<?php 
    // Including library into our php
    require 'vendor/autoload.php';

    // Create connection

    // Local host
    $conn=new MongoDB\Client("mongodb://localhost:27017"); //Type carefully bcoz it's case sensitive
    // Live server - mongodb atlas
    // $conn=new MongoDB\Client("mongodb+srv://Mahodar:Mahodar%40123@cluster0.9osqq.mongodb.net/<dbname>?retryWrites=true&w=majority"); 

?>