<?php require "partials/header.php"; ?>


<?php

if ($location) {
    echo (
        "<h1>" . $location["label"] . "</h1>
        <ul>
            <li>Surface habitable : 80m2</li>
            <li>Nombre de pièces : " . $location["nb_of_rooms"] . "</li>
        </ul>
        <h3>Adresse :</h3>
            <ul>
                <li>" . $location["street_number"] . " " . $location["street_type"] . " " . $location["street_name"] . "</li>");
    if ($location["additional_adress_info"]) {
        echo ("<li>" . $location["additional_adress_info"] . " " . $location["additional_adress_info"] . "</li>");
    }
    echo ("<li>" . $location["postal_code"] . " " . $location["city"] . "</li>
            </ul>");

} else {
    echo "
        <h1>Un problème est survenu.</h1>
        <p>Les informations sur ce logement ne sont pas disponible pour le moment<p>
    ";
}

?>

<?php require "partials/footer.php"; ?>