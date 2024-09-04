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
    </header>
    <nav>
        <a href="">Accueil</a>
        <a href="">Mes biens à louer</a>
        <a href="">Enregistrer un logement à louer</a>
        <a href="">Mon profil</a>
    </nav>
    <main>
        <h1>Détail du logement</h1>
        <?php
        if ($location_id) {
            var_dump($location_id);
        }
        ?>



    </main>
    <footer>

    </footer>
</body>

</html>