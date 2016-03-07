<?php
function infojaya() {
	// obj array
	return array (
			'out' => 'JAYA GROSIR' 
	);
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
	
	$babe = array ();
	while ( $row = mysql_fetch_array ( $result ) ) {
		$babe [] = array (
				'desk' => $row ['desk'],
				'balance' => $row ['balance'] 
		);
	}
	mysql_close ( $con );
	
	return array (
			'out' => $babe 
	);
	
}

ini_set ( "soap.wsdl_cache_enabled", "0" ); // disabling WSDL cache

$server = new SoapServer ( "jayaservice.wsdl" );

$server->addFunction ( "infojaya" );
$server->addFunction ( "getbarangbekas" );

$server->handle ();

?>
