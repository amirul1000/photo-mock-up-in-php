<?php
include ('include/config.php');
?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $yourbrand; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

<link href="assets/css/style.css" rel="stylesheet" type="text/css" />


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.form.js"></script>

<!-- GOOGLE ANALYTICS -->

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


<!-- NEED TO ADD LINK FOR BILLBOARD -->
<div class="top">
	<!--		<h1 style="color:#333">Mockups Land</h1>    -->
	
	<h1> <a href="http://www.mockupsland.com/home/">  <img src="assets/images/logo1.png"> </a> </h1>
	
	
<div class="photomenu"><a href="index.php?type=photo-montage" class="photomontage">Photo</a> 
<a href="index.php?type=special-effects"  class="specialeffects">Effects</a>
<a href="index.php?type=billboard" class="specialeffects">Billboards</a>
</div>
</div>



<div class="ad">
   <img src="assets/images/ad.gif"  width="768" height="90" alt="ad" />
</div>


<div class="help">
  <h2>Please select a template</h2>
</div>
<div id="wrapper">

<?php

if($_GET['type']=='photo-montage') {
foreach (glob("include/filters/collage/*.php") as $filename)

{
$cleanfile = str_replace("include/filters/collage/", "", $filename);
$id = str_replace(".php", "", $cleanfile);
echo '<div class="filter"><a href="filter.php?cat=collage&id='.$id.'"><img src="include/filters/collage/'.$id.'.jpg" width="220"></a><h3><a href="filter.php?cat=collage&id='.$id.'">'.$id.' photo collage</a></h3></div>';
}

}

elseif ($_GET['type']=='special-effects') {
foreach (glob("include/filters/effects/*.php") as $filename)

{
$cleanfile = str_replace("include/filters/effects/", "", $filename);
$id = str_replace(".php", "", $cleanfile);
echo '<div class="filter"><a href="filter.php?cat=effects&id='.$id.'"><img src="include/filters/effects/'.$id.'.jpg" width="220"></a><h3><a href="filter.php?cat=effects&id='.$id.'">'.$id.' photo effect</a></h3></div>';
}

}
/* DODANO ZA BILLBOARD*/

elseif ($_GET['type']=='billboard') {
foreach (glob("include/filters/billboard/*.php") as $filename)

{
$cleanfile = str_replace("include/filters/billboard/", "", $filename);
$id = str_replace(".php", "", $cleanfile);
echo '<div class="filter"><a href="filter.php?cat=billboard&id='.$id.'"><img src="include/filters/billboard/'.$id.'.jpg" width="220"></a><h3><a href="filter.php?cat=billboard&id='.$id.'">'.$id.' photo billboard</a></h3></div>';
}

}


else {
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

/* TAKOĐER DODANO ZA BILLBOARD */
foreach (glob("include/filters/billboard/*.php") as $filename)
{
$cleanfile = str_replace("include/filters/billboard/", "", $filename);
$id = str_replace(".php", "", $cleanfile);
echo '<div class="filter"><a href="filter.php?cat=billboard&id='.$id.'"><img src="include/filters/billboard/'.$id.'.jpg" width="220"></a><h3><a href="filter.php?cat=billboard&id='.$id.'">'.$id.' photo effect</a></h3></div>';
}

}

?>

</div>


<div class="ad">
   <img src="assets/images/ad.gif"  width="768" height="90" alt="ad" />
</div>
	

<p class="p111">
	<a href="https://www.facebook.com/mockups.crazy/" target="_blank"><img src="assets/images/facebook1.png"></a>
	<a href="https://www.twitter.com/mockupsland" target="_blank"><img src="assets/images/twitter1.png"></a>
	<a href="https://www.plus.google.com/u/2/101387435340590293890" target="_blank"><img src="assets/images/googleplus1.png"></a>
</p>








<div class="bottom">
  2017 Mockups Land
</div>

<!-- SHARE BUTTON -->
<p class="p222"><a class="a2a_dd" href="https://www.addtoany.com/share"><img src="https://static.addtoany.com/buttons/share_save_256_24.png" width="256" height="24" border="0" alt="Share"/></a></p>


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









