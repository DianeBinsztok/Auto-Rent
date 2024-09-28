<?php require "partials/header.php"; ?>
<?php
if ($location) {
    //Titre
    $label = isset($location["label"]) ? $location["label"] : "Pas de libellé";

    //Adresse
    $streetNb = isset($location["street_number"]) ? $location["street_number"] : "n° de voie non spécifié";
    $streetType = isset($location["street_type"]) ? $location["street_type"] : "type de voie non spécifié";
    $streetName = isset($location["street_name"]) ? $location["street_name"] : "nom de voie non spécifié";
    $postalCode = isset($location["postal_code"]) ? $location["postal_code"] : "code postal non spécifié";
    $city = isset($location["city"]) ? $location["city"] : "Localité non spécifiée";
    $additionAdressInfo = $location["additional_adress_info"];

    //Caractéristiques
    $surface = isset($location["surface"]) ? $location["surface"] : "non spécifié";
    $nbOfRooms = isset($location["nb_of_rooms"]) ? $location["nb_of_rooms"] : "non spécifié";
    $energyScore = isset($location["energy_score"]) ? $location["energy_score"] : "non spécifié";

    $furnished = isset($newLocationData['furnished']) ? 1 : 0;
    $rented = isset($location["rented"]) ? 1 : 0;

    //Loyer & charges
    $rent = $location["rent"] > 0 ? $location["rent"] . "€" : "non spécifié";
    $charges = isset($location["charges"]) ? $location["charges"] : [];

    //Locataire(s)
    $tenantName = isset($location["tenant_name"]) ? $location["tenant_name"] : "non spécifié";
    $tenantEmail = isset($location["tenant_email"]) ? $location["tenant_email"] : "non spécifié";
} else {
    echo "
        <h1>Un problème est survenu.</h1>
        <p>Les informations sur ce logement ne sont pas disponible pour le moment<p>
    ";
}
?>

<h1><?= $label ?></h1>
<section>
    <h2>Adresse :</h2>
    <ul>
        <li><?= $streetNb . " " . $streetType . " " . $streetName ?></li>

        <?php
        if (isset($additionAdressInfo)) {
            echo "<li>" . $additionAdressInfo . "</li>";
        }
        ?>

        <li><?= $postalCode . " " . $city ?></li>

    </ul>

</section>
<section>
    <h2>Caractéristiques :</h2>
    <ul>
        <li><span>Surface habitable</span> : <?= $surface ?></li>
        <li><span>Score DPE</span> :<?= $energyScore ?></li>

        <?php
        if ($location["furnished"]) {
            echo "<li><span>Meublé</span></li>";
        } else {
            echo "<li><span>Non meublé</span></li>";
        }
        ?>

        <?php
        if ($location["rented"]) {
            echo "<li><span>Actuellement loué</span></li>";
        } else {
            echo "<li><span>Disponible pour location</span></li>";
        }
        ?>

    </ul>
</section>
<section>
    <h2>Loyer et charges :</h2>
    <ul>
        <li><span>Loyer</span> : <?= $rent ?></li>
        <li><span>Charges</span> :
            <?php
            if (count($charges) > 0) {
                echo "<ul>";
                foreach ($charges as $charge) {
                    echo "<li><span>" . $charge["libellé"] . "</span> :" . $charge["montant"] . "€</li>";
                }
                echo "</ul>";
            } else {
                echo "non spécifiées";
            }

            ?>
        </li>
    </ul>
</section>
<section>
    <h2>Locataire(s) :</h2>
    <ul>
        <li><span>Locataire(s) depuis</span> : 10/2024</li>
        <li><span>Nom(s)</span> :<?= $tenantName ?></li>
        <li><span>Email</span> :<?= $tenantEmail ?></li>
    </ul>
</section>


<?php require "partials/footer.php"; ?>