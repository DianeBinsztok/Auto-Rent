<!DOCTYPE html>
<html lang="en">

<head>
    <title><?= $metaTitle ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $metaDescription ?>">
    <link href="<?= BASE_URL ?>/assets/stylesheets/global-style.css" rel="stylesheet" />
    <link href="<?= BASE_URL . $specificStylesheet ?>" rel="stylesheet" />
</head>

<body>
    <header>
        <nav>
            <a href="<?= BASE_URL ?>">Accueil</a>
            <a href="<?= BASE_URL ?>/dashboard">Mes biens à louer</a>
            <a href="<?= BASE_URL ?>/dashboard/new-location">Enregistrer un logement à louer</a>
            <a href="<?= BASE_URL ?>/dashboard/user">Mon profil</a>
            <a href="<?= BASE_URL ?>/login">Déconnexion</a>
        </nav>
    </header>
    <main>