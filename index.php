<?php 
require_once 'lib\\functions.php';
require_once "soap-server.php";

?>
<HTML>
 <HEAD>
  <TITLE>Media Catalog</TITLE>
 </HEAD
 <BODY>
<table border='1' cellpadding='10px'><tr><td><a href="media_catalogue.php">Media Catalogue</a></td>
<td><a href="Backup.php">Back Up</a></td></tr></table>

<h3>Testing Web Service WSDL File</h3>

<form action="scGenre.php" method="post">
<table>
<tr>
<td>Category</td><td>
 <select name='genre'>
  <option value="Classical">Classical</option>
  <option value="Jazz">Jazz</option>
  <option value="Blues">Blues</option>
  <option value="Contemporary">Contemporary</option>
  <option value="temp">Test Refreshing cache</option>
</select></td></tr>
<tr><td>Key</td><td>
<select name='key'>
  <option value="Any">Any</option>
  <option value="A">A</option>
  <option value="Bb">Bb</option>
  <option value="B">B</option>
  <option value="C">C</option>
  <option value="D">D</option>
</select>
</td>
</tr>
<tr><td><input type="submit"/></td><td><input type="hidden" name="choice" value="Get"/></td></tr>
</table>
</form>

<form action="scSetCategoryId.php" method="post">

<table>
<tr><th>Set</th><th>Cat</th><th>ID</th></tr>
<tr><td>Set the Categorie ID:</td><td><input type="text" name="catalogueId"/></td>
<td><input type="hidden" name="choice" value="Set"/><input type="submit"/></td></tr></table>
</form>


</BODY>
</HTML>