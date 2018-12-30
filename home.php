<?php

function getEurekaInfo( $host ) {
	$url = "$host:8008/setup/eureka_info";
	$ret = remotePull( $url );
	if( $ret === FALSE ) { die( "Failure to retrieve EurekaInfo\n" . curl_error( $curl ) ); }
	$res = json_decode( $ret, TRUE );
	return( $res );
}

function remotePull( $url ) {
	$curl = curl_init();
	curl_setopt( $curl, CURLOPT_URL, $url );
	curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
	$ret = curl_exec( $curl );
	return( $ret );
}

function getAlarms ( $host ) {
	$url = "$host:8008/setup/assistant/alarms";
	$ret = remotePull( $url );
	if( $ret === FALSE ) { die( "Failure to retrieve Alarms\n" . curl_error( $curl ) ); }
	$alarms = json_decode( $ret, TRUE );
	if( count( $alarms['alarm'] ) == 0 ) { return( FALSE ); }
	$ret = array();
	foreach( $alarms['alarm'] as $alarm ) {
		array_push( $ret, $alarm );
	}
	return( $ret );
}

function getTimers ( $host ) {
	$url = "$host:8008/setup/assistant/alarms";
	$ret = remotePull( $url );
	if( $ret === FALSE ) { die( "Failure to retrieve Timers\n" . curl_error( $curl ) ); }
	$timers = json_decode( $ret, TRUE );
	if( count( $timers['timer'] ) == 0 ) { return( FALSE ); }
	$ret = array();
	foreach( $timers['timer'] as $timer ) {
		array_push( $ret, $timer );
	}
	return( $ret );
}
?>
