<?php

function getEurekaInfo( $host ) {
	$curl = curl_init();
	curl_setopt( $curl, CURLOPT_URL, "$host:8008/setup/eureka_info" );
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
	$ret = curl_exec( $curl );
	if( $ret === FALSE ) { die( "Failure to retrieve EurekaInfo\n" . curl_error( $curl ) ); }
	$res = json_decode( $ret, TRUE );
	return( $res );
}

?>
