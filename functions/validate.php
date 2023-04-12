<?php


function checkEmpty($value)
{
    return empty($value) ? false : true;
}

/**
 * validate Email
 *
 * @param string $email
 * @return bool
 */
function validateEmail($email)
{
    $pattern = "/^[a-z09-]+[_a-z09-]*@[a-z09-]+[a-z09-]*\.[a-z09-]+([a-z]{2-4})*$/";

    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match($pattern, $email)) {

        return false;
    }
    return true;
}
/**
 * validate password
 *
 * @param string $password
 * @return bool
 */
function validatePassword($value)
{
    if (empty($value)  && strlen($_POST['password']) < 5) {
        return false;
    }
    return true;
}
function checkLess(string $str, int $min)
{
    if ((strlen(trim($str))) <= $min) {
        return false;
    }
    return true;
}
