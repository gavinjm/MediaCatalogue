<html>
 <head>
  <title>Media Catalog</title>
  <style>
  table {
	  font-family: arial, sans-serif;
	  border-collapse: collapse;
	  width: 100%;
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
 <a href='index.php'>Home</a>
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
 </body>
 </html>
