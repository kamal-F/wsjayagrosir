<?php
$wsdl = 'http://localhost/latihan/jayagrosir/jayaservice.wsdl';
$client2 = new SoapClient ( $wsdl );
//$client2 = new SoapClient($wsdl, array('trace' => 1));//untuk trace

$hasil = $client2->infojaya();
//var_dump($hasil);
//echo $hasil->out;//object
//echo '<br>';

$functions = $client2->__getFunctions ();
var_dump ($functions);


//$babe = array();
$hasil2 =$client2->getBarangBekas(array('in'=>2));
$babe= $hasil2->out;
//$babe=$hasil2;
var_dump($babe);
//print_r($babe);

echo "REQUEST:\n" . htmlentities($client2->__getLastRequest()) . "\n";
echo "REQUEST:\n" . htmlentities($client2->__getLastResponse()) . "\n";


/* foreach ($babe as $val){
	//object
	var_dump($val);
	echo $val->desk.'	'.$val->balance;
	echo '<br>';
} */


?>