<?php
namespace Home \ Controller;
use Think \ Controller;

class AccountController extends Controller {
    public function index() {
        $this->display();
    }
    public function signin() {
        echo phpinfo();

    }
    public function signup() {
        $this->display('signup');
    }
    public function dosignup() {
        $Guid = new \ Home \ Common \ Util \ Guid();
        $Account = M('Account');
        $data['id'] = $Guid->getGuid();
        $data['username'] = $_POST['text'];
        $data['password'] = $_POST['pwd'];
        $Account->add($data);
    }
}
?>