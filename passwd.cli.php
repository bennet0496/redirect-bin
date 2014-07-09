<?php
if(php_sapi_name() == "cli") {
	include(__DIR__.'/config.php');
	echo $argv[1].' : '.crypt(sha1(md5(trim($argv[1]))),'$2a$07$'.$seat.'$')."\n";
} else {
    //Not in cli-mode
    echo "CLI only!!";
    exit;
}
?>
