<?php
    ob_start();
    include('telo.html');
    $content = ob_get_clean();
    require_once('html2pdf.class.php');
    try {
        $html2pdf = new HTML2PDF('P','A4', 'en', true, 'UTF-8', array(0, 0, 0, 0));
        // $html2pdf->setDefaultFont("indira");
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));

        $html2pdf->Output('Sertifikat.pdf');
        //output laporan setelah di download
    } catch(HTML2PDF_exception $e) { 
        echo $e; 
    }
?>