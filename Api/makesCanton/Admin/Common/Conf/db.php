<?php
/**
 * User: Administrator
 * Date: 2016/11/1 0001
 * Time: 下午 5:09
 */

if($_SERVER['HTTP_HOST'] == '192.168.1.76'){
   return [
    //'配置项'=>'配置值'
    'DB_TYPE'               =>  'mysql',       // 数据库类型
    'DB_HOST'               =>  '192.168.1.233',   // 服务器地址
    'DB_NAME'               =>  'makescanton', // 数据库名
    'DB_USER'               =>  'root',        // 用户名
    'DB_PWD'                =>  'root',        // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tbl_',        // 数据库表前缀
]; 
}else if($_SERVER['HTTP_HOST'] == '192.168.1.233'){
    return [
    //'配置项'=>'配置值'
    'DB_TYPE'               =>  'mysql',       // 数据库类型
    'DB_HOST'               =>  '192.168.1.233',   // 服务器地址
    'DB_NAME'               =>  'makescanton', // 数据库名
    'DB_USER'               =>  'root',        // 用户名
    'DB_PWD'                =>  'root',        // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tbl_',        // 数据库表前缀
];
}else{
    return [
    //'配置项'=>'配置值'
    'DB_TYPE'               =>  'mysql',       // 数据库类型
    'DB_HOST'               =>  'localhost',   // 服务器地址
    'DB_NAME'               =>  'makescanton', // 数据库名
    'DB_USER'               =>  'root',        // 用户名
    'DB_PWD'                =>  'root',        // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'tbl_',        // 数据库表前缀
];
}
