<?php
namespace src\Component;

// TODO unfinished, refactor into a PDF Builder class
class PDFProcessor
{
    /** @var $pdfGenerator PDFGenerator */
    public $pdfGenerator;

    public function addPage()
    {
        $this->pdfGenerator->AddPage();
        $this->pdfGenerator->SetFont('Arial', 'B', 12);
        $this->pdfGenerator->SetY(50);
        $this->pdfGenerator->Cell(40, 13, "Donation Responses");

        $this->pdfGenerator->SetFont('Arial', 'U', 12);
        $this->pdfGenerator->SetTextColor(1, 162, 232);
        $this->pdfGenerator->Ln(30);
        $this->pdfGenerator->Write(13, "lukejsimonetti@gmail.com");

        $this->generate();

        $this->pdfGenerator->Output('I', 'F');
    }

    public function generate()
    {
        //generate form header
        //generate form body
        // $this->donorInfo
        //generate form footer
    }

    /**
     * @param array $donors
     */
    public function donorInfo($donors)
    {
        // loop through donors array
        //print out donor full name
        //print out donor amount
        //print out donor other amount
        //add to PDF
    }
}