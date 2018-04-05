<?php 
    try
    {
        $con = new PDO("mysql:host=localhost;dbname=studentinfo","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "connection failed:".$e->getMessage();
    }
?>