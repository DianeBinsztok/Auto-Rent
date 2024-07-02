<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/stylesheets/style.css" rel="stylesheet" />
    <link href="./assets/stylesheets/dashboard-style.css" rel="stylesheet" />
    <title>Autorent</title>
</head>

<body>
    <header>
    </header>
    <main>
        <div>
            <p>Filtrer la recherche:</p>
            <!--<form method="" action="">-->
            <label for="date">par date:</label>
            <input type="month" name="date" id="date-filter" value="">
            <label for="tenant">par locataire:</label>
            <select name="tenant" id="tenant-filter">
                <option value="">--Choisissez un locataire--</option>
                <?php
                foreach ($tenants as $tenant) {
                    echo ("<option value='" . $tenant["tenant_id"] . "'>" . $tenant["tenant_id"] . " - " . $tenant["tenant_name"] . "</option>");
                }
                ?>
            </select>
            <button id="clear-filters">Remettre les filtres à zéro</button>
            <!--</form>-->

        </div>
        <h1>Vos appels de loyer</h1>
        <div id="sheets_container">
            <?php
            foreach ($sheets as $sheet) {
                echo ("
                    <div class='sheet_card tenant-" . $sheet["tenant_id"] . " date-" . $sheet["sheet_date"] . "'>
                        <a href='?user=" . $owner_id . "&sheet=" . $sheet["sheet_id"] . "'>
                            <p class='sheet_card_date'>Appel de loyer du " . $sheet["sheet_date"] . "</p>
                            <ul>
                                <li>Locataire(s) : " . $sheet["tenant_name"] . "</li>
                                <li>Loyer : " . $sheet["sheet_rent"] . "</li>
                                <li>Charges : " . $sheet["sheet_charges"] . "</li>
                                <li>Réglé : <span class='sheet_paid' style='color:green'>Oui</span> </li>
                            </ul>
                        </a>
                    </div>
                ");
            }
            ?>

        </div>

    </main>
    <footer>
        <script src="./assets/scripts/sheets-filter.js"></script>
    </footer>
</body>

</html>