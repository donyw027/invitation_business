<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_pdf
{
    private function esc($text)
    {
        $text = str_replace('\\', '\\\\', (string) $text);
        $text = str_replace(array('(', ')'), array('\\(', '\\)'), $text);
        return preg_replace('/[^\x20-\x7E]/', '?', $text);
    }

    public function download($filename, array $lines)
    {
        $content = "BT\n/F1 11 Tf\n50 790 Td\n14 TL\n";
        foreach ($lines as $i => $line) {
            $line = $this->esc($line);
            if ($i === 0) {
                $content .= '(' . $line . ') Tj\n';
            } else {
                $content .= 'T* (' . $line . ') Tj\n';
            }
        }
        $content .= "ET";
        $objs = array();
        $objs[] = "1 0 obj\n<< /Type /Catalog /Pages 2 0 R >>\nendobj\n";
        $objs[] = "2 0 obj\n<< /Type /Pages /Kids [3 0 R] /Count 1 >>\nendobj\n";
        $objs[] = "3 0 obj\n<< /Type /Page /Parent 2 0 R /MediaBox [0 0 595 842] /Resources << /Font << /F1 4 0 R >> >> /Contents 5 0 R >>\nendobj\n";
        $objs[] = "4 0 obj\n<< /Type /Font /Subtype /Type1 /BaseFont /Helvetica >>\nendobj\n";
        $objs[] = "5 0 obj\n<< /Length " . strlen($content) . " >>\nstream\n" . $content . "\nendstream\nendobj\n";

        $pdf = "%PDF-1.4\n";
        $offsets = array();
        foreach ($objs as $obj) {
            $offsets[] = strlen($pdf);
            $pdf .= $obj;
        }
        $xref = strlen($pdf);
        $pdf .= "xref\n0 " . (count($objs) + 1) . "\n";
        $pdf .= "0000000000 65535 f \n";
        foreach ($offsets as $off) {
            $pdf .= sprintf("%010d 00000 n \n", $off);
        }
        $pdf .= "trailer\n<< /Size " . (count($objs) + 1) . " /Root 1 0 R >>\nstartxref\n" . $xref . "\n%%EOF";

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Content-Length: ' . strlen($pdf));
        echo $pdf;
        exit;
    }
}
