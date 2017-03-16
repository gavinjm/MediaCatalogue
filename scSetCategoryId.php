<?php 
$catalogId = $_POST['catalogueId'];
 $response= "<HTML>
 <HEAD>
  <TITLE>Catalog</TITLE>
 </HEAD
 <BODY>
 <a href='index.php'>Home</a>";
 
 $tail ="</BODY></HTML>";

try {
      $arrContextOptions=array("ssl"=>array( "verify_peer"=>false, "verify_peer_name"=>false,'crypto_method' => STREAM_CRYPTO_METHOD_TLS_CLIENT));
        
        $options = array(
                'soap_version'=>SOAP_1_2,
                'exceptions'=>true,
                'trace'=>1,
                'cache_wsdl'=>WSDL_CACHE_NONE,
                'stream_context' => stream_context_create($arrContextOptions)
        );
        $client = new SoapClient('catalog.wsdl',$options);
    
    } catch (Exception $e) {
        echo "<h2>Exception Error!</h2>";
        echo "Error:" . $e->getMessage();
    }

    
  try {
	 $result = $client->setCatalogEntry($catalogId);
	echo $response."<br>".$result.$tail;
  } catch (Exception $e) {
	  //echo $response;
	  echo "Error:   ( Catalog ID = ".$catalogId." ) Line = ".$e->getLine()."  ".$e->getMessage();
  }
  
?>