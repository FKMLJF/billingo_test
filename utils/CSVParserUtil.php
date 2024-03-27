<?php

declare(strict_types=1);

class CSVParserUtil
{
    public function parseCSV(string $filename): array
    {
        $rows = [];
        if (($handle = fopen($filename, 'r')) !== false) {
            while (($data = fgetcsv($handle, null, ';')) !== false) {
                $rows[] = $data;
            }
            fclose($handle);
        }
        return $rows;
    }
}
