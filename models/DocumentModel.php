<?php

declare(strict_types=1);

class DocumentModel {
  private array $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function getPartnerId(): string {
        return (string)($this->data['partner']['id'] ?? '');
    }

    public function getId(): string
    {
        return $this->data['id'] ?? '';
    }

    public function getDocumentType(): string
    {
        return $this->data['document_type'] ?? '';
    }

    public function getPartnerName(): string
    {
        return $this->data['partner']['name'] ?? '';
    }

    public function getTotal(): float
    {
        return array_reduce($this->data['items'], function ($total, $item) {
            return $total + ($item['unit_price'] * $item['quantity']);
        }, 0.0);
    }
}
