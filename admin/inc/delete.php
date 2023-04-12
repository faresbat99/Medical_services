<?php
require_once("../../functions/db.php");
$table = $_GET['table'];
$field = $_GET['field'];
$item_id = $_GET['item_id'];

$sql = "DELETE FROM `$table` WHERE `$field`='$item_id'";

$result = deleteRow($sql);

$data['message'] = $result ? "success" : "error";

json_encode($data);
