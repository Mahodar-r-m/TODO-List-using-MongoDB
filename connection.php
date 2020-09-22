<?php 
    // Including library into our php
    require 'vendor/autoload.php';

    // Create connection

    // Local host
    $conn=new MongoDB\Client("mongodb://localhost:27017"); //Type carefully bcoz it's case sensitive

?>