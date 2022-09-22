<?php
//============================================================+
// File name   : example_001.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 001 for TCPDF class
//               Default Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Default Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('../../tcpdf/examples/tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('www.codbuddy.com');
$pdf->SetTitle('Appointment Letter | codbuddy.com');
$pdf->SetSubject('Appointment Letter');
$pdf->SetKeywords('Appointment, Letter, codbuddy, muhammad, pdf');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' (Demo)', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// Set font
// dejavusans is a UTF-8 Unicode font, if you only need to
// print standard ASCII chars, you can use core fonts like
// helvetica or times to reduce file size.
$pdf->SetFont('dejavusans', '', 10, '', true);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>false, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


$html = '';
$style = array(
        'position' => '',
        'align' => 'C',
        'stretch' => false,
        'fitwidth' => true,
        'cellfitalign' => '',
        'border' => false,
        'hpadding' => 'auto',
        'vpadding' => 'auto',
        'fgcolor' => array(0,0,0),
        'bgcolor' => false, //array(255,255,255),
        'text' => true,
        'font' => 'helvetica',
        'fontsize' => 8,
        'stretchtext' => 4
    );
$style2 = array('position'=>'', 'border'=>false, 'padding'=>0, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>true, 'font'=>'helvetica', 'fontsize'=>8, 'stretchtext'=>4);
			
			$params = $pdf->serializeTCPDFtagParameters(array('CODE 128', 'C39', '', '', '', 13, 0.4, $style2, 'N'));
$html .= '<tcpdf method="write1DBarcode" params="'.$params.'" />';



    // PRINT VARIOUS 1D BARCODES

    // CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9.
   // $pdf->Cell(0, 0, 'CODE 39 - ANSI MH10.8M-1983 - USD-3 - 3 of 9', 0, 1);
   
//   $pdf->write1DBarcode('CODE 39', 'C39', '', '', '', 18, 0.4, $style, 'N'); C128 also

    //$pdf->Ln();

// create some HTML content
$subtable = '<table border="0" cellspacing="6" cellpadding="4">
				
				<tr>
					<td width="60%">Applicant Name  :<br><b>Muhammad Shabbir Begawala</b></td>
					<td width="40%" align="">Date of Appointment:<br><b>12/31/2016</b></td>
				</tr>
				
				<tr>
					<td width="60%">Appointment Type:<br><b>Students Affairs</b></td>
					<td width="40%" align="">Time of Appointment:<br><b>09:30 AM</b></td>
				</tr>
				<tr>
					
					<td width="60%">'.$html.'</td>
					<td width="40%" align="">Appointment No.:<br><b>PA00054d5saaDDAa</b></td>
					
				</tr>
				
				<tr>
					<td colspan="2" style="text-align:justify">
					Dear Applicant,<br><br>
					This is your Appointment letter for <b>Students Affairs</b>, you need to carry this letter including other necessary documents when you come, please reach there before <b>09:30 AM</b> so that you don\'t miss the appointment.<br/><br/>
					Thank you
					</td>
					
				</tr>
			</table>';
			 
			
			
			

$html = '
<table border="1" cellspacing="3" cellpadding="4" style="">
	
	<tr>
		
		<td align="center">
			<h2>Appointment Letter</h2>
		</td>
		
	</tr>
	
	<tr>
		
		<td>
			'.$subtable.'
		</td>
		
	</tr>
	
</table>';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');
// set cell padding

/*$pdf->setCellPaddings(4, 4, 4, 4);

$html = <<<EOD
<h6 style="text-align:center">Appointment Letter</h6><hr style="color:#000; border:3px solid #000;" />
EOD;

$pdf->writeHTMLCell($w=0, $h=0, $x='', $y='', $html, $border=1, $ln=1, $fill=0, $reseth=true, $align='', $autopadding=true);


*/



// Set some content to print
/*$html = <<<EOD
<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
<i>This is the first example of TCPDF library.</i>
<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
<p>Please check the source code documentation and other examples for further information.</p>
<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;
*/
$pdf->SetFont('dejavusans', '', 7, '', true);
$pdf->SetTextColor(155,155,155);
$html = "This is a computer generated document and it does not require signature.";
// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, 'R', true);

// ---------------------------------------------------------

// Close and output PDF document
// This method has several options, check the source code documentation for more information.
$pdf->Output('example_001.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
