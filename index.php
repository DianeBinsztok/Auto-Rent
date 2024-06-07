<?php
//require ('src/model.php');
require "src/controllers/dashboard.php";
if (isset($_GET["user"]) && $_GET["user"] !== '') {
    require "templates/dashboard.php";
} else {
    require "templates/login.php";
}

