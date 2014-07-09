<?php
$page=$_SERVER['REQUEST_URI'];
if( $page != "/" ){
	$segments=explode('/',$page);
	
	$redirection=$segments[1];
	
	if (count($segments) > 2){
	    	header("Location: http://".$_SERVER['SERVER_NAME']."/".$redirection,true,302);
	}
	
	$destination_uri=file_get_contents(__DIR__."/r/".$redirection);
	
	if(!$destination_uri){
	    	header("HTTP/1.0 404 Not Found");
	    	echo "<center><h3>Sorry, but your requested redirection was not be found!</h3></center>"; 
	}else{
	    	header("Location: ".$destination_uri, true,302);
	}
}else{
include(__DIR__.'/config.php');
?>
<!DOCTYPE html>
<html>

<head>
    <title><?php echo $title ?></title>

    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="author" content="Bennet96" />
    <meta name="keywords" content="" />

    <link href="<?php echo $webpath ?>/style/style.css" type="text/css" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/png" href="favicon.png" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
    <script language="javascript" type="text/javascript">
    function bg_size(){
        document.getElementById("bg-img").style.width = window.innerWidth + 'px';
        document.getElementById("bg-img").style.height = window.innerHeight + 'px';
    }
    </script>
</head>

<body onresize="bg_size()" >
<div id="background">
    <img onload="bg_size()" src="<?php echo $bgurl ?>" id="bg-img"/>
</div>
<div id="logo">
    <img src="<?php echo $logofile ?>" />
    <span><?php echo $headline ?></span>
</div>
<div onload="pos()" class="content">
    <p><?php echo $sitetext ?></p>
    <p><form action="http://<?php echo $url ?>"><button type="submit" class="btn btn-large">Continue to <?php echo $url ?></button></form></p>
</div>
<div class="brand">
&copy; <a href="http://bytegaming.de">ByteGamingDE</a>, 2014
</div>

</body>
</html>
<?php	
}
?>
