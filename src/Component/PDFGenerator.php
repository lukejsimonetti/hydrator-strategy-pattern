<?php
namespace src\Component;

use FPDF;

// TODO unfinished, refactor into a PDF Builder class?
class PDFGenerator extends FPDF
{
    public function _construct($orientation = 'P', $unit = 'pt', $format = 'Letter', $margin = 40)
    {
        parent::__construct($orientation, $unit, $format);
        $this->SetTopMargin($margin);
        $this->SetLeftMargin($margin);
        $this->SetRightMargin($margin);
        $this->SetAutoPageBreak(true, $margin);
    }

    // TODO set custom header

    // TODO set body

    // TODO set custom footer

}