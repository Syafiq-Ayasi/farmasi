<?php  

function koderm_random($length){

	$data='1234567890';
	$string='ID-';

	for ($i=0; $i < $length; $i++){

		$post=rand(0,strlen($data)-1);
		$string .=$data[$post];

	}

	return $string;
}

	$rmkode=koderm_random(10);


function kodebl_random($length){

	$data='1234567890';
	$string='BL-';

	for ($i=0; $i < $length; $i++){

		$intan=rand(0,strlen($data)-1);
		$string .=$data[$intan];

	}

	return $string;
}

	$koderm=kodebl_random(10);

?>