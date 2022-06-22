<?php
function databaseConnection()
{
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "gestion-consultas-db";

    $conn = mysqli_connect($server, $username, $password, $dbname) or die("Connection failed");
    return $conn;
}
