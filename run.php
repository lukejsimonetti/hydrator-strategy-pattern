<?php
require('vendor/autoload.php');

use src\Controller\ReportController;

require('Bootstrap.php');

$formID = 4703416; //could be refactored to be used as a url param
$reportController = new ReportController($TOKEN, $formID);
$response = $reportController->getDonorReportPDFAction();

?>