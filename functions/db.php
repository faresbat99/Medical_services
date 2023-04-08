<?php
//database connection 
$conn = mysqli_connect("localhost", "root", "", "medical_serv");

if (!$conn) {
    die("Error in connection " . mysqli_connect_error());
}

function db_insert($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    return $result ? "Added Success" : false;
}   
