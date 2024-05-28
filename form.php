<?php
// LES FONCTIONS DE DATE
require "./handle-dates.php";

//Le JSON
$jsonData = json_decode(file_get_contents("./data.json"), true);

//VARIABLES (non presistantes pour l'instant)

//Bailleurs
$owners_name;
$owners_street;
$owners_city;
if ($_POST["owners_name"]) {
    $owners_name = $_POST["owners_name"];
} else {
    $owners_name = $jsonData["owners"]["names"];
}
if ($_POST["owners_street"]) {
    $owners_street = $_POST["owners_street"];
} else {
    $owners_street = $jsonData["owners"]["street"];
}
if ($_POST["owners_city"]) {
    $owners_city = $_POST["owners_city"];
} else {
    $owners_city = $jsonData["owners"]["city"];
}

//Locataires
$tenants_name;
$tenants_street;
$tenants_city;
if ($_POST["tenants_name"]) {
    $tenants_name = $_POST["tenants_name"];
} else {
    $tenants_name = $jsonData["tenants"]["names"];
}
if ($_POST["tenants_street"]) {
    $tenants_street = $_POST["tenants_street"];
} else {
    $tenants_street = $jsonData["tenants"]["street"];
}
if ($_POST["tenants_city"]) {
    $tenants_city = $_POST["tenants_city"];
} else {
    $tenants_city = $jsonData["tenants"]["city"];
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
                    <table class="stakeholder" id="owners">
                        <thead>
                            <tr>
                                <th>Bailleurs</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
                                <?php if ($owners_name) {
                                    echo ($owners_name);
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($owners_street) {
                                    echo ($owners_street);
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($owners_city) {
                                    echo ($owners_city);
                                } ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--Formulaire pour modifier les données Bailleurs-->
                <form class="stakeholder_form hidden" id="owners-form" action="form.php" method="post">
                    <div class="input-container">
                        <label for="owners_name">Nom des bailleurs</label>
                        <input name="owners_name" type="text" value="<?php echo ($owners_name) ?>">
                    </div>
                    <div class="input-container">
                        <label for="owners_street">N° et libellé de la voie</label>
                        <input name="owners_street" type="text" value="<?php echo ($owners_street) ?>">
                    </div>
                    <div class="input-container">
                        <label for="owners_city">Code postal et ville</label>
                        <input name="owners_city" type="text" value="<?php echo ($owners_city) ?>">
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
                    <table id="tenants" class="stakeholder">
                        <thead>
                            <tr>
                                <th>Locataires</th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
                                <?php if ($tenants_name) {
                                    echo ($tenants_name);
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($tenants_street) {
                                    echo ($tenants_street);
                                } ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php if ($tenants_city) {
                                    echo ($tenants_city);
                                } ?>
                            </td>
                        </tr>
                    </table>
                </div>
                <!--Formulaire pour modifier les données Bailleurs-->
                <form class="stakeholder_form hidden" action="form.php" method="post">
                    <div class="input-container">
                        <label for="tenants_name">Nom des locataires</label>
                        <input name="tenants_name" type="text" value="<?php echo ($tenants_name) ?>">
                    </div>
                    <div class="input-container">
                        <label for="tenants_street">N° et libellé de la voie</label>
                        <input name="tenants_street" type="text" value="<?php echo ($tenants_street) ?>">
                    </div>
                    <div class="input-container">
                        <label for="tenants_city">Code postal et ville</label>
                        <input name="tenants_city" type="text" value="<?php echo ($tenants_city) ?>">
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
            <form action="form.php" class="hidden" method="post">
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
        <div class="editable-data_container">
            <div class="editable-data">
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

                            <?php if ($base_rent) {
                                echo ($base_rent . " €");
                            } ?>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Charges locatives mensuelles contractuelles :</th>
                        <td>

                            <?php if ($charges) {
                                echo ($charges . " €");
                            } ?>

                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Montant total dû :</th>
                        <td><span class="highlight" id="sum">
                                <?php echo ($total_rent); ?>
                            </span></td>
                    </tr>
                </table>
                <button class="button display_form" type="button">Modifier les montants</button>
            </div>


            <form action="form.php" class="hidden" method="post">
                <label for="base_rent">Modifier le loyer :</label>
                <input class="button" type="number" name="base_rent" value="<?php echo ($base_rent) ?>">
                <input class="button" type="submit" value="Enregistrer les modifications">
                <label for="charges">Modifier les charges :</label>
                <input class="button" type="number" name="charges" value="<?php echo ($charges) ?>">
                <input class="button" type="submit" value="Enregistrer les modifications">
            </form>

        </div>

    </main>
    <footer>
        <script src="./forms-script.js"></script>
    </footer>
</body>

</html>