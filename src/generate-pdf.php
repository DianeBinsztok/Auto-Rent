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

    header('Content-Type: text/html; charset=ISO-8859-1');
    $pdf->AddPage();
    $pdf->SetFont('Helvetica', '', 12);

    /* I - ENCADRÉ PROPRIÉTAIRES */

    // 1 - Déterminer la largeur de la cellule au contenu

    // Le contenu
    $ownerString = mb_convert_encoding($_POST["owner_name"] . "\n" . $_POST["owner_street"] . "\n" . $_POST["owner_city"], "ISO-8859-1", 'UTF-8');

    // La largeur de la cellule
    $ownerCellWidth = $pdf->GetStringWidth(getLongestStringInArray([mb_convert_encoding($_POST["owner_name"], "ISO-8859-1", 'UTF-8'), mb_convert_encoding($_POST["owner_street"], "ISO-8859-1", 'UTF-8'), mb_convert_encoding($_POST["owner_city"], "ISO-8859-1", 'UTF-8')]));

    // 2 - Afficher l'encadré
    $pdf->Cell($ownerCellWidth + 5, 10, "Bailleurs", 1, 2, "", true);
    $pdf->MultiCell($ownerCellWidth + 5, 10, $ownerString, 1, 2);
    $pdf->Cell(150, 10, "", 0, 2);


    /* II - ENCADRÉ LOCATAIRES */

    // 1 - Déterminer la largeur de la cellule au contenu

    // Le contenu
    $tenantString = mb_convert_encoding($_POST["tenant_name"] . "\n" . $_POST["tenant_street"] . "\n" . $_POST["tenant_city"], "ISO-8859-1", 'UTF-8');

    // La largeur de la cellule
    $tenantCellWidth = $pdf->GetStringWidth(getLongestStringInArray([mb_convert_encoding($_POST["tenant_street"], "ISO-8859-1", 'UTF-8'), mb_convert_encoding($_POST["tenant_name"], "ISO-8859-1", 'UTF-8'), mb_convert_encoding($_POST["tenant_city"], "ISO-8859-1", 'UTF-8')]));

    // 2 - Afficher l'encadré
    $pdf->Cell($tenantCellWidth + 5, 10, "Locataires", 1, 2, "", true, "R");
    $pdf->MultiCell($tenantCellWidth + 5, 10, $tenantString, 1, 2, false);
    $pdf->Cell(150, 20, "", 0, 2);


    /* III - DATE ET PÉRIODE */
    $pdf->Cell(200, 10, "Loyer " . $_POST["date"] . "", 0, 2, "C");
    $pdf->Cell(200, 10, mb_convert_encoding("Pour la période du " . $_POST["first_date_of_month"] . " au " . $_POST["last_date_of_month"], "ISO-8859-1", 'UTF-8'), 0, 2);
    $pdf->Cell(200, 20, "", 0, 2);


    /* IV - LOYER ET CHARGES */
    $pdf->Cell(150, 10, "Libellé", 1, 2, "", true);
    $pdf->Cell(150, 10, "Loyer de base : " . $_POST["rent"] . "", 1, 1);
    $pdf->Cell(150, 10, "Charges : " . $_POST["charges"] . "", 1, 1);
    $pdf->Cell(150, 10, "Montant total : " . $_POST["total_rent"] . "", 1, 1);

    /* V - RETOURNER LE DOCUMENT */
    $pdf->Output();

}




