<?php
include ('include/config.php');
$category = $_GET['cat'];
$filter = $_GET['id'];
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title><?php echo $category.' &raquo; '.$filter; ?> | <?php echo $yourbrand; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<link href="assets/css/style.css" rel="stylesheet" type="text/css" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<script type="text/javascript" src="assets/js/jquery.form.js"></script>


<script>
$(document).ready(function() { 

//form process

$('#imageuploadform').on('submit', function(event) {
	event.preventDefault();	
	$("#message").css("display", "none");
	$(".help").css("display", "none");
	$("#output").html('<div style="padding:50px"><img src="assets/images/ajax-loader.gif" class="loader"/></div>');
	$("#file").removeClass('uploadinput').addClass('uploadinputnext');
	$("#imageuploadform").css("margin-top", "0px");

		//then we get the server response and hide the loading animation

		$(this).ajaxSubmit({
		target: '#output',
			success: function() {
				$(".loader").css("display", "none");
				$(".shadow").css("display", "none"); 
				$(".shadow").load("include/script.php?fx=<?php echo $filter; ?>&imagename="+imagename+"&type=<?php echo $category; ?>");
				$('.shadow').fadeIn('slow').show("slow");
				$('.upload-ok').css("display", "block");
				$('.upload-nok').css("display", "none");
				$('.uploaded').html('<img src="<?php echo $outputdirectory; ?>/'+imagename+'" width="50">');
			}
		});
});

//onchange submits the file	
	
$("#file").change(function () {
	$('#imageuploadform').submit();
});


$(".filter").click(function () {
				var data_cat = $(this).data('cat');
				var data_idfilter = $(this).data('idfilter');
				$(".loader").css("display", "none");
				$(".shadow").css("display", "none"); 
				$(".shadow").load("include/script.php?fx="+data_idfilter+"&imagename="+imagename+"&type="+data_cat+"");
				$('.shadow').fadeIn('slow').show("slow");
				$('.help').hide('slow');
				var body = $("html, body");
				body.animate({scrollTop:0}, '500', 'swing', function() { 
				});
				});




}); 
</script>


<!-- GOOGLE ANALYTICS  -->

<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-93487329-1', 'auto');
ga('send', 'pageview');

</script>

</head>

<body>
<div class="contentholder">

<div class="top">
<!-- <h1 style="color:#333">Mockups Land</h1> -->
<h1> <a href="http://www.mockupsland.com/home/"> <img src="assets/images/logo1.png" alt=""> </a>  </h1>

<div class="photomenu"> <a href="index.php?type=photo-montage" class="photomontage">Photo</a> 

<a href="index.php?type=special-effects" class="specialeffects">Effects</a>

<!-- I ADDED A LINK CALLED Billboards, type defined as "billboards"    NOW IN INDEX.PHP NEED TO TAKE CARE OF THE SCRIPT-->

<a href="index.php?type=billboard" class="specialeffects">Billboards</a>

</div>

</div>

<div class="ad">
   <img src="assets/images/ad.gif"  width="768" height="90" alt="ad" />
</div>

<div class="help">
  <h2>upload your photo</h2>
</div>

<div id="wrapper">

<div id="message">
	<span class="msg">[ jpg, gif, png & less than 2 Mb ]</span>
</div>

<form action="include/upload-local-file.php" method="post" enctype="multipart/form-data" id="imageuploadform">
	<div class="uploaded" style="display:inline-block"></div>
	<div class="formupload" style="display: inline-block; position: relative; top: -10px;"><input name="imagefile" id="file" type="file" class="uploadinput" /></div>
</form>





<!--picture holder start-->
<div id="output"><img src="include/filters/<?php echo $category; ?>/green-template/<?php echo $filter; ?>.jpg" style="margin-bottom:5px"></div>
<!--picture holder end-->

<p class="p111">
	<a href="https://www.facebook.com/mockups.crazy/" target="_blank"><img src="assets/images/facebook1.png"></a>
	<a href="https://www.twitter.com/mockupsland" target="_blank"><img src="assets/images/twitter1.png"></a>
	<a href="https://www.plus.google.com/u/2/101387435340590293890" target="_blank"><img src="assets/images/googleplus1.png"></a>
</p>

<!-- SHARE BUTTON -->
<a class="a2a_dd" href="https://www.addtoany.com/share"><img src="https://static.addtoany.com/buttons/share_save_256_24.png" width="256" height="24" border="0" alt="Share"/></a>



<div class="ad">
   <img src="assets/images/ad.gif"  width="768" height="90" alt="ad" />
</div>
<div class="help">
  <h2>Other photo effects you might like :</h2>
</div>
<div class="upload-ok" style="display:none">
<?php

/* THIS IS A FUNCTION THAT CREATES 15 IMAGES FROM THE COLLAGE FOLDER */

foreach (glob("include/filters/collage/*.php") as $filename)
{
$cleanfile = str_replace("include/filters/collage/", "", $filename);
$id = str_replace(".php", "", $cleanfile);
echo '<div class="filter" data-cat="collage" data-idfilter="'.$id.'"><img src="include/filters/collage/'.$id.'.jpg" width="220"><h3><a href="javascript:void(0);">'.$id.' photo collage</a></h3></div>';
}

/* THIS IS A FUNCTION THAT CREATES 12 IMAGES FROM THE EFFECTS FOLDER */

foreach (glob("include/filters/effects/*.php") as $filename)
{
$cleanfile = str_replace("include/filters/effects/", "", $filename);
$id = str_replace(".php", "", $cleanfile);
echo '<div class="filter" data-cat="effects" data-idfilter="'.$id.'"><img src="include/filters/effects/'.$id.'.jpg" width="220"><h3><a href="javascript:void(0);">'.$id.' photo effect</a></h3></div>';
}

/* THIS IS A FUNCTION THAT CREATES 12 IMAGES FROM THE BILLBOARD FOLDER */

foreach (glob("include/filters/billboard/*.php") as $filename)
{
$cleanfile = str_replace("include/filters/billboard/", "", $filename);
$id = str_replace(".php", "", $cleanfile);
echo '<div class="filter" data-cat="billboard" data-idfilter="'.$id.'"><img src="include/filters/billboard/'.$id.'.jpg" width="220"><h3><a href="javascript:void(0);">'.$id.' photo billboard</a></h3></div>';
}

?>
</div>
<div class="upload-nok" style="display:block">
<?php

foreach (glob("include/filters/collage/*.php") as $filename)
{
$cleanfile = str_replace("include/filters/collage/", "", $filename);
$id = str_replace(".php", "", $cleanfile);
echo '<div class="filter"><a href="filter.php?cat=collage&id='.$id.'"><img src="include/filters/collage/'.$id.'.jpg" width="220"></a><h3><a href="filter.php?cat=collage&id='.$id.'">'.$id.' photo collage</a></h3></div>';
}

foreach (glob("include/filters/effects/*.php") as $filename)
{
$cleanfile = str_replace("include/filters/effects/", "", $filename);
$id = str_replace(".php", "", $cleanfile);
echo '<div class="filter"><a href="filter.php?cat=effects&id='.$id.'"><img src="include/filters/effects/'.$id.'.jpg" width="220"></a><h3><a href="filter.php?cat=effects&id='.$id.'">'.$id.' photo effect</a></h3></div>';
}

/* HERE I ADDED A FUNCTION FOR BILLBOARD FOLDER, HAVE TO CHECK IF IT WORKS  */
foreach (glob("include/filters/billboard/*.php") as $filename)
{
$cleanfile = str_replace("include/filters/billboard/", "", $filename);
$id = str_replace(".php", "", $cleanfile);
echo '<div class="filter"><a href="filter.php?cat=billboard&id='.$id.'"><img src="include/filters/billboard/'.$id.'.jpg" width="220"></a><h3><a href="filter.php?cat=billboard&id='.$id.'">'.$id.' photo billboard</a></h3></div>';
}

?>
</div>

</div>

<div class="ad">
   <img src="assets/images/ad.gif"  width="768" height="90" alt="ad" />
</div>




<div class="bottom">
  2017 Mockups Land
</div>

</div>


<script async src="https://static.addtoany.com/menu/page.js"></script>
<!-- AddToAny END -->


<!-- GOOGLE ADSENSE -->
<div align="center">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- mockupsland -->
<ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-4392662367319852" data-ad-slot="2150964326" data-ad-format="auto"></ins>
<script>(adsbygoogle = window.adsbygoogle ||[]).push({});</script>
</div>

</body>
</html>










