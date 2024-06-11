<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./assets/style.css" rel="stylesheet" />
    <title>Autorent</title>
</head>

<body>
    <header>
    </header>
    <main>

        <h1>Vos appels de loyer</h1>
        <div id="sheets_container">

            <?php
            foreach ($sheets as $sheet) {
                echo ("
                    <div class='sheet_card' style='border:1px solid grey; padding:1rem;'>
                    Appel de loyer du " . $sheet["sheet_date"] . "
                    <ul>
                        <li>Locataire(s) : " . $sheet["tenant_name"] . "</li>
                        <li>Loyer : " . $sheet["sheet_rent"] . "</li>
                        <li>Charges : " . $sheet["sheet_charges"] . "</li>
                        <li>Réglé : <span class='sheet_paid' style='color:green'>Oui</span> </li>
                    </ul>
                    <div>
                ");
            }
            ?>

        </div>

    </main>
    <footer>
        <script src="assets/forms-script.js"></script>
    </footer>
</body>

</html>