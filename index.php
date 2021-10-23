<?php
require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\Printer;
try {
    // Enter the share name for your USB printer here
    $connector = null;
    //$connector = new WindowsPrintConnector("SerialPrinter");
    $connector = new WindowsPrintConnector("COM1");
    /* Print a "Hello world" receipt" */
    $printer = new Printer($connector);
    $printer -> text("Article | Prix initial | Prix promo\n");
    $printer -> text("sac     | 13           | 10\n");
    $printer -> text("trousse | 5            | 3\n");
    $printer -> text("gourdon | 12           | 9\n");
    $printer -> text("cahier  | 4            | 2\n");
    $printer -> text("Total: 24\n");
    $printer -> cut();

    if ($printer){ 
        echo "<a href='http://localhost//starPrinter/starPrinter/index.php'>Bouton</a>";
    }

    /* Close printer */
    $printer -> close();
}
catch (Exception $e) {
    echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
}