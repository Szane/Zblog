<?php
namespace Home \ Controller;
use Think \ Controller;
use Home \ Common \ Util \ CookieSessionUtil;
class IndexController extends Controller {
    function index() {
        $Check = new \ Home \ Common \ Util \ CookieSessionUtil();
        if ($Check->checkIn()) {
            $this->display('index_in');
        } else {
            $this->display('index');
        }

    }
    function signin() {
        $this->display('index_signin');
    }
    public function showphpinfo() {
        echo phpinfo();
    }
}
?>