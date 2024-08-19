<?php
// LES FONCTIONS DE DATE
require "assets/handle-dates.php";

$sheet_id = $sheet["sheet_id"];
// Si on reçoit des données en POST, update en base de données et rafficher la page
//Bailleurs
if ($_POST["owner_name"]) {
    $owner_name = $_POST["owner_name"];
} else {
    $owner_name = $sheet["owner_name"];
}
if ($_POST["owner_street"]) {
    $owner_street = $_POST["owner_street"];
} else {
    $owner_street = $sheet["owner_street"];
}
if ($_POST["owner_city"]) {
    $owner_city = $_POST["owner_city"];
} else {
    $owner_city = $sheet["owner_city"];
}


//Locataires



if ($_POST["tenant_name"]) {
    $tenant_name = $_POST["tenant_name"];
} else {
    $tenant_name = $sheet["tenant_name"];
}
if ($_POST["tenant_street"]) {
    $tenant_street = $_POST["tenant_street"];
} else {
    $tenant_street = $sheet["tenant_street"];
}
if ($_POST["tenant_city"]) {
    $tenant_city = $_POST["tenant_city"];
} else {
    $tenant_city = $sheet["tenant_city"];
}
//Dates
$date = getMonthAndYear($sheet["sheet_date"]);

$firstDateOfMonth = getMonthInterval($sheet["sheet_date"])[0];
$lastDateOfMonth = getMonthInterval($sheet["sheet_date"])[1];


//Rent
$rent = $sheet["sheet_rent"];
$charges = $sheet["sheet_charges"];
$total_rent = intval($rent, 10) + intval($charges, 10);
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
        <img id="logo" src="./assets/rophie-logo.png" alt="Rophie location">

        <section id="stakeholders_container">
            <div class="editable-data_container">
                <div class="editable-data">
                    <!--Données Bailleurs en place-->
                    <button class="button full-width-button display_form" type="button">Modifier les données bailleurs
                    </button>
                    <table class="stakeholder" id="owner">
                        <thead>
                            <tr>
                                <th>Bailleurs</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
                                <?php if ($owner_name) {
                                    echo ($owner_name);
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($owner_street) {
                                    echo ($owner_street);
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($owner_city) {
                                    echo ($owner_city);
                                } ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--Formulaire pour modifier les données Bailleurs-->
                <form class="stakeholder_form hide" id="owner-form" action="#" method="post">
                    <div class="input-container">
                        <label for="owner_name">Nom des bailleurs</label>
                        <input name="owner_name" type="text" value="<?php echo ($owner_name) ?>">
                    </div>
                    <div class="input-container">
                        <label for="owner_street">N° et libellé de la voie</label>
                        <input name="owner_street" type="text" value="<?php echo ($owner_street) ?>">
                    </div>
                    <div class="input-container">
                        <label for="owner_city">Code postal et ville</label>
                        <input name="owner_city" type="text" value="<?php echo ($owner_city) ?>">
                    </div>
                    <div class="input-container submit_changes">
                        <!--Enregistrer les modifications-->
                        <input class="button" id="submitOwnersForm" type="submit" value="Enregistrer les modifications">
                    </div>
                </form>
            </div>
            <div class="editable-data_container">
                <div class="editable-data">
                    <!--Données Locataires en place-->
                    <button class="button full-width-button display_form" type="button">Modifier les données
                        locataires</button>
                    <table id="tenant" class="stakeholder">
                        <thead>
                            <tr>
                                <th>Locataires</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
                                <?php if ($tenant_name) {
                                    echo ($tenant_name);
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($tenant_street) {
                                    echo ($tenant_street);
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($tenant_city) {
                                    echo ($tenant_city);
                                } ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--Formulaire pour modifier les données Bailleurs-->
                <form class="stakeholder_form hide" action="#" method="post">
                    <div class="input-container">
                        <label for="tenant_name">Nom des locataires</label>
                        <input name="tenant_name" type="text" value="<?php echo ($tenant_name) ?>">
                    </div>
                    <div class="input-container">
                        <label for="tenant_street">N° et libellé de la voie</label>
                        <input name="tenant_street" type="text" value="<?php echo ($tenant_street) ?>">
                    </div>
                    <div class="input-container">
                        <label for="tenant_city">Code postal et ville</label>
                        <input name="tenant_city" type="text" value="<?php echo ($tenant_city) ?>">
                    </div>
                    <div class="input-container submit_changes">
                        <input class="button" type="submit" value="Enregistrer les modifications">
                    </div>
                </form>
            </div>
        </section>
    </header>
    <main>

        <h1>Avis d'échéance</h1>
        <!--La date donnée-->
        <h2>Loyer
            <?php if ($date) {
                echo ($date);
            } ?>
        </h2>





        <p>Avis n° <?php if ($sheet_id) {
            echo ($sheet_id);
        } ?>
        </p>
        <p>Pour la période du <span class="highlight">
                <?php if ($firstDateOfMonth) {
                    echo ($firstDateOfMonth);
                } ?>
            </span> au <span class="highlight">
                <?php if ($lastDateOfMonth) {
                    echo ($lastDateOfMonth);
                } ?>
            </span></p>
        <table id="values-table">
            <thead>
                <tr>
                    <th scope="col">Libellé</th>
                    <th scope="col">Montant</th>
                </tr>
            </thead>
            <tr>
                <th scope="row">Loyer mensuel contractuel :</th>
                <td>
                    <div>
                        <?php if ($rent) {
                            echo ($rent . " €");
                        } ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">Charges locatives mensuelles contractuelles :</th>
                <td>
                    <div>
                        <?php if ($charges) {
                            echo ($charges . " €");
                        } ?>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">Montant total dû :</th>
                <td><span class="highlight" id="sum">
                        <?php echo ($total_rent . " €"); ?>
                    </span></td>
            </tr>

        </table>
        <form action="src/generate-pdf.php" method="post">
            <input type="hidden" name="sheet_id" value="<?php echo $sheet_id ?>">
            <input type="hidden" name="owner_name" value="<?php echo $owner_name ?>">
            <input type="hidden" name="owner_street" value="<?php echo $owner_street ?>">
            <input type="hidden" name="owner_city" value="<?php echo $owner_city ?>">
            <input type="hidden" name="tenant_name" value="<?php echo $tenant_name ?>">
            <input type="hidden" name="tenant_street" value="<?php echo $tenant_street ?>">
            <input type="hidden" name="tenant_city" value="<?php echo $tenant_city ?>">
            <input type="hidden" name="date" value="<?php echo $date ?>">
            <input type="hidden" name="first_date_of_month" value="<?php echo $firstDateOfMonth ?>">
            <input type="hidden" name="last_date_of_month" value="<?php echo $lastDateOfMonth ?>">
            <input type="hidden" name="rent" value="<?php echo $rent ?>">
            <input type="hidden" name="charges" value="<?php echo $charges ?>">
            <input type="hidden" name="total_rent" value="<?php echo $total_rent ?>">
            <button>Créer un nouvel appel de loyer</button>
        </form>
    </main>
    <footer>
        <script src="./assets/scripts/forms-script.js"></script>
    </footer>
</body>

</html>