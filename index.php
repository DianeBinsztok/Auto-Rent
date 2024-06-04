<?php

try {
    require ('src/data.php');
} catch (\Throwable $e) {
    echo "Impossible d'accéder aux données";
    echo "Erreur: " . $e->getMessage();
}