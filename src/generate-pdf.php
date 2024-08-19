<?php
//Pour adapter la largeur de la cellule à la plus longue string
function getLongestStringInArray($arrayOfStrings)
{
    $longestString = "";
    foreach ($arrayOfStrings as $string) {
        if (strlen($string) > $longestString) {
            $longestString = $string;
        }
    }
    return $longestString;
}


// Si j'ai bien reçu le formulaire : générer le PDF

require "../fpdf/fpdf.php";

if ($_POST) {

    $pdf = new FPDF("P", "mm", "A4");

    // 0 - Paramètres globaux
    header('Content-Type: text/html; charset=ISO-8859-1');
    $pdf->AddPage();
    $pdf->SetFont('Helvetica', '', 12);

    /* I - ENCADRÉ PROPRIÉTAIRES */

    // 1 - Déterminer la largeur de la cellule au contenu

    // 1.1 - Le contenu
    $ownerString = mb_convert_encoding($_POST["owner_name"] . "\n" . $_POST["owner_street"] . "\n" . $_POST["owner_city"], "ISO-8859-1", 'UTF-8');

    // 1.2 - La largeur de la cellule
    $ownerCellWidth = $pdf->GetStringWidth(getLongestStringInArray([mb_convert_encoding($_POST["owner_name"], "ISO-8859-1", 'UTF-8'), mb_convert_encoding($_POST["owner_street"], "ISO-8859-1", 'UTF-8'), mb_convert_encoding($_POST["owner_city"], "ISO-8859-1", 'UTF-8')])) + 5;

    // 2 - Afficher l'encadré
    $pdf->Cell($ownerCellWidth, 10, "Bailleurs", 1, 2, "", false);
    $pdf->MultiCell($ownerCellWidth, 10, $ownerString, 1, 2);
    $pdf->Cell(150, 10, "", 0, 2);


    /* II - ENCADRÉ LOCATAIRES */

    // 1 - Déterminer la largeur de la cellule au contenu

    // Le contenu
    $tenantString = mb_convert_encoding($_POST["tenant_name"] . "\n" . $_POST["tenant_street"] . "\n" . $_POST["tenant_city"], "ISO-8859-1", 'UTF-8');

    // La largeur de la cellule
    $tenantCellWidth = $pdf->GetStringWidth(getLongestStringInArray([mb_convert_encoding($_POST["tenant_street"], "ISO-8859-1", 'UTF-8'), mb_convert_encoding($_POST["tenant_name"], "ISO-8859-1", 'UTF-8'), mb_convert_encoding($_POST["tenant_city"], "ISO-8859-1", 'UTF-8')])) + 5;


    // 2 - Pour aligner l'encadré "Locataires" à droite de la page:

    // 2.1 - Calculer la position X de la MultiCell
    $pageWidth = $pdf->GetPageWidth();
    $xPosition = $pageWidth - $tenantCellWidth - 10; // -10 pour soustraire la marge gauche

    // 2.2 - Définir la position et ajouter l'encadré
    $pdf->SetX($xPosition);
    $pdf->Cell($tenantCellWidth, 10, "Locataires", 1, 2, "L", false);
    //Avec le paramètre align 'L', la multicell se place automatiquement sur la même position que la Cell de titre
    $pdf->MultiCell($tenantCellWidth, 10, $tenantString, 1, "L", false);

    // Saut de ligne
    $pdf->Cell($pageWidth, 10, "", 0, 1);


    /* III - DATE ET PÉRIODE */

    // Saut de ligne
    $pdf->Cell($pageWidth, 10, "", 0, 2);

    $pdf->Cell($pageWidth, 10, "Appel de loyer " . $_POST["date"] . "", 0, 2, "C");

    // Saut de ligne
    $pdf->Cell($pageWidth, 10, "", 0, 2);

    $pdf->Cell(200, 10, mb_convert_encoding("Pour la période du " . $_POST["first_date_of_month"] . " au " . $_POST["last_date_of_month"], "ISO-8859-1", 'UTF-8'), 0, 2);

    // Saut de ligne
    $pdf->Cell($pageWidth, 10, "", 0, 2);


    /* IV - LOYER ET CHARGES */

    // 1 - Définition du signe '€'
    define('EURO', chr(128));


    // 2 - Les en-tête
    $pdf->Cell($pageWidth / 2 - 10, 10, mb_convert_encoding("Libellés", "ISO-8859-1", 'UTF-8'), 1, 0, "", false);
    $pdf->Cell($pageWidth / 2 - 10, 10, "Montants", 1, 1, "", false);

    // 3 - Les libellés et montants

    // 3.1 - Loyer
    $pdf->Cell($pageWidth / 2 - 10, 10, "Loyer de base : ", 1, 0);
    $pdf->Cell($pageWidth / 2 - 10, 10, $_POST["rent"] . " " . EURO, 1, 1, "R");

    // 3.2 - Charges
    $pdf->Cell($pageWidth / 2 - 10, 10, "Charges : ", 1, 0);
    $pdf->Cell($pageWidth / 2 - 10, 10, $_POST["charges"] . " " . EURO, 1, 1, "R");

    // 3.3 - Montant total
    $pdf->Cell($pageWidth / 2 - 10, 10, "Montant total : ", 1, 0);
    $pdf->Cell($pageWidth / 2 - 10, 10, $_POST["total_rent"] . " " . EURO, 1, 1, "R");

    /* V - RETOURNER LE DOCUMENT */
    $pdf->Output();
}




