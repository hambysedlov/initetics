
<?php

session_start();
$username=$_SESSION['name'];
if(!isset($_SESSION["session_email"])):
header("location:index.php");
else:
?>



<!DOCTYPE html>
<html> 
<head>
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<title>	</title>
</head>
<body>

<header>
<div class="container-fluid header">	
<div class="row">	

<div class="col-lg-12 ">

<div class="col-lg-1 col-md-12  col-xs-3 text-center"> <img src="images/js.png" height="60" width="60" class="img-responsive">	</div>
<div class="col-lg-3 col-md-12 col-xs-9 welcometo"><a href="page.php" style="text-decoration: none;">Welcome to Image Previewer</a></div>

<div class="col-lg-3 col-md-12 col-xs-12 pull-right text-right" id="exit" style="padding-top: 20px;">

<span class="hi">Hi, <?php echo $username;?>!</span>  
	<div class="col-lg-2 pull-right">
	<a href="logout.php"><img src="images/Logout_icon.png" class="img-responsive" width="60" height="60" alt=""></a>

	</div>


</div>	



	</div>
	</div>
</div>
	</header>

<section class="search">
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-12" style="z-index:3;">
			<div class="col-lg-10 col-md-12 col-xs-6" >

<input type="text" id="who" name="referal" placeholder="Search..." value="" class="who form-control"  autocomplete="off">
<ul class="search_result" style="z-index: 0; position: absolute;"></ul>
		</div>

			<div class="col-lg-2 col-md-12 col-xs-6" style="z-index:4;"><input type="submit" id="find" class="btn btn-default" value="Search" style="width: 80%"></div>

		</div>

		<div class="col-lg-12" >
			<h5 style="    padding-left: 15px;">
<b>e.g</b>
				<?php
 require_once("connection.php");
 $query = "SELECT * FROM tags ORDER BY VIEW DESC LIMIT 10";
 $result = mysql_query($query);
             if($result === FALSE) { 
    die(mysql_error()); 
}
while($row=mysql_fetch_array($result)){
$tags = $row['name_tags'];
echo ' <span class="poptags">'; 
echo $tags;
echo '</span> ';
}
?>

			
		</h5>
		</div>

		</div>
		</div>
</section>

<section class="preview">
	
<div class="container-fluid">
	
<div class="row">
	
<div class="col-lg-12" id="content">
	

<div class="col-lg-3 photo text-center">
<a href="javascript:PopUpShow()">	
<img src="images/add.png" height="140" alt=""></a>
<br>
<span>
ADD NEW IMAGE
	</span>
</div>

<div id="order">
<?php
 require_once("connection.php");
 $query = "SELECT * FROM images  ORDER BY ID DESC LIMIT 11";
 $result = mysql_query($query);
 
?>
<?php include('data.php'); ?>
</div>



</div>

<div class="ajax-load text-center" style="display:none">
    <p><img src="http://demo.itsolutionstuff.com/plugin/loader.gif">Loading More img</p>
</div>

</div>

</div>


<div class="b-popup" id="popup1">
	<div class="b-popup-content">
	<div class="row">	
<div class="col-lg-12">
	<div class="col-lg-6"><span>ADD IMAGE</span>

		<div class="content">

	<!-- Область для перетаскивания -->
	<div id="drop-files" ondragover="return false">

		<p>Drag&Drop image there</p>
 <!-- Область предпросмотра -->
		<div id="uploaded-holder"> 
		<div id="dropped-files"></div></div>
        
	</div>

	<form id="frm" style="margin-top: 19px;margin-left: 23px;">
  <input type="file" multiple id="uploadbtn" data-classButton="btn btn-primary" >
        </form>
   
	
        	
        	 
        </div>
	</div>

    


	
	<div class="col-lg-5">
<span>
		ADD INFO</span>
		<p></p>
	



<form id="info">
		<label>Name your media</label><br>
			<input class="input form-control" id="namemedia" name="namemedia" type="text"><p></p>

			<label>Add Tags</label><br></form>
			<form id="tagsdelete">
<textarea id="tags" class="form-control" name="tags" rows="4" readonly="" cols="50">
 
</textarea>
</form>
<form id="tagsinput">
<input class="input form-control" id="tagsadd" name="tagsadd" type="text">
</form>
	<input type="submit" class="btn btn-default" id="addtags" name="" value="Add tags">
	<input type="submit" class="btn btn-default" id="delete" name="" value="Delete tags"><p></p>
	</form>
			<label>Add Description</label><br>
			<input class="input form-control" id="description"  name="descripton" type="text" ><p>

		<div id="upload-button">
            	<center>
                	<span>0 Файлов</span>			
<input type="submit" class="upload btn btn-default" name="ADD" value="SEND" width="50px;">
                    <!-- Прогресс бар загрузки -->
                	<div id="loading">
						<div id="loading-bar">
							<div class="loading-color"></div>
						</div>
						<div id="loading-content"></div>
					</div>
                </center>
			</div> 

			<div id="ok"></div>


	</div>
	<div class="col-lg-1 col-xs-12 text-center"><a href="javascript:PopUpHide()">X</a></div>
</div>
</div>

	</div>
	


</div>


</section>
</body>





<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
<script type="text/javascript" src="js/popup.js"></script>
<script type="text/javascript" src="js/javascript.js"></script>
<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
<script type="text/javascript" src="js/search.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
<script type="text/javascript">
	function windowSize(){
    if ($(window).width() <= '768'){
        $('#exit').removeClass('pull-right');
        $('#exit').removeClass('text-right');
        $('#drop-files').hide();
    } 
    else{
      $('#exit').addClass('pull-right');
     
    }
}
$(window).on('load resize',windowSize);

</script>
</html>


<?php endif; ?>

