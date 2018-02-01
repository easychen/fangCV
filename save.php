<?php
require '_function.php';

// 过滤输入
$title = trim( strip_tags( $_REQUEST['title'] ) );
$content = trim( strip_tags( $_REQUEST['content'] ) );
$class = intval( $_REQUEST['class'] );
if( $class < 1 ) $class = 1;

if( strlen( $title ) < 1 || strlen( $content ) < 1  ) die( '标题和内容都不能为空' );


// 将内存中的数据序列化成字符串
$data = compact( 'title' , 'content' , 'class' );

// 追加简历的过程需要被重复使用，故提取到公用函数文件中。

$save1 = append_resume( $data , 0 ); // 保存到全校简历列表
$save2 = append_resume( $data , $class ); // 保存到班级简历列表 

if( $save1 && $save2 )
{
    die('简历已保存，请到<a href="list.php">浏览页面</a>查看');
}
else
{
    // 如果两个保存操作，只成功了一个，应该怎么办呢？
    die('简历保存失败');
}




