<!DOCTYPE html>
<?php include(__DIR__.'/config.php'); ?>
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
    <style>
        table tr td:first-child{
            width: 40%;
        }
        table,tr,td,th {
            font-size: 0.9em;
            border: 1px solid rgb(0,0,0);
        }
        table tr *{
            line-height: 21px;
            overflow: hidden;
        }
        td div{
            width: 418px !important;
            overflow: hidden !important;
        }
    </style>
</head>

<body onresize="bg_size()" >
<div id="background">
    <img onload="bg_size()" src="<?php echo $bgurl ?>" id="bg-img"/>
</div>
<div id="logo">
    <img src="<?php echo $logofile ?>" />
    <span>ByteGamingDE</span>
</div>
<div onload="pos()" class="content">
    <table>
        <tr>
            <th>Weiterleitung</th>
            <th>Ziel</th>
        </tr>
        <?php 
            if($dir = opendir(__DIR__.'/r')){
                while(($file = readdir($dir)) !== false){
                    if ($file !== '.' && $file !== '..'){
                        echo '<tr>'.
                                '<td>http://'.$_SERVER['SERVER_NAME'].$webpath.'/'.$file.'</td>'.
                                '<td><div style="overflow: hidden;"><a target="_blank" href="'.file_get_contents(__DIR__.'/r/'.$file).'">'.file_get_contents(__DIR__.'/r/'.$file).'</a></div></td>'.                         
                             '</tr>';
                    } 
                }
            }
        ?>
    </table>
    <div style="margin: 10px;">
        <form action="/create.php" method="get">
            <button name="ref" value="1" class="btn btn-large btn-primary">Neue Weiterleitung Erstellen</button>
        </form>
    </div>    
</div>

</body>
</html>
