<?php

// 过滤输入
$title = trim( strip_tags( $_REQUEST['title'] ) );
$content = trim( strip_tags( $_REQUEST['content'] ) );


if( strlen( $title ) < 1 || strlen( $content ) < 1  ) die( '标题和内容都不能为空' );

// 将内存中的数据序列化成字符串
$data = compact( "title" , "content" );
$data_string = serialize( $data );

// 保存到文件里边
$file = './data.php'; // 这要求对当前目录有写权限
if( file_put_contents( $file , $data_string ) )
    die('简历已保存，请到<a href="resume.php">浏览页面</a>查看');
else
    die('简历保存失败');    





