<?php 
// Functions and Constant definitions

/* Constants
   
*/
define('__ROOT__', dirname(dirname(__FILE__).'\\mcat'));
define('root', dirname(dirname(__FILE__).'\\mcat'));
define('hello','Hello World');
  

/* Functions

 *  
 *
 */
 
 

function getDirectoryListing($path=''){
 if ($path =='')  { 
   $path = realpath(root)."\\uploads";
 }
// echo "Search path = ".$path;
 $fnames = array();
 $cnt = 0;
foreach (new DirectoryIterator($path) as $fileinfo){
    if ($fileinfo->isDot()) continue;
      $fnames[$cnt] = $fileinfo->getFileName();
	 $cnt += 1;
}  // End foreach		
 return $fnames;
}

// Returns the file suffix/extension returns '' if directory
function getSuffix($str){
	$filetypes = array('mp3','mp4','jpg','pdf','avi','ogg','wpl','wma','zip','php','wsdl'); // Filter file types
	$sfx = explode('.',$str);
	$suff = '';
	if (count($sfx) >=2){ // Multiple . in the name, ext will be in the last one
	   $suff = $sfx[count($sfx)-1];
	}
   	else {   // Only name and ext so we can just send back  $sfx[0]
		$suff = $sfx[0];
	}
 if (in_array($suff,$filetypes))
   return $suff;
 else return 'err';
}
// Returns the filename without extension
function getName($str){
	$name = explode('.',$str);
	$noi = count($name);  // Number of items
	if ($noi>=2){ // Multiple . in the name, ext will be in the last one
	  $nme = array_slice($name,0,$noi-1);  /// Slice off the extension
	  return (implode('.',$nme));
	} else { // Only name and ext so we can just send back  $sfx[1]
	  return $name[0];
	}
return 'err GetName'; 	// Should never get here but in case we do send back error
}
// Set the location of known filetypes to limit the search area for showDirListing function
function getPathToSearch($mtype){
	echo "Media Type: ".$mtype."<br>";
 switch ($mtype){
	case 'audio' : $path = realpath('c:\\Users\\gavinjm\\Music'); break;
	case 'sheet' : $path = "c:\\Users\\gavinjm\\Documents\\Sheet Music"; break;
	case 'video' : $path = realpath('c:\\Users\\gavinjm\\Videos'); break;
	case 'ebook': $path = realpath('c:\\Users\\gavinjm\\Documents\\E-Books'); break;
	case 'document' : $path = realpath('c:\\Users\\gavinjm\\Documents'); break;
	default: $path = realpath('C:\\Users\\gavinjm\\Music');
}
echo "Path= ".$path."<br>";
return $path;
}
//
function testDirListing($path_to_search=''){
$filetypes = array('mp3','avi','ogg','wpl','wma','pdf','doc','xls','zip');


$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
$objects->rewind();
while ($objects->valid()){
	 if (!$objects->isDot()){
         echo $objects;
	 }
   }
}
// Outputs the directory listing in an HTML tabel
function showDirListing($mtype){

//$path = realpath('C:\\Users\\gavinjm\\Documents');
echo "<h3>".strtoupper($mtype)."</h3>";
$path = getPathToSearch($mtype);
echo '<h3>',$path,'</h3>';
try {
$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);

$objects->rewind();
 echo '<table>';
 echo '<tr><th>File Name</th><th>Type</th></tr>';
 while($objects->valid()){
	 echo '<tr>';
	 if (!$objects->isDot()){
		 $nme = getName($objects->getSubPathName());
		 $sfx = getSuffix($objects->getSubPathName());
		 if (($sfx != '') AND ($sfx!='err')){
		 echo '<td>'.$nme.'</td><td>'.$sfx.'</td>';
		 }
		} 
		 $objects->next();
		 echo '</tr>';
	 }
echo '</table>';	
} catch(Exception $err) {
	echo 'Caught Exception: ',$err->getMessage(), "<br>";
}
// return $objects;
 }



?>