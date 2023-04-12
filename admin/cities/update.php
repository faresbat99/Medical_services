<?php
require '../../config.php';
require BLA . 'inc/header.php';
require BL . 'functions/validate.php';
?>

<?php
if (isset($_POST['submit'])) {
    $city = mysqli_escape_string($conn, $_POST['name']);
    $city_id = $_POST['city_Id'];

    if (checkLess($city, 3) && checkEmpty($city)) {
        if ($row = getRow('cities', 'city_id', $city_id)) {

            $sql = "UPDATE `cities` SET `city_name` = '$city' WHERE `city_Id` = '$city_id'";
            $success_message = db_update($sql);
            header("refresh:2,url=" . BURLA . "cities");

        } else {
            
            $error_message = "Please type correct data";
            header("refresh:1,url=" . BURLA . "cities/edit.php?id=$city_id");
        }
    }else {
        $error_message = "Please write the city";
        header("refresh:1,url=" . BURLA . "cities/edit.php?id=$city_id");
    }
}





require BL . 'functions/messages.php'; ?>