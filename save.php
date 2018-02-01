<?php

// 过滤输入
$title = trim( strip_tags( $_REQUEST['title'] ) );
$content = trim( strip_tags( $_REQUEST['content'] ) );


if( strlen( $title ) < 1 || strlen( $content ) < 1  ) die( '标题和内容都不能为空' );

// 将内存中的数据序列化成字符串
$data = compact( 'title' , 'content' );

// 读取data.php中的数据
// 调整 data.php 中数组的结构
// 从 ['resume1','resume1']
// 改为 [ 'maxid' , 'resumes'=>['resume1','resume1'] ]

$data_array =  unserialize( file_get_contents( './data.php' )  );

if( !isset( $data_array['maxid'] ) ) $data_array['maxid'] = 0;
if( !isset( $data_array['resumes'] ) ) $data_array['resumes'] = [];

$data_array['maxid']++;
$data_array['resumes'][$data_array['maxid']] = $data;
$data_string = serialize( $data_array );

// 保存到文件里边
if( file_put_contents( './data.php' , $data_string  ) ) 
    die('简历已保存，请到<a href="list.php">浏览页面</a>查看');
else
    die('简历保存失败');    





