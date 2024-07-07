<?php
// LES FONCTIONS DE DATE
require "assets/handle-dates.php";

$sheet_id = $sheet["sheet_id"];

//Bailleurs
$owner_name = $sheet["owner_name"];
$owner_street = $sheet["owner_street"];
$owner_city = $sheet["owner_city"];



//Locataires
$tenant_name = $sheet["tenant_name"];
$tenant_street = $sheet["tenant_street"];
$tenant_city = $sheet["tenant_city"];

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
                <!--Données Bailleurs en place-->

                <table class="stakeholder" id="owners">
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
            <button>Exporter en PDF</button>
        </form>
    </main>
    <footer>
    </footer>
</body>

</html>