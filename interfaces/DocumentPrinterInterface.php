<?php

declare(strict_types=1);

interface DocumentPrinterInterface
{
    public function printDocuments(array $documents): void;
}
