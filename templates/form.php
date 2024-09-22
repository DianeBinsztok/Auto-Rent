<?php
// Test: j'ai bien accès aux sheets sur le template
var_dump(getSheetById(3));

// LES FONCTIONS DE DATE
require "assets/handle-dates.php";


//VARIABLES (non presistantes pour l'instant)

//Bailleurs
$owner_name;
$owner_street;
$owner_city;
if ($_POST["owners_name"]) {
    $owner_name = $_POST["owners_name"];
} else {
    $owner_name = "test";
}
if ($_POST["owner_street"]) {
    $owner_street = $_POST["owner_street"];
} else {
    $owners_street = "test";
}
if ($_POST["owner_city"]) {
    $owners_city = $_POST["owner_city"];
} else {
    $owners_city = "test";
}

//Locataires
$tenant_name;
$tenant_street;
$tenant_city;
if ($_POST["tenant_name"]) {
    $tenants_name = $_POST["tenant_name"];
} else {
    $tenants_name = "test";
}
if ($_POST["tenant_street"]) {
    $tenants_street = $_POST["tenant_street"];
} else {
    $tenants_street = "test";
}
if ($_POST["tenants_city"]) {
    $tenants_city = $_POST["tenant_city"];
} else {
    $tenants_city = "test";
}
//Dates
$date = getMonthAndYear();
$firstDateOfMonth = getMonthInterval()[0];
$lastDateOfMonth = getMonthInterval()[1];

//Rent
$base_rent;
$charges;
if ($_POST["base_rent"]) {
    $base_rent = $_POST["base_rent"];
    $total_rent = intval($base_rent, 10) + intval($charges, 10);
} else {
    $base_rent = $jsonData["rent"]["base"];
}
if ($_POST["charges"]) {
    $charges = $_POST["charges"];
} else {
    $charges = $jsonData["rent"]["charges"];
}
$total_rent = intval($base_rent, 10) + intval($charges, 10);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/style.css" rel="stylesheet" />
    <title>Document</title>
</head>

<body>
    <header>
        <img id="logo" src="./assets/rophie-logo.png" alt="Rophie location">


        <section id="stakeholders_container">
            <div class="editable-data_container">
                <!--Données Bailleurs en place-->
                <div class="editable-data">
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
                <form class="stakeholder_form hide" id="owner-form" action="index.php" method="post">
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
                <form class="stakeholder_form hide" action="index.php" method="post">
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
        <div class="editable-data_container">
            <!--La date donnée-->
            <div class="editable-data">
                <button class="button display_form" type="button">Modifier manuellement la date</button>
                <h2>Loyer
                    <?php if ($date) {
                        echo ($date);
                    } ?>
                </h2>
            </div>
            <!--Modification de la date-->
            <form action="index.php" class="hide" method="post">
                <label for="date">Loyer de :</label>
                <input class="button" type="date" name="date">
                <input class="button" type="submit" value="Enregistrer les modifications">
            </form>
        </div>



        <p>Avis n° 3</p>
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
                <td class="editable-data_container">
                    <div class="editable-data">
                        <?php if ($base_rent) {
                            echo ($base_rent . " €");
                        } ?>
                        <button class="button display_form" type="button">Modifier le montant</button>
                    </div>
                    <form action="index.php" class="hide" method="post">
                        <input class="button" type="number" name="base_rent"
                            value="<?php echo ($jsonData["rent"]["base"]) ?>">
                        <input class="button" type="submit" value="Enregistrer les modifications">
                    </form>
                </td>
            </tr>
            <tr>
                <th scope="row">Charges locatives mensuelles contractuelles :</th>
                <td class="editable-data_container">
                    <div class="editable-data">
                        <?php if ($charges) {
                            echo ($charges . " €");
                        } ?>
                        <button class="button display_form" type="button">Modifier le montant</button>
                    </div>
                    <form action="index.php" class="hidden" method="post">
                        <input class="button" type="number" name="charges" value="<?php echo ($charges) ?>">
                        <input class="button" type="submit" value="Enregistrer les modifications">
                    </form>
                </td>
            </tr>
            <tr>
                <th scope="row">Montant total dû :</th>
                <td><span class="highlight" id="sum">
                        <?php echo ($total_rent); ?>
                    </span></td>
            </tr>

        </table>

    </main>
    <footer>
        <script src="assets/forms-script.js"></script>
    </footer>
</body>

</html>