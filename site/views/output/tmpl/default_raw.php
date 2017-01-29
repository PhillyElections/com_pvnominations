<?php

jimport('mpdf.mpdf.mpdf');

$filename = 'Nomination_Petition.pdf';

//Create an instance of the class:
$mpdf = new mPDF();

$mpdf->SetTitle('Nomination Petition');

// Add styles
$mpdf->WriteHTML($this->css, 1);

// Write some HTML code:
$mpdf->WriteHTML($this->html, 2);

// Output a PDF file directly to the browser
$mpdf->Output($filename, JRequest::getVar('download') == 'true' ? 'D' : 'I');

exit();
