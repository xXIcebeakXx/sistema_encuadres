<?php
require __DIR__ . "/vendor/autoload.php";

use Dompdf\Dompdf;

$dompdf = new Dompdf;

$dompdf -> setPaper("letter", "landscape");

$html= file_get_contents("crearencuadre.html");

$dompdf ->loadhtml($html);

$dompdf->render();

$dompdf->stream();
