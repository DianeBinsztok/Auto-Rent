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
        <a href="">Mes documents</a>
        <a href="">Mes appels de loyer</a>
        <a href="">Mon profil</a>
    </nav>
    <main>
        <h1>Tableau de bord</h1>
        <?php
        if ($owner_id) {
            //var_dump($locations);
            echo ("
                <section>
                    <h2>Mes biens à louer</h2>
                    <div id='locations-container'>
                    ");

            foreach ($locations as $location) {
                echo ("<div class='location' style='border: 1px solid black;'>
                                <h3>" . $location["label"] . "</h3>
                                <p>" . $location["rooms"] . " pièce(s)</p>

                                <h3>Adresse :</h3>
                                <p>" . $location["street_number"] . " " . $location["street_type"] . " " . $location["street_name"] . "</p>
                                <p>" . $location["postal_code"] . " " . $location["city"] . "</p>
                            </div>");
            }

            echo ("
                    </div>
                </section>
            ");
        }
        if ($tenant_id) {
            echo ("
            <section>
                <h2>Mes informations locataire:</h2>
                <h3>" . $tenant["name"] . "</h3>
                <h3>Adresse :</h3>
                <p>" . $tenant["label"] . "</p>
                <p>" . $tenant["street_number"] . " " . $tenant["street_type"] . " " . $tenant["street_name"] . "</p>
                <p>" . $tenant["postal_code"] . " " . $tenant["city"] . "</p>
            </section>
            ");
        }
        ?>



    </main>
    <footer>

    </footer>
</body>

</html>