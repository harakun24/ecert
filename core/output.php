<?php
header("Content-type:application/pdf");
session_start();
$url = $_SESSION['data']['no']."-".$_SESSION['data']['nim'];
// echo "cetak/sertifikat_".$url."_.pdf";
echo file_get_contents("cetak/".$url."_.pdf");
session_destroy();
?>