<?php

namespace App\Service;

use TCPDF;

class GeneratePDFService
{
    private TCPDF $tcpdf;

    public function generate(array $data, $target)
    {
        $this->tcpdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

        $this->tcpdf->SetCreator(PDF_CREATOR);
        $this->tcpdf->SetAuthor('Test');

        // remove default header/footer
        $this->tcpdf->setPrintHeader(false);
        $this->tcpdf->setPrintFooter(false);

        // set default monospaced font
        $this->tcpdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $this->tcpdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

        // set auto page breaks
        $this->tcpdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $this->tcpdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set font
        $this->tcpdf->SetFont ('dejavusans', $style = '', $size = null, $fontfile = '', $subset = 'default', $out = true);

        // add a page
        $this->tcpdf->AddPage();

        // print a block of text
        $this->tcpdf->Write(0, 'Отчет о продажах автомобилей', '', 0, 'C', true, 0, false, false, 0);

        $this->tcpdf->Ln(5);
        $this->tcpdf->MultiCell(120, 5, 'Город ___________', 0, 'L', 0, 0, '', '', true);
        $this->tcpdf->MultiCell(100, 5, 'Дата ' . (new \DateTime())->format('d.m.Y'), 0, 'L', 0, 1, '', '', true);
        $this->tcpdf->Ln(5);

        $this->tcpdf->SetFont('dejavusans', '', 8);

        $this->tcpdf->MultiCell(15, 5, 'Бренд', 1, 'L', 0, 0, '', '', true);
        $this->tcpdf->MultiCell(25, 5, 'Модель', 1, 'L', 0, 0, '', '', true);
        $this->tcpdf->MultiCell(45, 5, 'VIN', 1, 'L', 0, 0, '', '', true);
        $this->tcpdf->MultiCell(10, 5, 'Литр', 1, 'L', 0, 0, '', '', true);
        $this->tcpdf->MultiCell(10, 5, 'Мщн', 1, 'L', 0, 0, '', '', true);
        $this->tcpdf->MultiCell(20, 5, 'Тип  КПП', 1, 'L', 0, 0, '', '', true);
        $this->tcpdf->MultiCell(15, 5, 'Выпуск', 1, 'L', 0, 0, '', '', true);
        $this->tcpdf->MultiCell(20, 5, 'Дата', 1, 'L', 0, 0, '', '', true);
        $this->tcpdf->MultiCell(20, 5, 'Дилер', 1, 'L', 0, 0, '', '', true);
        $this->tcpdf->Ln(5);

        foreach($data as $row) {
            $this->tcpdf->MultiCell(15, 5, $row['brand'], 1, 'L', 0, 0, '', '', true);
            $this->tcpdf->MultiCell(25, 5, $row['model'], 1, 'L', 0, 0, '', '', true);
            $this->tcpdf->MultiCell(45, 5, $row['vin'], 1, 'L', 0, 0, '', '', true);
            $this->tcpdf->MultiCell(10, 5, $row['engineCapacity'], 1, 'L', 0, 0, '', '', true);
            $this->tcpdf->MultiCell(10, 5, $row['enginePower'], 1, 'L', 0, 0, '', '', true);
            $this->tcpdf->MultiCell(20, 5, $row['gearboxType'], 1, 'L', 0, 0, '', '', true);
            $this->tcpdf->MultiCell(15, 5, $row['released'], 1, 'L', 0, 0, '', '', true);
            $this->tcpdf->MultiCell(20, 5, $row['date'], 1, 'L', 0, 0, '', '', true);
            $this->tcpdf->MultiCell(20, 5, $row['dealer'], 1, 'L', 0, 0, '', '', true);
            $this->tcpdf->Ln(5);
        }

        //Close and output PDF document
        $this->tcpdf->Output($target, 'F');
    }
}