<?php
// LES FONCTIONS DE DATE
require "assets/handle-dates.php";

//Bailleurs
$owner_id = $sheet["owner_id"];



//Locataires
$tenant_id = $sheet["tenant_id"];

//Dates
$date = $sheet["sheet_date"];
$firstDateOfMonth = getMonthInterval()[0];
$lastDateOfMonth = getMonthInterval()[1];


//Rent
$rent = $sheet["sheet_rent"];
$charges = $sheet["sheet_charges"];
$total_rent = intval($base_rent, 10) + intval($charges, 10);
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
                <!--Données Bailleurs en place-->

                <table class="stakeholder" id="owners">
                    <thead>
                        <tr>
                            <th>Bailleurs</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>
                            <?php if ($owner_id) {
                                echo ($owner_id);
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($owner_id) {
                                echo ($owner_id);
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($owner_id) {
                                echo ($owner_id);
                            } ?>
                        </td>
                    </tr>
                </table>

            </div>
            <div class="editable-data_container">

                <!--Données Locataires en place-->
                <table id="tenants" class="stakeholder">
                    <thead>
                        <tr>
                            <th>Locataires</th>
                        </tr>
                    </thead>
                    <tr>
                        <td>
                            <?php if ($tenant_id) {
                                echo ($tenant_id);
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($tenant_id) {
                                echo ($tenant_id);
                            } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <?php if ($tenant_id) {
                                echo ($tenant_id);
                            } ?>
                        </td>
                    </tr>
                </table>

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





        <p>Avis n°</p>
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
                        <?php echo ($total_rent); ?>
                    </span></td>
            </tr>

        </table>

    </main>
    <footer>
    </footer>
</body>

</html>