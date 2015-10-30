<?php
namespace Home \ Controller;

use Think \ Controller;
/**
 * 账户登录、注册、权限控制
 */
class AccountController extends Controller {
    public function dosignin() {
        $Account = M("Account");
        $con1['username'] = I('post.username');
        $con1['password'] = I('post.userpwd');
        if (!(empty ($con1['username']) || empty ($con1['password']))) {
            $result = $Account->where($con1)->select();
            if (empty ($result)) {
                $this->ajaxReturn('authorize_fail'); //登录失败
            } else {
                session('current_user_id', $Account->getField('id'));
                $Role = M("Role");
                $con2['id'] = $Account->getField('role_id');
                $Role->where($cond2)->select();
                session('current_user_role', $Role->getField('role_name'));
                if (empty (session('pre_url'))) {
                    $this->ajaxReturn('authorize_success');
                } else {
                    $this->ajaxReturn(session('pre_url'));
                }
            }
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