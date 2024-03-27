<?php

declare(strict_types=1);
require '././models/DocumentModel.php';

class DocumentMapperUtil {
    public function mapToDocuments(array $csvData): array {
        $documents = [];
        $headers = array_shift($csvData);

        foreach ($csvData as $data) {
            $documents[] = $this->createDocumentFromData($data, $headers);
        }

        return $documents;
    }

    private function createDocumentFromData(array $data, array $headers): DocumentModel {
        $documentData = [];
        foreach ($headers as $index => $header) {
            if ($header === 'partner' || $header === 'items') {
                $documentData[$header] = json_decode($data[$index], true);
            } else {
                $documentData[$header] = $data[$index];
            }
        }
        return new DocumentModel($documentData);
    }
}

