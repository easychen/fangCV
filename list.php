<?php
if( !isset( $_REQUEST['class'] ) ) $_REQUEST['class'] = 0;
$class = intval( $_REQUEST['class'] );

if( $class < 1 ) $file = './data.php';
else $file = './class' . $class . '.data.php';;

$data_array = unserialize( @file_get_contents( $file )) ;
$cvlist = $data_array['resumes'];
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>简历列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
<div class="resume">
<h2>简历列表</h2>
    <a href="list.php">全校</a>&nbsp;
    <a href="list.php?class=1">一班</a>&nbsp;
    <a href="list.php?class=2">二班</a>&nbsp;
    <a href="list.php?class=3">三班</a>&nbsp;
<?php if( $cvlist && is_array( $cvlist ) ): ?> 
    <ul>
    <?php foreach( $cvlist as $key => $cv ): ?>
        <li><a target="_blank" href="detail.php?id=<?=$key?>"><?=$cv['title']?></a></li>
    <?php endforeach; ?>    
    </ul>
    <?php else: ?>
        <h2>还没有简历发布</h2>
    <?php endif; ?>
    <p><a href="publish.php">+发布简历</a></p>
</div>
</body>
</html>
