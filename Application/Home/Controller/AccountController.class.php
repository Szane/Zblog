<?php
namespace Home \ Controller;

use Think \ Controller;

/**
 * 账户登录、注册、权限控制
 */
class AccountController extends Controller {
    public function dosignin() {
        $Account = M('Account');
        $con1['username'] = I('post.username');
        $con1['password'] = I('post.userpwd');
        if (!(empty ($con1['username']) || empty ($con1['password']))) {
            $result = $Account->where($con1)->select();
            if (empty ($result)) {
                $this->ajaxReturn('authorize_fail'); // 登录失败
            } else {
                if (I('post.rememberme') == 'true') {
                    cookie('signin_user', $Account->getField('id'), 'expire=604800&prefix=zblog_'); //保持登录状态一周
                    $cur_ip = get_client_ip();
                    $mask_cur_ip = md5($cur_ip);
                    cookie('signin_ip', $mask_cur_ip, 'expire=604800&prefix=zblog_'); //记录当前ip的md5
                }
                session('zblog_current_user_id', $Account->getField('id'));
                $Role = M("Role");
                $con2['id'] = $Account->getField('role_id');
                $Role->where($cond2)->select();
                session('current_user_role', $Role->getField('role_name')); // 权限角色名
                $pre_url = session('pre_url');
                if (empty ($pre_url)) {
                    $this->ajaxReturn('authorize_success');
                } else {
                    session('pre_url', null);
                    $this->ajaxReturn($pre_url);
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
        cookie(null, 'zblog_');
        $this->redirect('Index/index');
    }
}
?>