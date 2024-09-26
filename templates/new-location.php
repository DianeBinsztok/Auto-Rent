<?php require "partials/header.php"; ?>

<h1>Enregistrer un bien</h1>
<form method="post" action=<?php echo BASE_URL . "/dashboard/new-location" ?>>
    <?
    //libellé - texte
    // Adresse : 
    // n de voie - texte
    // type de voie - menu déroulant
    // nom de voie - texte
    // code postal - texte
    // ville- texte
    // nb de pièces - nb
    // surface habitable en m2 - nb
    // classe énergétique - menu déroulant
    // meublé - bool
    // Loué ou pas - bool
    // si loué : nom et email du-des locataire.s - texte
    ?>
    <label for="location_title">Libellé du logement: </label>
    <input type="text" name="location-title" placeholder="Ex: T5 rue Victor Hugo" />
    <section class="add-location-section" id="adress-container">
        <h2>Adresse du logement :</h2>
        <label for="location_street-number">N° de voie: </label>
        <input type="text" name="location_street-number" placeholder="Ex: 25 bis" />
        <label for="location_street-type">Type de voie: </label>
        <select name="location_street-type">
            <option value="allee">Allée</option>
            <option value="avenue">Avenue</option>
            <option value="boulevard">Boulevard</option>
            <option value="chemin">Chemin</option>
            <option value="cours">Cours</option>
            <option value="impasse">Impasse</option>
            <option value="jardin">Jardin</option>
            <option value="parvis">Parvis</option>
            <option value="promenade">Promenade</option>
            <option value="place">Place</option>
            <option value="quai">Quai</option>
            <option value="rond-point">Rond-point</option>
            <option value="route">Route</option>
            <option value="rue">Rue</option>
            <option value="ruelle">Ruelle</option>
            <option value="square">Square</option>
        </select>
        <label for="location_street-name">Nom de voie: </label>
        <input type="text" name="location_street-name" placeholder="Ex: Gambetta" />
        <label for="location_postal-code">Code postal: </label>
        <input type="text" name="location_postal-code" placeholder="Ex: 75001" />
        <label for="location_city">Ville ou localité: </label>
        <input type="text" name="location_city" placeholder="Ex: Paris" />
    </section>
    <section class="add-location-section" id="informations-container">
        <h2>Informations sur le logement:</h2>
        <label for="location_surface">Surface habitable, en m²: </label>
        <input type="number" name="location_surface" />
        <p>m²</p>
        <label for="location_nb-of-rooms">Nombre de pièces: </label>
        <input type="number" name="location_energy-class" />
        <label for="location_energy-class">Classe énergétique: </label>
        <select name="">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
            <option value="e">E</option>
            <option value="f">F</option>
            <option value="g">G</option>
        </select>

        <label for="location_furnished">Meublé: </label>
        <input type="radio" name="location_furnished">

        <label for="location_rented">Loué: </label>
        <input type="radio" name="location_rented">
    </section>
    <section class="add-location-section" id="tenant-info-container">
        <h2>Information sur les locataires</h2>
        <label for="name">Nom du/des locataire.s: </label>
        <input type="text" name="location_tenant-name">
        <label for="name">Email du/des locataire.s: </label>
        <input type="email" name="location_tenant-email">
    </section>
    <button>Enregistrer</button>
</form>

<?php require "partials/footer.php"; ?>