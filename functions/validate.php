<?php

$error_fields=[];
function checkEmpty($value){
    return empty($value)? false:true;
}
function validateName($name)
{
    return (!empty($name) && isset($_POST["name"])) ? true : false;
}
function validateEmail($email)
{
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {

        return false;
    }
    return true;
}
function validatePassword($value)
{
    if (empty($email)  && strlen($_POST['password']) < 5) {
        return false;
    }
    return true;
}
