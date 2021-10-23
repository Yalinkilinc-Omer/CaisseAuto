<?php

require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
$connector = null;
//$connector = new WindowsPrintConnector("SerialPrinter");
$connector = new WindowsPrintConnector("COM1");
/* Print a "Hello world" receipt" */
$printer = new Printer($connector);

title($printer, "Tourelle-Shop\n");
$printer -> text("Article | Prix initial | Prix promo\n");
$printer -> text("sac     | 13           | 10\n");
$printer -> text("trousse | 5            | 3\n");
$printer -> text("gourdon | 12           | 9\n");
$printer -> text("cahier  | 4            | 2\n");
$printer -> text("Total: 24\n");

$printer -> feed();
// Demo that alignment is the same as text
$printer -> setJustification(Printer::JUSTIFY_CENTER);
$printer -> text("Merci!\n");
$printer -> setJustification();
$printer -> feed();

// Cut & close
$printer -> cut();
$printer -> close();
function title(Printer $printer, $str)
{
    $printer -> selectPrintMode(Printer::MODE_DOUBLE_HEIGHT | Printer::MODE_DOUBLE_WIDTH);
    $printer -> text($str);
    $printer -> selectPrintMode();
}