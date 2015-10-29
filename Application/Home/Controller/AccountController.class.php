<?php
namespace Home \ Controller;

use Think \ Controller;

class AccountController extends Controller {
    public function dosignin() {
        $Account = M("Account");
        $con1['username'] = $_GET['username'];
        $con1['password'] = $_GET['userpwd'];
        $Account->where($con1)->select();
        if ($Account == null) {
            $this->display('signin');
            return;
        } else {
            session('current_user_id', $Account->getField('id'));
            $Role = M("Role");
            $con2['id'] = $Account->getField('role_id');
            $Role->where($cond2)->select();
            session('current_user_role', $Role->getField('role_name'));
            $this->redirect('Index/index');
        }
    }
    public function signup() {
        $this->display('signup');
    }
    public function dosignup() {

    }
    public function signout() {
        session(null);
        $this->redirect('Index/index');
    }
}
?>