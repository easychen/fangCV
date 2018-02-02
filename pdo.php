<?php
// phpinfo();

// exit;
// pdo demo
$user = 'php';
$pass = 'fangtang';
$dsn = 'mysql:host=mysql.ftqq.com;dbname=fangtangdb';


try 
{
    // 连接
    $dbh = new PDO( $dsn , $user, $pass );
    // 查询
    //foreach($dbh->query( 'SELECT* FROM `resume`' ) as $row) 
    foreach($dbh->query( 'SELECT* FROM `resume`' , PDO::FETCH_ASSOC ) as $row) // 只显示 key-value的版本
    {
        print_r($row);
    }
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
finally
{
    $dbh = null; // 手工关闭连接 如果后边有耗时的网络操作，手工关闭非常重要 
}

// 预处理

try 
{
    // 连接
    $dbh = new PDO( $dsn , $user, $pass );
    
    $sql = "SELECT * FROM `resume` WHERE `class` = :class ";
    $sth = $dbh->prepare( $sql );

    $sth->execute( [ ":class"=>1 ] );
    $info = $sth->fetchAll();
    print_r( $info ); 
    
    $sth->execute( [ ":class"=>2 ] );
    $info = $sth->fetchAll();
    print_r( $info );  
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
finally
{
    $dbh = null; // 手工关闭连接 如果后边有耗时的网络操作，手工关闭非常重要 
}

// 参数绑定

try 
{
    // 连接
    $dbh = new PDO( $dsn , $user, $pass );
    
    $sql = "SELECT * FROM `resume` WHERE `class` = :class ";
    $sth = $dbh->prepare( $sql );
    $sth->bindValue(':class', 1, PDO::PARAM_INT);
    $sth->execute();
    $info = $sth->fetchAll();
    print_r( $info ); 
    
    $sth->bindValue(':class', 2, PDO::PARAM_INT);
    $sth->execute();
    $info = $sth->fetchAll();
    print_r( $info );  
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
finally
{
    $dbh = null; // 手工关闭连接 如果后边有耗时的网络操作，手工关闭非常重要 
}

// 参数绑定 ？号版本
try 
{
    // 连接
    $dbh = new PDO( $dsn , $user, $pass );
    
    $sql = "SELECT * FROM `resume` WHERE `class` = ? ";
    $sth = $dbh->prepare( $sql );
    $sth->bindValue( 1 , 1, PDO::PARAM_INT);
    $sth->execute();
    $info = $sth->fetchAll();
    print_r( $info ); 
    
    $sth->bindValue( 1 , 2, PDO::PARAM_INT);
    $sth->execute();
    $info = $sth->fetchAll();
    print_r( $info );  
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
finally
{
    $dbh = null; // 手工关闭连接 如果后边有耗时的网络操作，手工关闭非常重要 
}

// bindParam 

try 
{
    // 连接
    $dbh = new PDO( $dsn , $user, $pass );
    
    $sql = "SELECT * FROM `resume` WHERE `class` = ? ";
    $sth = $dbh->prepare( $sql );
    $a = 1;
    $sth->bindParam ( 1 , $a , PDO::PARAM_INT);
    $sth->execute();
    $info = $sth->fetchAll();
    print_r( $info ); 
    
    // $sth->bindValue( 1 , 2, PDO::PARAM_INT);
    $a = 2;
    $sth->execute();
    $info = $sth->fetchAll();
    print_r( $info );  
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
finally
{
    $dbh = null; // 手工关闭连接 如果后边有耗时的网络操作，手工关闭非常重要 
}

// 事务

try 
{
    // 连接
    $dbh = new PDO( $dsn , $user, $pass );

    $dbh->beginTransaction();

    $sql = "UPDATE `resume` SET `title` = '小猪的简历' WHERE `id` = 2 ";

    $sth = $dbh->exec( $sql );

    $sql = "SELECT * FROM `resume` WHERE `id` = ? ";
    $sth = $dbh->prepare( $sql );
    $sth->bindValue ( 1 , 2 , PDO::PARAM_INT);
    $sth->execute();
    $info = $sth->fetchAll();
    print_r( $info ); 

    $dbh->rollBack();

    $sql = "SELECT * FROM `resume` WHERE `id` = ? ";
    $sth = $dbh->prepare( $sql );
    $sth->bindValue ( 1 , 2 , PDO::PARAM_INT);
    $sth->execute();
    $info = $sth->fetchAll();
    print_r( $info );
     
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
finally
{
    $dbh = null; // 手工关闭连接 如果后边有耗时的网络操作，手工关闭非常重要 
}




