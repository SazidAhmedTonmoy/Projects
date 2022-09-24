<?php
        include ("../database/database-connection.php");

        session_destroy();
        header("location:../index.php"); 
?>