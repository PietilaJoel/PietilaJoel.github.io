<?php

require_once 'fpdf/fpdf.php';
require_once '../models/dbfunctions.php';


// Tarkista ID
if (!isset($_GET['id'])) {
    die("Reseptin ID puuttuu.");
}

$id = intval($_GET['id']);
$pdo = connect();
// Hae resepti tietokannasta
$stmt = $pdo->prepare("
    SELECT 
        recipes.name, 
        recipes.added, 
        recipes.category, 
        recipes.ingredients, 
        recipes.instructions, 
        users.username 
    FROM recipes 
    INNER JOIN users ON users.user_id = recipes.user_id 
    WHERE recipes.recipe_id = ?
");
$stmt->execute([$id]);
$recipe = $stmt->fetch();

if (!$recipe) {
    die("Reseptiä ei löytynyt.");
}

// Luo PDF
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

// Otsikko
$pdf->Cell(0, 10, utf8_decode($recipe['name']), 0, 1);

// Lisätiedot
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(0, 10, utf8_decode("Lisätty: {$recipe['added']} | Lisännyt: {$recipe['username']}"), 0, 1);

// Kategoria
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode("Kategoria:"), 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 10, utf8_decode($recipe['category']));

// Ainesosat
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode("Ainesosat:"), 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 10, utf8_decode($recipe['ingredients']));

// Ohjeet
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode("Valmistusohjeet:"), 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->MultiCell(0, 10, utf8_decode($recipe['instructions']));

$pdf->Output('D', 'resepti.pdf'); // D = download, I = inline view
?>