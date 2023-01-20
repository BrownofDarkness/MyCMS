<?php
    function connextion(){
        $server = "localhost";
        $username = 'root';
        $password = '';
        $dbname = 'site_commune';

        $conn= mysqli_connect($server,$username,$password,$dbname);
        return $conn;
    }  
?>