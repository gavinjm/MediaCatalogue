<?php include_once('lib\header.php'); ?>
<form action='getDirListing.php' method='post'>
 <table>
 <tr><th>Local Media Catalog</th><th>Options</th></tr>
 <tr><td>Type</td>
  <td><select name='mtype'>
	<option value='sheet'>Sheet Music</option>
	<option value='audio'>Audio</option>
	<option value='video'>Videos/Movies</option>
	<option value='ebook'>E-Books</option>
	<option value='document'>Document</option>
	</td>
  </tr>
 <tr><td>Genre</td><td><select name='genre'>
  <option value='All'>All Styles</option>
  <option value='Jazz'>Jazz</option>
  <option value='Blues'>Blues</option>
  <option value='Classical'>Classical</option></td></tr>
 <tr><td><input type='hidden' name='action' value='SHOW'></td><td><input type='submit'/></td></tr>
 </table>
 </form>
 
<?php 
include_once('lib\\footer.php')
?>