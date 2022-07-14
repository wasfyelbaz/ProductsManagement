<?php

namespace elbaz\Support;

class Hash
{
    public static function make($value)
    {
        // generate random roken
        return sha1($value . time());
    }
    public static function password($passwd)
    {
        // hash the passwod using php built in function with bcrypt algo
        return password_hash($passwd, PASSWORD_BCRYPT);
    }
    public static function verify($passwd, $hashedPasswd)
    {
        // verify if password matching
        return password_verify($passwd, $hashedPasswd);
    }
}