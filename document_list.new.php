<?php

declare(strict_types=1);

require './utils/CSVParserUtil.php';
require './utils/DocumentFilterUtil.php';
require './utils/DocumentMapperUtil.php';
require './utils/SimpleDocumentPrinterUtil.php';

if ($argc !== 4) {
    echo 'Ambiguous number of parameters!';
    exit(1);
}

$parser = new CSVParserUtil();
$csvData = $parser->parseCSV('document_list.csv');


$mapper = new DocumentMapperUtil();
$documents = $mapper->mapToDocuments($csvData);

$filter = new DocumentFilterUtil();
$filteredDocuments = $filter->filterDocuments($documents, $argv[1], $argv[2], (float) $argv[3]);

$printer = new SimpleDocumentPrinterUtil();
$printer->printDocuments($filteredDocuments);
