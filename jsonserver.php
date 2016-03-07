<?php
$requesklien = json_decode ( file_get_contents ( "php://input" ) );

if (! isset ( $requesklien->batas )) {
	$r_batas = 0;
} else {
	$r_batas = $requesklien->batas;
}

$con = mysql_connect ( "localhost", "polpos", "polpos" );
if (! $con) {
	die ( 'Could not connect: ' . mysql_error () );
}

mysql_select_db ( "jayagrosir" ) or die ( 'database tidak ada' );

$sql = "SELECT *  FROM barangbekas LIMIT 0," . $r_batas;

$result = mysql_query ( $sql, $con );

$req = array ();
while ( $isidata = mysql_fetch_assoc ( $result ) ) {
	$req [] = array (
			'data' => $isidata 
	);
}

mysql_close ( $con );

echo json_encode ( array (
		'data' => $req 
) );
?>