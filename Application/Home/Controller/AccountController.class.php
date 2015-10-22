<?php
namespace Home \ Controller;
use Think \ Controller;
class AccountController extends Controller {
    public function index() {
        $this->display();
    }
    public function signin() {
        $username = $_POST['text'];
        $userpwd = $_POST['pwd'];
        echo $username;
        echo $userpwd;
    }
    public function singup() {

    }
}
?>