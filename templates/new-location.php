<?php require "partials/header.php"; ?>

<h1>Enregistrer un bien</h1>
<?php if (isset($_SESSION["message"])) {
    echo "<p id='message'>" . $_SESSION["message"] . "</p>";
    unset($_SESSION['message']);
} ?>
<form method="post" action=<?php echo BASE_URL . "/dashboard/new-location" ?>>
    <label for="location_label">Libellé du logement: </label>
    <input type="text" name="location_label" placeholder="Ex: T5 rue Victor Hugo" />
    <section class="add-location-section" id="adress-container">
        <h2>Adresse du logement :</h2>
        <label for="location_street_number">N° de voie: </label>
        <input type="text" name="location_street_number" placeholder="Ex: 25 bis" />
        <label for="location_street_type">Type de voie: </label>
        <select name="location_street_type">
            <option value="aucun">Aucun</option>
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
        <label for="location_street_name">Nom de voie: </label>
        <input type="text" name="location_street_name" placeholder="Ex: Gambetta" />
        <label for="location_postal_code">Code postal: </label>
        <input type="text" name="location_postal_code" placeholder="Ex: 75001" />
        <label for="location_city">Ville ou localité: </label>
        <input type="text" name="location_city" placeholder="Ex: Paris" />
    </section>
    <section class="add-location-section" id="informations-container">
        <h2>Informations sur le logement:</h2>
        <label for="location_surface">Surface habitable, en m²: </label>
        <input type="number" name="location_surface" />
        <p>m²</p>
        <label for="location_nb_of_rooms">Nombre de pièces: </label>
        <input type="number" name="location_nb_of_rooms" />
        <label for="location_energy_score">Classe énergétique: </label>
        <select name="location_energy_score">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
            <option value="e">E</option>
            <option value="f">F</option>
            <option value="g">G</option>
        </select>

        <label for="location_furnished">Meublé: </label>
        <input type="checkbox" name="location_furnished" />
        <label for="location_rent">Montant du loyer: </label>
        <input type="number" name="location_rent" />

        <label for="location_rented">Loué: </label>
        <input type="checkbox" name="location_rented" />

        <input type="hidden" name="location_owner_id" value=<?= $_SESSION["owner_id"] ?>>
    </section>
    <section class="add-location-section" id="tenant-info-container">
        <!-- Conditionner l'affichage de cette partie à la valeur de location_rented, avec un script JS-->
        <h2>Information sur les locataires</h2>
        <label for="name">Nom du/des locataire.s: </label>
        <input type="text" name="location_tenant-name">
        <label for="name">Email du/des locataire.s: </label>
        <input type="email" name="location_tenant-email">
    </section>
    <button>Enregistrer</button>
</form>

<?php require "partials/footer.php"; ?>