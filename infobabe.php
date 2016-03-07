<?php
$con = mysql_connect ( "localhost", "polpos", "polpos" );
if (! $con) {
	die ( 'Could not connect: ' . mysql_error () );
}

mysql_select_db ( "jayagrosir" ) or die ( 'database tidak ada' );


$sql = "SELECT *  FROM barangbekas LIMIT 0, 10"; // 

$result = mysql_query ( $sql, $con );

$babe = array();
while ( $row = mysql_fetch_array ( $result ) ) {	
	$babe[]=array(
	'desc' => $row ['desk'],
	'balance' => $row ['balance']
	);
	
}
mysql_close ( $con );

/* foreach ($babe as $val){
	
	echo $val['desc'].'  '. $val['balance'];
	echo '<br>';
}

var_dump($babe) */

?> 