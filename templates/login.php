<?php require "partials/header.php"; ?>

<?php if (isset($_SESSION["message"])) {
    echo "<p id='message'>" . $_SESSION["message"] . "</p>";
    unset($_SESSION["message"]);
} ?>

<div id="login-or-register_container">
    <form id="login-form" method="post" action=<?php echo BASE_URL . "/login" ?>>
        <h2>Identifiez-vous</h2>
        <label for="user_email">Votre email</label>
        <input name="user_email" type="email" required>
        <label for="user_password">Votre mot de passe</label>
        <input name="user_password" type="password" required>
        <button type="submit">Je m'identifie</button>
    </form>

    <form id="register-form" method="post">
        <p>Pas encore inscrit?</p>
        <h2>Inscrivez-vous ici</h2>
        <label for="name">Votre nom</label>
        <input name="name" type="text">

        <label for="email">Votre email</label>
        <input name="email" type="email">

        <label for="password">Votre mot de passe</label>
        <input name="password" type="password" id="password" required>

        <label for="confirm_password">Confirmez votre mot de passe</label>
        <input name="confirm_password" type="password" id="confirm_password" required>
        <button id="subscribe_btn" type="submit" onclick="check();">Je m'inscris</button>
    </form>
</div>
<?php require "partials/footer.php"; ?>