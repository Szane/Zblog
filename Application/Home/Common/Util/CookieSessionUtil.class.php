<?php
namespace Home \ Common \ Util;
class CookieSessionUtil {
    function checkIn() {
        $cur_user_id = session('zblog_current_user_id');
        if (empty ($cur_user_id)) {
            $pre_user_ip = cookie('zblog_signin_ip');
            $ip = get_client_ip();
            if (empty ($pre_user_ip)) {
                return false;
            } else {
                if ($pre_user_ip != md5($ip)) { //登录地改变，重新登录
                    return false;
                } else {
                    session('zblog_current_user_id', cookie('zblog_signin_user'));
                    return true;
                }
            }
        } else {
            return true;
        }
        return false;
    }
}
?>