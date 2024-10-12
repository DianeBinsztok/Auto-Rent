<?php require "partials/header.php"; ?>

<?php if (isset($_SESSION["message"])) {
    echo "<p id='$_SESSION[message_color_code]'>" . $_SESSION["message"] . "</p>";
    unset($_SESSION["message"]);
} ?>

<div id="login-container">
    <form id="login-form" method="post">
        <h2>Identifiez-vous</h2>
        <label for="user_email">Votre email</label>
        <input name="user_email" type="email" required>
        <label for="user_password">Votre mot de passe</label>
        <input name="user_password" type="password" required>
        <button type="submit">Je m'identifie</button>
    </form>

    <p>Pas encore inscrit?</p>
    <a href="<?= BASE_URL . "/register" ?>">Inscrivez-vous en quelques clics</a>
</div>
<?php require "partials/footer.php"; ?>