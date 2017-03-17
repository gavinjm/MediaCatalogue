<?php
require_once 'lib\functions.php';

// Get post params execting mtype and genre
if ($_POST){
$mtype = $_POST['mtype'];
$genre = $_POST['genre'];
$action = $_POST['action'];
}

//Returns the file extension for the string.
// Filtering done here to ignore unknown or not neccessary file extensions.
?>
<html>
 <head>
  <title>List Media Catalog</title>
  <style>
  table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 75%;
  }
  td,th {
	  border: 1px solid #dddddd;
	  text-align: left;
	  padding: 8px;
  }
  tr: nth-child(even){
	  background-color: #dddddd;
  }
  </style>
 </head>
 <body>
 <a href="index.php">Home</a>
 <a href="media_catalogue.php">Back</a>
 <hr>
 <?php
  if ($action=='SHOW'){ 
    showDirListing($mtype);
  }
  
 ?>
 </body>
 </html>