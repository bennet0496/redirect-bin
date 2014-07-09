<!DOCTYPE html>
<?php include(__DIR__.'/config.php'); ?>
<html>
<head>
    <title>Create a Redirection</title>
    <meta charset="UTF-8" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="keywords" content="" />
    <link href="<?php $webpath ?>/style/style.css" type="text/css" rel="stylesheet"/>
    <link rel="shortcut icon" type="image/png" href="favicon.png" />
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
<?php 
    if(count($_POST) > 0){
        if( count($_POST) > 0 && isset($_POST['passwd']) && isset($_POST['wname']) && isset($_POST['wziel']) ){
            $ipasswd=$_POST['passwd'];
            $password_chash=trim(file_get_contents(__DIR__."/p/cpasswd"));
            $password_ihash=crypt(sha1(md5(trim($ipasswd))),'$2a$07$'.$seat.'$');
            if( $password_chash == $password_ihash ){
                if(file_put_contents(__DIR__."/r/".$_POST['wname'],$_POST['wziel']) !== false){
                      echo '<div class="success">Redirection <a href="http://'.$_SERVER['SERVER_NAME'].'/'.$_POST['wname'].'" target="_blank">http://'.$_SERVER['SERVER_NAME'].'/'.$_POST['wname'].'</a> successfully created</div>'; 
                }
            }else{
                echo '<div class="alert alert-danger">'.
                        '<strong>Error!</strong> There was an Error while handeling your Request'.
                     '</div>';
            }
        }else{
            echo '<div class="alert alert-danger" >'.
                        '<strong>Error!</strong> There was an Error while handeling your Request'.
                     '</div>';
        }
    }
?>                      
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" autocomplete="off">
<table cellpadding="1" cellspacing="1" summary="" width="100%" border="0">
    <tr>
        <td><label for="wname">Weiterleitungsname</label><hr />
            <div class="input-group">
                <span class="input-group-addon">http://<?php echo $_SERVER['SERVER_NAME']; ?>/</span>
                <input class="form-control" type="text" name="wname" required="required" placeholder="" /> 
            </div>
        </td>
    </tr>
    <tr>
        <td><label for="wziel">Weiterleitungsziel</label><hr /><input type="text" name="wziel" required="required" /></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td><label for="passwd">Erstellungspasswort</label><hr /><input type="password" name="passwd" required="required" /></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="Erstellen" name="submit" class="btn btn-large btn-primary" /></td>
    </tr>
</table>
</form>
<?php
    if($_REQUEST['ref'] == '1'){
        ?>
        <form action="/list.php">
            <table width="100%">
                <tr>
                    <td colspan="2"><button class="btn btn-large" type="submit">Zur&uuml;ck zur Liste</button></td>
                </tr>
            </table>   
        </form>
        <?php 
    } 
 ?>
</div>
</body>
</html>
