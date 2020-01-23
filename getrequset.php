<?php


$Description   = isset($_REQUEST['Description']) ?  $_REQUEST['Description'] : '%';
$person_ser    = isset($_REQUEST['person_ser']) ?   $_REQUEST['person_ser'] : '%';
echo $date_from     = isset($_REQUEST['date_from']) ?    $_REQUEST['date_from'] : '%';
$l_Access      = isset($_REQUEST['l_Access']) ?     $_REQUEST['l_Access'] : '%';
$Lecturer      = isset($_REQUEST['Lecturer']) ?     $_REQUEST['Lecturer'] : '%';
$Category      = isset($_REQUEST['Category']) ?     $_REQUEST['Category'] : '%';
$keyword       = isset($_REQUEST['keyword']) ?      $_REQUEST['keyword'] : '%';
$date_to       = isset($_REQUEST['date_to']) ?      $_REQUEST['date_to'] : '%';
$subject       = isset($_REQUEST['subject']) ?      $_REQUEST['subject'] : '%';
$Country       = isset($_REQUEST['Country']) ?      $_REQUEST['Country'] : '%';
$title         = isset($_REQUEST['title']) ?        $_REQUEST['title'] : '%';
$State         = isset($_REQUEST['State']) ?        $_REQUEST['State'] : '%';
$Point         = isset($_REQUEST['Point']) ?        $_REQUEST['Point'] : '%';
$Area          = isset($_REQUEST['Area']) ?         $_REQUEST['Area'] : '%';

if ($date_to=='%' || $date_to=="" || $date_to==null) {
     $date_to=date("Y-m-d");
 }

 if ($date_from=='%' || $date_from=="" || $date_from==null) {
    echo $date_from="1800-01-01";
}
$searchUrl     ="../search/search.php?";



?>