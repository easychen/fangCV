<?php

$data_string = ( file_get_contents( "./data.php" ) );
$data = unserialize( $data_string );

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$data['title'];?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <div class="resume">
        <h2><?=$data['title'];?></h2>
        <div class="content">
        <?=nl2br( $data['content'] );?>
        </div>
    </div>
</body>
</html>