<?php
// static 
// sdsd
// dsd

$r_batas = 1;

$con = mysqli_connect ( "localhost", "polpos", "polpos", "jayagrosir" );

if (! $con) {
	die ( 'Could not connect: ' . mysqli_error () );
}

function get_babe_by($id) {
	$app_info = array ();
	
	global $con;
	$sql = "SELECT *  FROM barangbekas WHERE id=". $id;
	
	$result = mysqli_query ( $con, $sql );
	
	$req = array ();
	while ( $isidata = mysqli_fetch_assoc ( $result ) ) {
		$req [] = $isidata;
	}
	
	return $req;
}

function get_babe_list() {	
	$app_info = array ();
	
	global $con;
	$sql = "SELECT *  FROM barangbekas";
	
	$result = mysqli_query ( $con, $sql );
	
	$req = array ();
	while ( $isidata = mysqli_fetch_assoc ( $result ) ) {
		$req [] = $isidata;
	}
	
	return $req;
}

function get_pagecount(){
	global $con;
	$sql = "SELECT COUNT(*) as totalpage FROM barangbekas";
	
	$result = mysqli_query ( $con, $sql );
	
	$req = array ();
	while ( $isidata = mysqli_fetch_assoc ( $result ) ) {
		$req [] = $isidata;
	}
	
	return $req;
}

function get_page($pageno) {
	$pageLimit = 3;
	$skipValue = $pageno * $pageLimit;
	
	global $con;
	$sql = "SELECT *  FROM barangbekas LIMIT ".$skipValue .",". $pageLimit ;
	//$sql = "SELECT *  FROM barangbekas LIMIT 1,3";
	$result = mysqli_query ( $con, $sql );

	$req = array ();
	while ( $isidata = mysqli_fetch_assoc ( $result ) ) {
		$req [] = $isidata;
	}
	//$req=$sql;
	return $req;
}

$possible_url = [
		"get_babe_list",
		"get_babe",
		"page",
		"pagecount"
];

$value = "An error has occurred";

if (isset ( $_GET ["action"] ) && in_array ( $_GET ["action"], $possible_url )) {
	switch ($_GET ["action"]) {
		case "get_babe_list" :
			$value = get_babe_list ();
			break;
		case "get_babe" :
			if (isset ( $_GET ["id"] ))
				$value = get_babe_by ( $_GET ["id"] );
			else
				$value = "Missing argument";
			break;
		case "pagecount" :
			$value = get_pagecount ();
			break;
		case "page" :
			if (isset ( $_GET ["pageno"] ))
				$value = get_page ( $_GET ["pageno"] );
			else
				$value = "Missing argument";
			break;
	}
}


if ($_SERVER ['REQUEST_METHOD'] == "POST") {
	$json = file_get_contents ( 'php://input' );
	$obj = json_decode ( $json );	
	
	$desk = $obj->{'desk'};
	$balance = $obj->{'balance'};
	$vendor = $obj->{'vendor'};
	$tipe = $obj->{'tipe'};
	
	global $con;
	$sql = "INSERT INTO jayagrosir.barangbekas (desk, balance, vendor, tipe) 
			VALUES ('". $desk ."', ". $balance .", ". $vendor .", ". $tipe .")";
	
	$result = mysqli_query ( $con, $sql );
	
	$value = $result;
	
}

if ($_SERVER ['REQUEST_METHOD'] == "PUT") {
	$json = file_get_contents ( 'php://input' );
	$obj = json_decode ( $json );
	
	$id = $obj->{'id'};	
	$desk = $obj->{'desk'};
	$balance = $obj->{'balance'};
	
	global $con;
	$sql = "UPDATE barangbekas SET desk = '". $desk ."', balance =". $balance ." WHERE id =".$id;
	
	$result = mysqli_query ( $con, $sql );
	
	$value = $result;
}

if ($_SERVER ['REQUEST_METHOD'] == "DELETE") {
	$id =  $_GET ["id"];
	
	global $con;
	$sql = "DELETE FROM barangbekas WHERE id =". $id;
	
	$result = mysqli_query ( $con, $sql );
	
	$value = $result;
}

header ( 'Content-type: application/json' );
// return JSON array
exit ( json_encode ( $value ) );
?>
