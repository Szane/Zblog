<?php
namespace Home \ Controller;
use Think \ Controller;
class IndexController extends Controller {
    function index() {
        $cur_user_id = session('current_user_id');
        if (empty ($cur_user_id)) {
            $this->display('index');
        } else {
            $this->display('index_in');
        }

    }
    public function showphpinfo() {
        echo phpinfo();
    }
}
?>