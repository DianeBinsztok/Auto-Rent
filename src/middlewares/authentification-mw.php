<?php
function authMiddleware()
{
    if (!isset($_SESSION["owner_id"])) {
        $_SESSION["message_color_code"] = "warning";
        $_SESSION["message"] = "Vous devez être connecté.e pour accéder à cette page";
        header("Location:" . BASE_URL . "/login");
        exit;
    }
}

