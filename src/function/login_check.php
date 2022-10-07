<?php

class login_check
{
    public static function checkLogin()
    {
        $result = false;

        // セッションにログインユーザが入っていなかったらfalse
        if (isset($_SESSION['check'])) {
            return $result = true;
        }

        return $result;
    }
}
