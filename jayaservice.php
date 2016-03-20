<?php
function infojaya() {
	// obj array
	return [ 'out' => 'JAYA GROSIR' ];
}
function getbarangbekas($symbol) {
	$batas = $symbol->in;
	
	$con = mysql_connect ( "localhost", "polpos", "polpos" );
	if (! $con) {
		die ( 'Could not connect: ' . mysql_error () );
	}
	
	mysql_select_db ( "jayagrosir" ) or die ( 'database tidak ada' );
	
	$sql = "SELECT *  FROM barangbekas LIMIT 0, " . $batas;
	
	$result = mysql_query ( $sql, $con );
	
	$babe = [];
	while ( $row = mysql_fetch_array ( $result ) ) {
		$babe [] = [
				'desk' => $row ['desk'],
				'balance' => $row ['balance'] 
		];
	}
	mysql_close ( $con );
	
	return [ 'out' => $babe];	
}

function addbarangbekas($prm) {
	var_dump($prm);
	$desk = $prm->desk;
	$balance = $prm->balance;
	$vendor = $prm->vendor;
	$tipe = $prm->tipe;
	
	$con = mysql_connect ( "localhost", "polpos", "polpos" );
	if (! $con) {
		die ( 'Could not connect: ' . mysql_error () );
	}
	
	mysql_select_db ( "jayagrosir" ) or die ( 'database tidak ada' );
	
	$sql = "INSERT INTO jayagrosir.barangbekas (desk, balance, vendor, tipe) 
			VALUES ('". $desk ."', ". $balance .", ". $vendor .", ". $tipe .")";
	
	$result = mysql_query ( $sql, $con );
		
	return [ 'out' => "berhasil diinput"];
	
}

ini_set ( "soap.wsdl_cache_enabled", "0" ); // disabling WSDL cache

$server = new SoapServer ( "jayaservice.wsdl" );

$server->addFunction ( "infojaya" );
$server->addFunction ( "getbarangbekas" );
$server->addFunction ( "addbarangbekas" );

$server->handle ();

?>
