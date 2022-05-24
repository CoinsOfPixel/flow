<?php
    function OpenCon()
     {
     $dbhost = "localhost";
     $dbuser = "DB USER";
     $dbpass = "DB PASS";
     $db = "DB NAME";
     $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
     
     return $conn;
     }
     
    function CloseCon($conn)
     {
     $conn -> close();
     }
       
?>
