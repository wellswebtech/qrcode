<?php

require 'vendor/autoload.php';

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\SvgWriter;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;

// Define the URL
$url = "https://ebass.co.za"; // Replace with your actual URL

// Generate the QR code
$result = Builder::create() // Create QR code builder
    ->writer(new SvgWriter()) // Define the output format (SVG)
    ->data($url) // Data to encode (URL)
    ->encoding(new Encoding('UTF-8')) // Set encoding
    ->errorCorrectionLevel(ErrorCorrectionLevel::High) // Error correction
    ->size(300) // Set QR code size
    ->margin(10) // Set margin
    ->build();

// Output the SVG
header('Content-Type: image/svg+xml');
echo $result->getString();

?>