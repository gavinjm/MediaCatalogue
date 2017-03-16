<?php
require_once('functions.php');

try {
	$arrContextOptions=array("ssl"=>array( "verify_peer"=>false, "verify_peer_name"=>false,'crypto_method' => STREAM_CRYPTO_METHOD_TLS_CLIENT));
        
        $options = array(
                'soap_version'=>SOAP_1_2,
                'exceptions'=>true,
                'trace'=>1,
                'cache_wsdl'=>WSDL_CACHE_NONE,
                'stream_context' => stream_context_create($arrContextOptions)
        );
  $client = new SoapClient("catalog.wsdl",$options);
  
} catch (Exception $e){
	echo "<br>Error : ".$e->getLine()." ".$e->getMessage();
}
  $response= "<HTML>
 <HEAD>
  <TITLE>THS Client Lookup</TITLE>
 </HEAD
 <BODY>
<p>THS-Client</p>
<a href='index.php'>Home</a>
</BODY>
</HTML>";
  
  $genre = $_POST['genre'];
  $uid = "test user";
  
 if ($genre != ''){
 try {	  
	$response = $client->getCatalogEntry($genre,$uid);
	echo $response;
	//echo "<br>Response:" . $client->__getLastResponse();
 } catch (Exception $e){
    echo "Error : line =".$e->getLine()."  Message= ".$e->getMessage();
	echo $response;
 }
  
  
  }
  
?>