<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/stylesheets/style.css" rel="stylesheet" />
    <link href="./assets/stylesheets/dashboard-style.css" rel="stylesheet" />
    <title>Autorent</title>
</head>

<body>
    <header>
        <?php
        if ($POST["user_email"] && $POST["user_password"]) {
            var_dump($POST["user_email"]);
            var_dump($POST["user_password"]);
        }
        ?>
    </header>
    <main>
        <h1>Vos appels de loyer</h1>

        <!--Créer un nouvel appel de loyer manuellement-->
        <div id="new_sheet_container">
            <a href="<?php echo "?user=" . $owner_id . "&action=new" ?>">Créer un nouvel appel de loyer</a>
        </div>

        <div id="sheets_container">
            <p>TEST</p>
        </div>

    </main>
    <footer>

    </footer>
</body>

</html>