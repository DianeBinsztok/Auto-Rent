<?php require "partials/header.php"; ?>
<?php
if ($location) {
    //var_dump($location);

    //Titre
    $label = isset($location["location_label"]) ? $location["location_label"] : "Pas de libellé";

    //Adresse
    $streetNb = isset($location["location_street_number"]) ? $location["location_street_number"] : "(n° de voie non spécifié)";
    $streetType = isset($location["location_street_type"]) ? $location["location_street_type"] : "(type de voie non spécifié)";
    $streetName = isset($location["location_street_name"]) ? $location["location_street_name"] : "(nom de voie non spécifié)";
    $postalCode = isset($location["location_postal_code"]) ? $location["location_postal_code"] : "(code postal non spécifié)";
    $city = isset($location["location_city"]) ? $location["location_city"] : "(Localité non spécifiée)";
    $additionAdressInfo = $location["location_additional_adress_info"];

    //Caractéristiques
    $surface = isset($location["location_surface"]) ? $location["location_surface"] . " m²" : "non spécifiée";
    $nbOfRooms = isset($location["location_nb_of_rooms"]) ? $location["location_nb_of_rooms"] : "non spécifié";
    $energyScore = isset($location["location_energy_score"]) ? strtoupper($location["location_energy_score"]) : "non spécifié";
    $furnished = isset($newLocationData['location_furnished']) ? "Oui" : "Non";
    $rented = isset($location["location_rented"]) ? "Oui" : "Non";

    //Loyer & charges
    $rent = $location["location_rent"] > 0 ? $location["location_rent"] . " €" : "non spécifié";

    //Locataire(s)
    $tenantSince = isset($location["tenant_since_date"]) ? $location["tenant_since_date"] : " date non spécifiée";
    $tenantName = isset($location["tenant_name"]) ? $location["tenant_name"] : "non spécifié";
    $tenantEmail = isset($location["tenant_email"]) ? $location["tenant_email"] : "non spécifié";
    $tenantPhoneNb = isset($location["tenant_phone_number"]) ? $location["tenant_phone_number"] : "non spécifié";

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
    <p><?= $streetNb . " " . $streetType . " " . $streetName ?></p>

    <?php
    if (isset($additionAdressInfo)) {
        echo "<p>" . $additionAdressInfo . "</p>";
    }
    ?>

    <p><?= $postalCode . " " . $city ?></p>
</section>

<section>
    <h2>Caractéristiques :</h2>

    <table>
        <tbody>
            <tr>
                <th>Surface habitable</th>
                <td><?= $surface ?></td>
            </tr>
            <tr>
                <th>Score DPE</th>
                <td><?= $energyScore ?></td>
            </tr>
            <tr>
                <th>Meublé</th>
                <td><?= $furnished ?></td>
            </tr>
            <tr>
                <th>Loué</th>
                <td><?= $rented ?></td>
            </tr>
        </tbody>
    </table>


    <!--
    <p><span>Surface habitable</span> : <?= $surface ?></p>
    <p><span>Score DPE</span> : <?= $energyScore ?></p>

    <?php
    if ($location["furnished"]) {
        echo "<p><span>Meublé</span></p>";
    } else {
        echo "<p><span>Non meublé</span></p>";
    }
    ?>

    <?php
    if ($location["rented"]) {
        echo "<p><span>Actuellement loué</span></p>";
    } else {
        echo "<p><span>Disponible pour location</span></p>";
    }
    ?>
    -->

</section>
<section>
    <h2>Loyer et charges :</h2>

    <table>
        <tbody>
            <tr>
                <th>Loyer</th>
                <td><?= $rent ?></td>
            </tr>
            <?php
            if ($charges && count($charges) > 0) {
                echo "<tr>
                        <th>Charges</th>
                            <td>";

                foreach ($charges as $charge) {
                    echo "
                                <tr>
                                    <th>" . $charge["charge_label"] . "</th>
                                    <td>" . $charge["charge_amount"] . " €</td>
                                </tr>
                                ";
                }
                echo "</td>
                        </tr>";
                /*
    foreach ($charges as $charge) {
        echo "
            <tr>
                <th>" . $charge["charge_label"] . "</th>
                <td>" . $charge["charge_amount"] . "</td>
            </tr>
            ";
    }
            */
                echo "
                <tfoot>
                        <tr>
      <th>Montant total :</th>
      <td>" . $rent . "</td>
    </tr>
                </tfoot>
            ";
            }
            ?>
        </tbody>
    </table>

    <!--
    <p><span>Loyer</span> : <?= $rent ?></p>
    <p><span>Charges</span> :
        <?php
        if ($charges && count($charges) > 0) {
            echo "<ul>";
            foreach ($charges as $charge) {
                echo "<li><span>" . $charge["charge_label"] . "</span> :" . $charge["charge_amount"] . "€</li>";
            }
            echo "</ul>";
        } else {
            echo "non spécifiées";
        }

        ?>
    </p>
    -->
</section>
<section>
    <h2>Locataire(s) :</h2>

    <table>
        <tbody>
            <tr>
                <th>Locataire(s) depuis</th>
                <td><?= $tenantSince ?></td>
            </tr>
            <tr>
                <th>Nom(s)</th>
                <td><?= $tenantName ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td>
                    <address><?= $tenantEmail ?></address>
                </td>
            </tr>
            <tr>
                <th>N° de téléphone</th>
                <td>
                    <address><?= $tenantPhoneNb ?></adress>
                </td>
            </tr>
        </tbody>
    </table>

    <!--
    <p><span>Locataire(s) depuis</span> : <?= $tenantSince ?></p>
    <p><span>Nom(s)</span> : <?= $tenantName ?></p>
    <p><span>Email</span> :<?= $tenantEmail ?></p>
    <p><span>N° de téléphone</span> :<?= $tenantPhoneNb ?></p>
    --


>


</section>


<?php require "partials/footer.php"; ?>