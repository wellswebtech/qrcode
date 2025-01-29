<?php

require 'vendor/autoload.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\SvgWriter;
use Endroid\QrCode\Writer\Result\SvgResult;

// Define the URL
$url = "https://wellswebtech.co.za"; // Replace with your actual URL

// Create QR Code instance
//$qrCode = QrCode::create($url);
// Create a new QR Code instance
$qrCode = new QrCode($url);

// Generate the SVG QR code
$writer = new SvgWriter();
$result = $writer->write($qrCode);

// Define the filename (current directory)
$filename = __DIR__ . '/qrcode.svg';

// Save the QR code as an SVG file
file_put_contents($filename, $result->getString());

echo "QR Code saved as qrcode.svg in " . __DIR__;

// Set the correct content type
header('Content-Type: image/svg+xml');

// Output the SVG
echo $result->getString();

?>