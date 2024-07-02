<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/stylesheets/style.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Bonjour</h1>
    </header>
    <main style="display:flex; justify-content:space-between;">
        <form method="post" style="display:flex; flex-direction:column; margin:5rem;">
            <h2>Identifiez-vous</h2>
            <label for="email">Votre email</label>
            <input name="email" type="email">
            <label for="password">Votre mot de passe</label>
            <input name="password" type="password" required>
            <button type="submit">Je m'identifie</button>
        </form>
        <form method="post" style="display:flex; flex-direction:column">
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
            <p id="message"></p>
            <button id="subscribe_btn" type="submit" onclick="check();">Je m'inscris</button>
        </form>
    </main>
    <footer>
        <script src="./assets/login-check-script.js"></script>
    </footer>
</body>

</html>