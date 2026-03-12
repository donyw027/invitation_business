<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_excel_reader
{
    public function rows($filepath)
    {
        $ext = strtolower(pathinfo($filepath, PATHINFO_EXTENSION));
        if ($ext === 'csv') {
            return $this->read_csv($filepath);
        }
        if ($ext === 'xlsx') {
            return $this->read_xlsx($filepath);
        }
        throw new Exception('Format file tidak didukung. Gunakan CSV atau XLSX.');
    }

    private function read_csv($filepath)
    {
        $rows = array();
        if (($handle = fopen($filepath, 'r')) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ',')) !== FALSE) {
                $rows[] = $data;
            }
            fclose($handle);
        }
        return $rows;
    }

    private function read_xlsx($filepath)
    {
        if (!class_exists('ZipArchive')) {
            throw new Exception('ZipArchive tidak tersedia di server untuk membaca XLSX.');
        }

        $zip = new ZipArchive();
        if ($zip->open($filepath) !== TRUE) {
            throw new Exception('Gagal membuka file XLSX.');
        }

        $sharedStrings = array();
        $sharedXml = $zip->getFromName('xl/sharedStrings.xml');
        if ($sharedXml) {
            $xml = simplexml_load_string($sharedXml);
            if ($xml && isset($xml->si)) {
                foreach ($xml->si as $si) {
                    if (isset($si->t)) {
                        $sharedStrings[] = (string) $si->t;
                    } else {
                        $text = '';
                        if (isset($si->r)) {
                            foreach ($si->r as $run) {
                                $text .= (string) $run->t;
                            }
                        }
                        $sharedStrings[] = $text;
                    }
                }
            }
        }

        $sheetXml = $zip->getFromName('xl/worksheets/sheet1.xml');
        if (!$sheetXml) {
            $zip->close();
            throw new Exception('Sheet1 tidak ditemukan di file XLSX.');
        }

        $sheet = simplexml_load_string($sheetXml);
        $rows = array();

        foreach ($sheet->sheetData->row as $row) {
            $current = array();
            $lastIndex = -1;
            foreach ($row->c as $cell) {
                $ref = (string) $cell['r'];
                $colLetters = preg_replace('/\d+/', '', $ref);
                $colIndex = $this->column_index($colLetters);
                while ($lastIndex + 1 < $colIndex) {
                    $current[] = '';
                    $lastIndex++;
                }

                $type = (string) $cell['t'];
                $value = '';
                if (isset($cell->v)) {
                    $raw = (string) $cell->v;
                    if ($type === 's') {
                        $value = isset($sharedStrings[(int) $raw]) ? $sharedStrings[(int) $raw] : '';
                    } else {
                        $value = $raw;
                    }
                }
                $current[] = $value;
                $lastIndex = $colIndex;
            }
            $rows[] = $current;
        }

        $zip->close();
        return $rows;
    }

    private function column_index($letters)
    {
        $letters = strtoupper($letters);
        $index = 0;
        for ($i = 0; $i < strlen($letters); $i++) {
            $index = $index * 26 + (ord($letters[$i]) - 64);
        }
        return $index - 1;
    }
}
