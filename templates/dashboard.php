<?php
require "partials/header.php";
?>

<h1>Tableau de bord</h1>
<?php if (isset($_SESSION["message"])) {
    echo "<p id='message'>" . $_SESSION["message"] . "</p>";
    unset($_SESSION['message']);
} ?>

<?php
if ($_SESSION["owner_id"]) {

    echo "<section>
    <h2>Mes biens à louer</h2>";

    if ($locations) {
        echo "<div id='locations-container'";
        foreach ($locations as $location) {
            echo ("<div class='location' style='border: 1px solid black;'>
                                    <a href='" . BASE_URL . "/dashboard/location?location=" . $location["location_id"] . "'>
                                    <h3>" . $location["location_label"] . "</h3>
                                    <p>" . $location["location_nb_of_rooms"] . " pièce(s)</p>
    
                                    <h3>Adresse :</h3>
                                    <p>" . $location["location_street_number"] . " " . $location["location_street_type"] . " " . $location["location_street_name"] . "</p>
                                    <p>" . $location["location_postal_code"] . " " . $location["location_city"] . "</p>
                                    </a>
                                </div>");
        }
        echo "</div>";
    } else {
        echo "<p>Vous n'avez pas encore de bien enregistrés</p><a href='" . BASE_URL . "/dashboard/new-location'>Enregistrer un logement</a>";
    }
    echo "</section>";
}
require "partials/footer.php";
?>