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
            $opasswd=$_POST['oldpw']; //submitted old password
            $password_chash=trim(file_get_contents(__DIR__."/p/cpasswd")); //current password hash
            $password_ohash=crypt(sha1(md5(trim($opasswd))),'$2a$07$'.$seat.'$'); //hashed submitted password
            if( $password_chash == $password_ohash ){
                if( trim($_SERVER['newpw']) === trim($_SERVER['newpw1']) ){
			$newpw = $_SERVER['newpw'];
			$newhash = crypt(sha1(md5(trim($newpw))),'$2a$07$'.$seat.'$');
			if( file_put_contents( __DIR__.'/p/cpasswd' , $newhash ) !== false ){
				echo '<div class="success">Password successfully updated</div>';
			}else{
				echo '<div class="alert alert-danger">'.
                        	'<strong>Error!</strong> There was an error while updating the password'.
                     		'</div>';
			}
		}else{
			echo '<div class="alert alert-danger">'.
                        '<strong>Error!</strong> Password mismatch!'.
                     	'</div>';
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
        <td><label for="oldpw">Old Password</label><input type="password" name="oldpw" required="required" /></td>
    </tr>
    <tr>
        <td><label for="newpw">New Passwort</label><hr /><input type="password" name="newpw" required="required" /></td>
    </tr>
    <tr>
        <td><label for="passwd">New Password Again</label><hr /><input type="password" name="newpw1" required="required" /></td>
    </tr>
    <tr>
        <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" value="Change" name="submit" class="btn btn-large btn-primary" /></td>
    </tr>
</table>
</form>
</div>
</body>
</html>
