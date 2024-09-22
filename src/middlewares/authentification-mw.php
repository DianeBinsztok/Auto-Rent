<?php
function authMiddleware()
{
    if (!isset($_SESSION["owner_id"])) {
        header("Location:" . BASE_URL . "/login");
        exit;
    }
}

