<?php

require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Endroid\QrCode\Writer\SvgWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\Result\ResultInterface;
use Endroid\QrCode\Builder\Builder;



$url = "https://ebass.co.za";
// $qrCode = QrCode::create($url)
//     ->setEncoding(new Encoding('UTF-8'))
//     ->setErrorCorrectionLevel(ErrorCorrectionLevel::High)
//     ->setSize(300)
//     ->setMargin(10);

// Create the QR code instance
//$qrCode = new QrCode($url);

// Set additional options (optional)
//$qrCode->setSize(300); // Size of the QR code
//$qrCode->setMargin(10); // Margin around the QR code

// $writer = new PngWriter();
// $result = $writer->write($qrCode);

// Generate the QR code in SVG format
//$writer = new SvgWriter();
//$result = $writer->write($qrCode);

// Generate the QR code
$result = Builder::create()
    ->writer(new SvgWriter()) // Use SVG writer
    ->data($url) // Data to encode
    ->encoding(new Encoding('UTF-8')) // Encoding format
    ->errorCorrectionLevel(ErrorCorrectionLevel::High) // Error correction
    ->size(300) // QR code size
    ->margin(10) // Margin
    ->build();

//header('Content-Type: '.$result->getMimeType());
// Output the SVG QR code
header('Content-Type: image/svg+xml');
echo $result->getString();

?>