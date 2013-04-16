<html>
	<head>
		<?php include("databaseconnection.php") ?>

		<style type="text/css" media="all">@import "css/annotation.css";</style>
		<script type="text/javascript" src="js/jquery-1.7.1.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.17.js"></script>
		<script type="text/javascript" src="js/jquery.annotate.js"></script>
		<script type="text/javascript" src="js/jquery.Jcrop.js"></script>
		<script type="text/javascript" src="js/jquery.color.js"></script>
		<script type="text/javascript">



		<!-- AJAX SAVE PART GOES HERE -->
<script>
function save(){
 var leftv = $('#left').val();
 var widthv = $('#width').val();
  var heightv = $('#height').val();
   var textv = $('#text').val();
   var topv = $('#top').val();
 $.ajax({
 type: "POST",
 url: "savedata.php",
 data: {left:leftv, width:widthv,height:heightv,text:textv,top:topv}
 }).done(function( result ) {
 $("#result").html(result);

 });
}
</script>
		
		
		
		<!--- Script to display annotation -->
		
		<script language="javascript">
			$(window).load(function() {
				$("#toAnnotate").annotateImage({
					editable: true,
					useAjax: false,
					notes: [  
					
	<?php
     $i = 0;
     $query = mysql_query("SELECT * from poc");
     while($row = mysql_fetch_array($query)){
      $top = $row["top"];
      $left = $row["left"];
	  $width = $row["width"];
	  $height = $row["height"];
	  $text = $row["text"];
	  $id = $row["id"];
	  ?>
	  {
	  "top": <?php echo $top;?>,
	  "left": <?php echo $left;?>,
	  "width":<?php echo $width;?>,					  
	"height":<?php echo $height;?>,
	  "text":" <?php echo $text; ?>",
		"id": <?php echo $id; ?>,
		"editable": false },
	  <?php
      $i++;
	  }
	  ?>
	  ]});
	  });
		</script>
		
		
		
		
		
	</head>
	<body>
		<div>
			<img id="toAnnotate" src="images/trafalgar-square-annotated.jpg" alt="Trafalgar Square" width="600" height="398" />
		</div>
		<p>
		
		
		<table border="1">
<tr>
<td>Top</td>
<td><input type="text" id="top"></td>
</tr>
<tr>
<td>Left</td>
<td><input type="text" id="left"></td>
</tr>
<tr>
<td>width</td>
<td><input type="text" id="width"></td>
</tr>
<tr>
<td>Height</td>
<td><input type="text" id="height"></td>
</tr>

<tr>
<td>Text</td>
<td><input type="text" id="text"></td>
</tr>
<tr>
<td><input type="button" onclick="save()" value="save"></td>
<td><div id="result"></div></td>
</tr>


	
</table>



	
	
	</p>
	</body>
	
	
</html>