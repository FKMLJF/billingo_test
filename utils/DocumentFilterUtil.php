<?php

declare(strict_types=1);

class DocumentFilterUtil {
    public function filterDocuments(array $documents, string $type, string $partnerId, float $threshold): array {
        return array_filter($documents, function (DocumentModel $doc) use ($type, $partnerId, $threshold) {
            return $doc->getDocumentType() === $type &&
                   $doc->getPartnerId() === $partnerId &&
                   $doc->getTotal() >= $threshold;
        });
    }
}
