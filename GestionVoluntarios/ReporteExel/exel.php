<!--?php
 require '../phpmailer/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;


include_once "funciones.php";
$volunatrios = obtenerVoluntarios();

$documento = new Spreadsheet();
$documento
    ->getProperties()
    ->setTitle('Registro de Voluntarios');

$hoja = $documento->getActiveSheet();

$hoja->setTitle("voluntarios");


$indiceFila = 1;
$indiceColumna = 1;
$columnas = ["id_form", "nombre", "apellidos", "codigo_de_estudiante", "email", "telefono", "id_evento", "mensaje", "fecha", "estado"];
$encabezados = ["ID", "Nombre", "Apellidos", "Codigo de estudiante", "Email", "Telefono", "Evento", "Mensaje", "Fecha", "Estado"];





foreach ($encabezados as $encabezado) {
    $hoja->setCellValue([$indiceColumna, $indiceFila], $encabezado);
    $indiceColumna++;
}
$indiceFila++;


// Ajustar el ancho de las columnas
foreach (range('A', 'J') as $columna) {
    $hoja->getColumnDimension($columna)->setAutoSize(true);
}

$indiceFila++;

// Estilos para las celdas de datos
$estiloCelda = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => 'FF000000'],
        ],
    ],
    'alignment' => [
        'vertical' => Alignment::VERTICAL_CENTER,
    ],
];


foreach ($volunatrios as $volunatrios) {
    $indiceColumna = 1;
    foreach ($columnas as $columna) {
        $hoja->setCellValue([$indiceColumna, $indiceFila], $volunatrios[$columna]);
        // La edad va como número
        if ($indiceColumna === 4) {
            $hoja->getStyle([$indiceColumna, $indiceFila])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_NUMBER);
        }
        // La altura va con decimales
        if ($indiceColumna === 6) {
            $hoja->getStyle([$indiceColumna, $indiceFila])->getNumberFormat()->setFormatCode(NumberFormat::FORMAT_TEXT);
        }
        $indiceColumna++;
    }
    $indiceFila++;
}


$nombreDelDocumento = "Registro de Voluntarios.xlsx";
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="' . $nombreDelDocumento . '"');
header('Cache-Control: max-age=0');

$writer = IOFactory::createWriter($documento, 'Xlsx');
ob_end_clean();
$writer->save('php://output');
exit;