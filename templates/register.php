<?php
require "partials/header.php";

if (isset($_SESSION["message"])) {
    echo "<div id='$_SESSION[message_color_code]'>" . $_SESSION["message"] . "</div>";
    unset($_SESSION["message"]);
}
?>

<div id="register-container">
    <form id="register-form" method="post">
        <h2>Inscrivez-vous</h2>
        <label for="new_user_name">Votre nom</label>
        <input name="new_user_name" type="text">

        <label for="new_user_email">Votre email</label>
        <input name="new_user_email" type="email">

        <label for="new_user_password">Votre mot de passe</label>
        <input name="new_user_password" type="password" id="password" required>

        <label for="confirm_password">Confirmez votre mot de passe</label>
        <input name="confirm_password" type="password" id="confirm_password" required>
        <button id="subscribe_btn" type="submit" onclick="check();">Je m'inscris</button>
    </form>
</div>

<?php require "partials/footer.php"; ?>