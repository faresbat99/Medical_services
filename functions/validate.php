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
$pattern="/^[a-z09-]+[_a-z09-]*@[a-z09-]+[a-z09-]*\.[a-z09-]+([a-z]{2-4})*$/";

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match($pattern,$email)) {
        
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
