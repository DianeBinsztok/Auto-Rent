<?php require "partials/header.php"; ?>


<?php

if ($location) {
    echo (
        "<h1>" . $location["label"] . "</h1>
        <ul>
            <li>Dimentions : 80m2</li>
            <li>Nombre de pièces habitables : " . $location["rooms"] . "</li>
        </ul>
        <h3>Adresse :</h3>
            <ul>
                <li>" . $location["street_number"] . " " . $location["street_type"] . " " . $location["street_name"] . "</li>
                <li>" . $location["postal_code"] . " " . $location["city"] . "</li>
            </ul>

    ");
} else {
    echo "
        <h1>Un problème est survenu.</h1>
        <p>Les informations sur ce logement ne sont pas disponible pour le moment<p>
    ";
}

?>

<?php require "partials/footer.php"; ?>