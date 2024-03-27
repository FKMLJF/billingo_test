<?php

use PHPUnit\Framework\TestCase;
require '././models/DocumentModel.php';

class DocumentModelTest extends TestCase
{
    private $data;
    private $document;

    protected function setUp(): void
    {
        $this->data = [
            'id' => '1',
            'document_type' => 'invoice',
            'partner' => ['id' => 1, 'name' => 'Kovács József'],
            'items' => [['name' => 'alma', 'unit_price' => 5000, 'quantity' => 5]]
        ];
        $this->document = new DocumentModel($this->data);
    }

    public function testGetId()
    {
        $this->assertEquals('1', $this->document->getId());
    }

    public function testGetDocumentType()
    {
        $this->assertEquals('invoice', $this->document->getDocumentType());
    }

    public function testGetPartnerName()
    {
        $this->assertEquals('Kovács József', $this->document->getPartnerName());
    }

    public function testGetTotal()
    {
        $this->assertEquals(25000.0, $this->document->getTotal());
    }
}
