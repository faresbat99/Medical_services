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
function db_update($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    return $result ? "Updated Success" : false;
}
function deleteRow($sql)
{
    global $conn;
    $result = mysqli_query($conn, $sql);
    return $result ? "Delete Success" : false;
}

function getRow($table, $field, $value)
{
    global $conn;
    $sql = "SELECT * FROM `$table` WHERE `$field`='$value' LIMIT 1";
    $rows = [];
    if ($result = mysqli_query($conn, $sql)) {
        $rows[] = mysqli_fetch_assoc($result);
        return $rows[0];
    }
    return false;
}
function getRows($table)
{
    global $conn;
    $sql = "SELECT * FROM `$table`";
    $rows = [];
    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
    }
    return $rows;
}
