<?php

require 'db.php';
require 'Models/Product.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

session_start();

$insertedRows = 0;

if ($_FILES['excelFile']['error'] == UPLOAD_ERR_OK && isset($_FILES['excelFile']['tmp_name'])) {
    
    $spreadsheet = IOFactory::load($_FILES['excelFile']['tmp_name']);

    $headers = [
        'id' => 'ID',
        'name' => 'NOM',
        'price' => 'PRIX',
        'description' => 'DESCRIPTION',
        'type' => 'TYPE'
    ];

    $headerRow = 1;

    $sheet = $spreadsheet->getActiveSheet();

    $highestRow = $sheet->getHighestRow();
    $highestColumn = $sheet->getHighestColumn();

    $data = [];

    for ($row = $headerRow + 1; $row <= $highestRow; $row++) {

        $rowData = [];

        for ($col = 'A'; $col <= $highestColumn; $col++) {

            $headerValue = $sheet->getCell($col . $headerRow)->getValue();

            foreach ($headers as $key => $value) {

                if($headerValue == $value) {
                    $cellValue = $sheet->getCell($col . $row)->getValue();
                    $rowData[$key] = $cellValue;
                }
            }

        }

        $data[] = $rowData;
    }

    
    $insertedRows = Product::insertBatchProduct($data);
    
}

if($insertedRows) {
    $_SESSION['message'] = "$insertedRows données inserés avec succès!";
} else {
    $_SESSION['message'] = "Aucune données dans le fichier excel";
}

header("Location: index.php");
exit;



?>
