<?php

function append_resume( $data , $class = 0 )
{
    if( $class === 0 ) 
        $file = './data.php';
    else 
        $file = './class' . $class . '.data.php';

    $data_array =  unserialize( @file_get_contents( $file )  );

    if( !isset( $data_array['maxid'] ) ) $data_array['maxid'] = 0;
    if( !isset( $data_array['resumes'] ) ) $data_array['resumes'] = [];
    
    $data_array['maxid']++;
    $data_array['resumes'][$data_array['maxid']] = $data;
    $data_string = serialize( $data_array );
    
    // 保存到文件里边
    return file_put_contents( $file , $data_string  );
}