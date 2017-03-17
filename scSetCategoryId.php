<?php 
if ($_POST){
$catalogId = $_POST['catalogueId'];
}
include_once('lib\\header.php');

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
	echo $result;
	
  } catch (Exception $e) {
	  //echo $response;
	  echo "Error:   ( Catalog ID = ".$catalogId." ) Line = ".$e->getLine()."  ".$e->getMessage();
  }
include_once('lib\\footer.php');  
?>