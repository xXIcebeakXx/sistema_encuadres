<?php
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;

// Obtener todos los datos del formulario
$data = $_POST;

// Cargar la plantilla HTML
$html = file_get_contents("encuadrepruebaplantilla2.html");

// Campos de texto a reemplazar
$campos_texto = [
    "docentes", "asignatura", "semestre", "carrera", "grupo", "tipo_curso",
    "tema_1", "practicas_1", "observaciones_1",
    "tema_2", "practicas_2", "observaciones_2",
    "tema_3", "practicas_3", "observaciones_3",
    "tema_4", "practicas_4", "observaciones_4",
    "tema_5", "practicas_5", "observaciones_5",
    "tema_6", "practicas_6", "observaciones_6",
    "tema_7", "practicas_7", "observaciones_7",
    "tema_8", "practicas_8", "observaciones_8",
    "tema_10", "practicas_10", "observaciones_10",
    "tema_11", "practicas_11", "observaciones_11",
    "tema_13", "practicas_13", "observaciones_13",
    "tema_14", "practicas_14", "observaciones_14",
    "tema_15", "practicas_15", "observaciones_15",
    "tema_16", "practicas_16", "observaciones_16",
    "tema_17", "practicas_17", "observaciones_17",
    "tema_18", "practicas_18", "observaciones_18",
    "criterio_1","atributo_1", "criterio_2",
    "atributo_2", "criterio_3","atributo_3",
    "acreditacion"
];

// Reemplazar los campos de texto en la plantilla con los valores del formulario
foreach ($campos_texto as $campo) {
    if (isset($data[$campo])) {
        $html = str_replace("{{{$campo}}}", $data[$campo], $html);
    }
}

// Crear una instancia de Dompdf
$dompdf = new Dompdf;

// Configurar el tamaño del papel
$dompdf->setPaper("letter", "landscape");

// Cargar el HTML en Dompdf
$dompdf->loadHtml($html);

// Renderizar el PDF
$dompdf->render();

// Mostrar el PDF en el navegador
$dompdf->stream();
?>
