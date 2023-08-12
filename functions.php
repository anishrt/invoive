<?php
require_once 'config/config.php';
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;

function generatePDf($data){
   
   $html = '';
   $html .='<table width="100%" border="1" cellpadding="5" cellspacing="0"><tr><td>Invoice</td></tr>';
   $html .='<tr><td width="50%">From: <br>Name: Anish R,<br>Kanyakumari District, <br>TamilNadu</td><td width="50%">To: Polus Pvt Ltd, <br>Trivandrum</td></tr>';
   $html .='<tr><th align="left" width="5%">Sr No.</th>
	<th align="left" width="25%">Item Name</th>
	<th align="left" width="10%">Quantity</th>
	<th align="left" width="10%">Price</th>
   <th align="left" width="10%">Discount %</th>
	<th align="left" width="10%">Total</th></tr>';
   for ($i = 0; $i < count($data['productName']); $i++) {
      $count = $i + 1;
      $html .='<tr><td>'.$count.'</td><td>'.$data['productName'][$i].'</td><td>'.$data['quantity'][$i].'</td><td>'.$data['price'][$i].'</td><td>'.$data['taxrate'][$i].'</td><td>'.$data['total'][$i].'</td></tr>';
   }
   $html .='<tr><td>Subtotal Without Tax:$'.$data['subTotal'].'</td><td>Applied discount:'.$data['discount'].'%</td><td>Subtotal with tax:$'.$data['totalAftertax'].'</td><tr>';
   $html .='<tr><td>Total Amount:$'.$data['totalAmountAfterDis'].'</td></tr>';
   $html .='</table>';
   //print_r($html);die;
   $invoiceFileName = 'Invoice.pdf';
   
   $dompdf = new Dompdf();
   $dompdf->loadHtml(html_entity_decode($html));
   
   $dompdf->setPaper('A4', 'landscape');
   $dompdf->render();
   ob_end_clean();
   $dompdf->stream($invoiceFileName, array("Attachment" => false));
   
}


?>