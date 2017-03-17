<?php
/*  Manage the backups 
 *
*/
require_once 'lib\\functions.php';   // For getDirectroryListing function.
 
/* Check if we have received a POST request 
 *  
 */
if ($_POST) {
	$file = $_POST['fileToOpen'];
}

/* Get the directory listing
 *  
 */
$fileList = getDirectoryListing("C:\inetpub\wwwroot\mcat");
 
 /* Set up KoolDateTimePicker
  * 
  */
   $KoolControlsFolder = "KoolPHPSuite/KoolControls";//Relative path to "KoolPHPSuite/KoolControls" folder
	
   require $KoolControlsFolder."/KoolCalendar/koolcalendar.php";	
	
	$datetimepicker = new KoolDateTimePicker("datetimepicker"); //Create calendar object
	$datetimepicker->scriptFolder = $KoolControlsFolder."/KoolCalendar";//Set scriptFolder
    $datetimepicker->styleFolder="default";
	$datetimepicker->Init();
?>
<?php 

include_once('lib\header.php');
?>


<form id="frmReportDate" method="post">	
	<div style="padding-top:20px;padding-bottom:10px;width:650px;">
		Pick a time:
		<br/>
		<?php echo $datetimepicker->Render();?>
		<div style="padding-top:10px;">
			<input type="submit" value="Submit" />
		</div>
		<div style="padding-top:10px;">
			<?php
				if($datetimepicker->Value!=null)
				{
					echo "<b>Chosen date/time:</b> ".$datetimepicker->Value;
				}
			?>
		</div>		
	</div>
</form>

<form action="Backup.php" method="post">
	<div style="padding-top:10px;padding-bottom:10px;width:650px;">
		Filename:
		<br/>
		<div style="padding-top:10px;">
			<select name="fileToOpen">
		 <?php for ($cnt=0; $cnt < count($fileList); $cnt++) { ?>
			<option value="<?php echo $fileList[$cnt]; ?>"><?php echo $fileList[$cnt] ?></option>
		 <?php } ?>
			</select>
		</div>
		<div style="padding-top:10px;">
		<input type="submit" name="submit" value="Submit" />
		</div>
	</div>
</form>

<?php include_once('lib\\footer.php');?>