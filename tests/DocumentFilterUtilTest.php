<?php

use PHPUnit\Framework\TestCase;
require '././utils/DocumentFilterUtil.php';

class DocumentFilterUtilTest extends TestCase
{
    private $documents;
    private $filterUtil;

    protected function setUp(): void
    {
        $this->documents = [
            new DocumentModel([
                'id' => '1',
                'document_type' => 'invoice',
                'partner' => ['id' => '1', 'name' => 'Kovács József'],
                'items' => [['name' => 'alma', 'unit_price' => 5000, 'quantity' => 5]]
            ]),
        ];
        $this->filterUtil = new DocumentFilterUtil();
    }

    public function testFilterDocuments()
    {
        $filtered = $this->filterUtil->filterDocuments($this->documents, 'invoice', '1', 25000.0);
        $this->assertCount(1, $filtered);
    }
}
