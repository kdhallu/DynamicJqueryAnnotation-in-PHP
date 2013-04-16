<?php include('databaseconnection.php');?>
<?php
$left = $_POST['left'];
$width = $_POST['width'];
$height = $_POST['height'];
$text = $_POST['text'];
$top = $_POST['top'];
	  if( empty($left) || empty($width) || empty($height) || empty($text) || empty($top) )
	  
	  {
	  	echo "Please enter all the details";
		exit();
	  }
		$sql = "INSERT INTO poc(top, `left`, width, height, `text`) VALUES ($top, '$left', $width , $height, '$text')";
	    if(mysql_query($sql))
	    {
		echo "Success";
		}
	   else
	     {
		 echo "Unable to save setting please try later";
		 
		 }
	  
	  ?>