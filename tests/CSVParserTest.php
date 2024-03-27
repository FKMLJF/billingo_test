<?php

use PHPUnit\Framework\TestCase;
require '././utils/CSVParserUtil.php';

class CSVParserTest extends TestCase {
    private CSVParserUtil $parser;

    protected function setUp(): void {
        $this->parser = new CSVParserUtil();
    }

    public function testParseCSV() {
        $expected = [
            ["id", "document_type", "partner", "items"],
            ["1", "invoice", '{"id":1, "name": "Kovács József"}', '[{"name":"alma","unit_price":5000, "quantity":5}]']
        ];

        $result = $this->parser->parseCSV(__DIR__ . '/mock_data.csv');

        $this->assertEquals($expected, $result, "CSVParser did not correctly parse the CSV file.");
    }
}
