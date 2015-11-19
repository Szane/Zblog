<?php
return array (
    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'qdm190467413.my3w.com',
    'DB_USER' => 'qdm190467413',
    'DB_PWD' => 'story261026',
    'DB_NAME' => 'qdm190467413_db',
    'DB_PREFIX' => 'ZBLOG_',
    'DB_PORT' => 3306,
    'DB_CHARSET' => 'utf8', // 字符集
    'DB_DEBUG' => TRUE, // 数据库调试模式 开启后可以记录SQL日志 3.2.3新增
    'LAYOUT_ON' => true,
    'LAYOUT_NAME' => 'Layout/mainlayout',
    'SESSION_OPTIONS' => array (
        'name' => 'session_id',
        'expire' => 600
    ),
    'SHOW_PAGE_TRACE' => true,
    'LOG_RECORD' => true, // 开启日志记录
    'URL_PARAMS_BIND' => true //开启变量绑定

    
);
?>