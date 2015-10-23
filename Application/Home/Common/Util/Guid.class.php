<?php
namespace Home \ Common \ Util;
class System {
    function currentTimeMillis() {
        list ($usec, $sec) = explode(" ", microtime());
        return $sec . substr($usec, 2, 3);
    }
}
class NetAddress {
    var $Name = 'localhost';
    var $IP = '127.0.0.1';
    function getLocalHost() // static    
    {
        $this->Name = $_ENV["COMPUTERNAME"];
        $this->IP = $_SERVER["SERVER_ADDR"];
        return strtolower($this->Name . '/' . $this->IP);
    }
}
class Random {
    function nextLong() {
        $tmp = rand(0, 1) ? '-' : '';
        return $tmp . rand(1000, 9999) . rand(1000, 9999) . rand(1000, 9999) . rand(100, 999) . rand(100, 999);
    }
}
// 三段    
// 一段是微秒 一段是地址 一段是随机数    
class Guid {
    var $valueBeforeMD5;
    var $valueAfterMD5;
    function getGuid() {
        $address = NetAddress :: getLocalHost();
        $this->valueBeforeMD5 = $address . ':' . System :: currentTimeMillis() . ':' . Random :: nextLong();
        $this->valueAfterMD5 = md5($this->valueBeforeMD5);
        return strtolower($this->valueAfterMD5);
    }
}
?>