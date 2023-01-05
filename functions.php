<?php

function check_empty($value)
{
    if (empty($value)) {
        return false;
    } else {
        return true;
    }
}

function hashes($password)
{
    $hashed = password_hash($password, PASSWORD_BCRYPT);
    return $hashed;
}


function validate_email($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    } else {
        return true;
    }
}
