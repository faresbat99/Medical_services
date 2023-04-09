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

function get_row($table, $field, $value)
{
    global $conn;
    $sql = "SELECT * FROM `$table` WHERE `$field`='$value' LIMIT 1" ;
    $rows=[];
    if ($result= mysqli_query($conn, $sql))
    {
        $rows[]=mysqli_fetch_assoc($result);
        return $rows[0];
    }
    return false;
}
