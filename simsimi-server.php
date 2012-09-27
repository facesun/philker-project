<?php
	header('Content-type: application/json');

	$args = array(
		'http' => array(
			'method' => 'GET',
			'header' => 'user-agent: Mozilla/5.0 (Ubuntu; X11; Linux i686; rv:8.0) Gecko/20100101 Firefox/8.0'		
		)
	);
	$context = stream_context_create( $args );
	
	$message =  urlencode( $_GET[ 'message' ] );
	
	$message = str_replace( '+' , '%2520', $message );
	
	$url = 'http://simsimi.com/func/req?msg=' . $message . '&lc=en';
	
	$simsimi_content = file_get_contents( $url );
	
	echo $simsimi_content;
?>