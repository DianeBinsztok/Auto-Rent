<?php require "partials/header.php"; ?>

<h1>Tableau de bord</h1>
<?php
if ($_SESSION["owner_id"]) {
    echo ("
                <section>
                    <h2>Mes biens à louer</h2>
                    <div id='locations-container'>
                    ");

    foreach ($locations as $location) {
        echo ("<div class='location' style='border: 1px solid black;'>
                                <a href='" . BASE_URL . "/dashboard?location=" . $location["id"] . "'>
                                <h3>" . $location["label"] . "</h3>
                                <p>" . $location["rooms"] . " pièce(s)</p>

                                <h3>Adresse :</h3>
                                <p>" . $location["street_number"] . " " . $location["street_type"] . " " . $location["street_name"] . "</p>
                                <p>" . $location["postal_code"] . " " . $location["city"] . "</p>
                                </a>
                            </div>");
    }

    echo ("
                    </div>
                </section>
            ");
}
?>

<?php require "partials/footer.php"; ?>