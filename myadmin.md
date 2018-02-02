# PHPMyAdmin 使用指南

## 下载和安装

- 下载地址：https://www.phpmyadmin.net/downloads/
- 安装：解压，放置到 Web 目录
- 配置：修改 config.sample.inc.php ， 修改 host 和 随机数因子

## 使用

### 登入

使用 docker-compose 中配置的 Root 密码登入 itworks1343

### 创建数据库

- 选择 charset ： UTF8mb4-unicode-ci 、UTF8mb4-general-ci
- 所有的操作其实都是通过生成 SQL 语句来执行，如果你记不住 SQL 命令，在 phpMyAdmin 里边操作完，把生成的 SQL 复制下来就能用。

### 创建数据表

- 选择存储引擎：MyISAM 是 MySQL 早期的存储引擎，功能较少，快，采用表级锁；InnoDB 是更为成熟和常用的存储引擎，支持行级锁和事务。

以我们的在线简历系统为例，设计数据表。

- 首先是分清楚实体和关系，实体设计成表、关系尽量设计成关联字段。
- 在我们的例子的，用户和简历两个是实体、一个用户有多份简历，一份简历只有一个主人。所以这是一个一对多关系。通过在简历表中加上 user id 即可。
- 如果有多对多呢？多对多关系需要建立单独的表来描述关系。添加一个 tag 表作为示范。

### 字段

- 类型
- null 是否可以为空；以及默认值
- 主键（ 采用自增 id 作为主键 ）
- 自增
- 索引/唯一/全文检索（中文存在的各种问题）

- 补充字段：用户表添加 password；简历表添加修改/发布时间。

### 对数据的常见操作

#### 増

- insert into
- replace into
- insert ignore
- insert into ON DUPLICATE KEY UPDATE

#### 查

##### where 查询

- and 和 or 的条件查询
- 逻辑运算、比较运算、函数运算（ 字符连接、日期函数、数学函数 ）
- like 查询（  % 和 _ ）

##### 唯一查询 

- distinct // 班级唯一
- group by // 班级id

##### 子查询

- in // 所有男生的简历

##### 联表查询

- join // FROM resume a INNER JOIN user b ON a.user_id = b.id;
- left join // 以左表展开，即使右表没有数据，也会返回一条记录。
- 从 join 转向二次查询，提升性能

- union 

SELECT country FROM Websites
UNION
SELECT country FROM apps
ORDER BY country;


UNION 只会选取不同的值。请使用 UNION ALL 来选取重复的值！

Union 在分库分表时很常用。

##### 分库分表

- 大字段分离,修表修起来特别慢
- hash分库分表

##### 查询优化

- explain

#### 删

- DELETE from where 
- 标记删除

#### 改

- update
- 表锁定和行锁定
- 读写分离
- 事务

