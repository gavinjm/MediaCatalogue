<?php 
require_once '.\lib\functions.php';

function getCatalogEntry($genreId,$uid){
if($genreId=='Jazz') 
return "<h3>Jazz Catalog ".$uid."</h3>
<table border>
<tr><th>CatalogId</th>
<th>Journal</th><th>Section
</th><th>Edition</th><th>
Title</th><th>Author</th>
</tr><tr><td>catalog1</td>
<td>Jazz Standards</td><td>
XML</td><td>October 2005</td>
<td>Guitar</td>
<td>Al Di Meola</td></tr>
</table>";
  
elseif ($genreId='Classical') 

return "
<h3>Classical Catalog</h3>
 <table border>
<tr><th>CatalogId</th><th>
Journal</th><th>Section</th>
<th>Edition</th><th>Title
</th><th>Author
</th></tr><tr><td>catalog 2
</td><td>Mallorca</td>
<td>XML</td><td>July 2006</td>
<td>Acoustic Guitar</td><td>Julian Bream</td>
</tr>
</table>";
} 

function setCatalogEntry($genre){
	
return "<h3>Setting the genre to: ".$genre."</h3>";

}

/*
 ** Set up the sql environment
*/
     //    $dbhost = 'localhost:3306';
     //    $dbuser = 'gavin';
     //    $dbpass = 'heaven';
      //      $conn = mysql_connect($dbhost, $dbuser, $dbpass);
      //   if(! $conn ) {
      //      die('Could not connect: ' . mysql_error());
      //   }
         
         


//echo "Greeting = ".hello;
//echo "Root = ".__ROOT__;


ini_set("soap.wsdl_cache_enabled", "0");
ini_set("always_populate_raw_post_data","-1");
$server = new SoapServer("catalog.wsdl"); 
$server->addFunction("getCatalogEntry");
$server->addFunction("setCatalogEntry"); 
$server->handle(); 

?>