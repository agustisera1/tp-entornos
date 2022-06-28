<?php
function databaseConnection()
{
    $server = "localhost";
    $username = "fiido";
    $password = "admin";
    $dbname = "gestion-consultas-db";

    $conn = mysqli_connect($server, $username, $password, $dbname) or die("Connection failed");
    return $conn;
}
