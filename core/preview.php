<?php
    include("trololo.html");
    if(isset($_POST['data'])){
    //    callview($_SESSION['data']);
    session_start();
    $_SESSION['data'] = $_POST['data'];
    ob_start();
    // include('telo.html');
    callview($_SESSION['data']);
    $content = ob_get_clean();
    require_once('html2pdf.class.php');
    try {
        $html2pdf = new HTML2PDF('P','A4', 'en', true, 'UTF-8', array(0, 0, 0, 0));
        $html2pdf->AddFont("lucid", strtoupper(""), "lucid" . '.php');
        $html2pdf->AddFont("walkway", strtoupper(""), "walkway" . '.php');
        // $html2pdf->setDefaultFont("lucid");
        $html2pdf->setDefaultFont("lucid");
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        $url = $_SESSION['data']['no']."-".$_SESSION['data']['nim'];
        $html2pdf->Output("cetak/".$url."_.pdf",'F');
        // return $url;
        //output laporan setelah di download
    } catch(HTML2PDF_exception $e) { 
        echo $e; 
    }
    }
    else{
        header("Location: index.html");
    }
?>