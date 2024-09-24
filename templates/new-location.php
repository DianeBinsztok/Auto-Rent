<?php require "partials/header.php"; ?>

<h1>Enregistrer un bien</h1>
<form action="">
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
    <label for="name">Libellé du logement: </label>
    <input type="text" name="name" id="name" placeholder="Ex: T5 rue Victor Hugo" required />
    <section class="add-location-section" id="adress-container">
        <h2>Adresse du logement :</h2>
        <label for="name">N° de voie: </label>
        <input type="text" name="name" id="name" placeholder="Ex: 25 bis" required />
        <label for="name">Type de voie: </label>
        <select name="">
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
        <label for="name">Nom de voie: </label>
        <input type="text" name="name" id="name" placeholder="Ex: Gambetta" required />
        <label for="name">Code postal: </label>
        <input type="text" name="name" id="name" placeholder="Ex: 75001" required />
        <label for="name">Ville ou localité: </label>
        <input type="text" name="name" id="name" placeholder="Ex: Paris" required />
    </section>
    <section class="add-location-section" id="informations-container">
        <h2>Informations sur le logement:</h2>
        <label for="name">Surface habitable, en m²: </label>
        <input type="number" name="name" id="name" required />
        <p>m²</p>
        <label for="name">Nombre de pièces: </label>
        <input type="number" name="name" id="name" required />
        <label for="name">Classe énergétique: </label>
        <select name="">
            <option value="a">A</option>
            <option value="b">B</option>
            <option value="c">C</option>
            <option value="d">D</option>
            <option value="e">E</option>
            <option value="f">F</option>
            <option value="g">G</option>
        </select>

        <label for="name">Meublé: </label>
        <input type="radio">

        <label for="name">Loué: </label>
        <input type="radio">
    </section>
    <section class="add-location-section" id="tenant-info-container">
        <h2>Information sur les locataires</h2>
        <label for="name">Nom du/des locataire.s: </label>
        <input type="text">
        <label for="name">Email du/des locataire.s: </label>
        <input type="email">
    </section>
    <button>Enregistrer</button>
</form>

<?php require "partials/footer.php"; ?>