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
        $Account = M('Account');
        $data['id'] = uniqid();
        $data['username'] = $_POST['text'];
        $data['userpwd'] = $_POST['pwd'];
        $Account->create($data);
    }
}
?>