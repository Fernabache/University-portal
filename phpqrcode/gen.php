<?php
include "qrlib.php";
$barcode="image/".sha1(md5(uniqid())).".png";
QRcode::png("
Name    - Biobaku OLuwole Timothy
Company - Xelow Global Concept
Mobile  - +234(81)69452139
Email   - wolexzo007@gmail.com
", "$barcode", "H", 4, 2);
?>
