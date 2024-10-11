<?php
function createSession($user_id, $user_email)
{
    //session_start();
    $_SESSION["session_id"] = session_id();
    $_SESSION["owner_id"] = $user_id;
    $_SESSION["owner_email"] = $user_email;
    return $_SESSION;
}
