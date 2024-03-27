<?php

declare(strict_types=1);
require './interfaces/DocumentPrinterInterface.php';

class SimpleDocumentPrinterUtil implements DocumentPrinterInterface
{
    public function printDocuments(array $documents): void
    {
        $headers = ['Document ID', 'Document Type', 'Partner Name', 'Total'];
        foreach ($headers as $header) {
            echo str_pad($header, 20);
        }
        echo "\n" . str_repeat('=', 80) . "\n";

        foreach ($documents as $document) {
            echo str_pad($document->getId(), 20);
            echo str_pad($document->getDocumentType(), 20);
            echo str_pad($document->getPartnerName(), 20);
            echo str_pad((string)$document->getTotal(), 20);
            echo "\n";
        }
    }
}
