<?php
//Set your read key that you get from uclassify
$readKey='UCLASSIFY API KEY HERE';
$text=urlencode($_GET['text']);

//Send request to uclassify.com and get its response
$response=file_get_contents("http://uclassify.com/browse/uClassify/Topics/ClassifyText?readkey={$readKey}&text={$text}&version=1.01");
//Parse the xml response
$xmlResp = new SimpleXMLElement($response);
if($xmlResp->status['success']){
	$maxP=0;
	//Get the highest scoring word
	foreach($xmlResp->readCalls->classify->classification->class as $class){
		if((float)$class['p']>$maxP){
			$maxP=(float)$class['p'];
			$topic=$class['className'];
		}
	}
	echo $topic.' '.$maxP;
} else {
	//Print error here
}