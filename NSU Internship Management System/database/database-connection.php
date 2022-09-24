<?php
        session_start();
        //define('site_url','http://182.163.106.50/ims/');
        define('site_url','http://localhost/NSU-Internship/');

        $hostname = "localhost";
        $username = "root";
        $password = "";
        $dbname  ="nsu-ims";

        $conn = mysqli_connect($hostname, $username, $password, $dbname);
        
?>

