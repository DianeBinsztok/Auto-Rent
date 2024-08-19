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
        <p>Pour quel bien et locataire souhaitez-vous éditer l'appel de loyer ?</p>
        <div id="sheets_container">
            <?php
            foreach ($allTenantsByUser as $tenant) {
                echo ("
                    <div class='tenant_card tenant-" . $tenant["tenant_id"] . "'>
                        <a href='?user=" . $owner_id . "?tenant=" . $tenant["tenant_id"] . "?action=new'>
                            <p class='sheet_card_date'>Bien loué par " . $tenant["tenant_name"] . "</p>
                            <ul>
                                <li> " . $tenant["tenant_name"] . "</li>
                                <li>" . $tenant["tenant_street"] . "</li>
                                <li>" . $tenant["tenant_city"] . "</li>
                            </ul>
                        </a>
                    </div>
                ");
            }
            ?>
        </div>

    </main>
    <footer>
    </footer>
</body>

</html>