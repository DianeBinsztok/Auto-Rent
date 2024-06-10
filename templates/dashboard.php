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
    </header>
    <main>

        <h1>Vos appels de loyer</h1>
        <?php
        foreach ($sheets as $sheet) {
            echo ("sheet id => " . $sheet["sheet_id"]);
            echo ("sheet date => " . $sheet["sheet_date"]);
            echo ("rent  => " . $sheet["sheet_rent"]);
            echo ("charges => " . $sheet["sheet_charges"]);
            echo ("owner id => " . $sheet["owner_id"]);
            echo ("tenant id => " . $sheet["tenant_id"]);
        }
        ?>

    </main>
    <footer>
        <script src="assets/forms-script.js"></script>
    </footer>
</body>

</html>