<?php

function kaloisi($jika,$maka='',$hasil=''){
	if ($jika<>'') {
		$maka;
	}
	else{
		$hasil;
	}	
}

function kaloada($jika,$maka='',$hasil=''){
	if (isset($jika)) {
		$maka;
	}
	else{
		$hasil;
	}	
}

function kaloadaisi($jika,$maka='',$hasil=''){
	if (isset($jika) OR $jika<>'' ) {
		$maka;
	}
	else{
		$hasil;
	}	
}

?>