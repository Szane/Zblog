<?php
namespace Home \ Controller;

use Think \ Controller;
class BlogController extends Controller {

    function tozone() {
        $cur_user_id = session('current_user_id');
        if (empty ($cur_user_id)) {
            session('pre_url', '/index.php/Home/Blog/tozone');
            $this->ajaxReturn('unauthorized');
        } else {
            $this->ajaxReturn($cur_user_id);
        }
    }

    function zone() {
        $this->display('blog_index');
    }

    function newblog() {
        //        $cur_user_id = session('current_user_id');
        //        if (empty ($cur_user_id)) {
        //            $this->ajaxReturn('unauthorized');
        //        } else {
        //            $this->ajaxReturn($cur_user_id);
        //        }
        $this->display('blog_add');
    }
    function saveblog() {
        try {
            if (empty ($cur_user_id)) {
                $this->ajaxReturn("to_authorize");
            } else {
                $Guid = new \ Home \ Common \ Util \ Guid();
                $Article = M('Article');
                $data['id'] = $Guid->getGuid();
                $cur_user_id = session('current_user_id');
                $data['author_id'] = session('current_user_id');
                $data['title'] = I('post.blog_title');
                $data['content'] = I('post.blog_content');
                $data['create_time'] = date('Ymd H:i:s');
                $data['update_time'] = date('Ymd H:i:s');
                $data['deleted_flag'] = 0;
                //            $data['privacy'] = I('post.blog_privacy');
                $Article->add($data);
                $this->ajaxReturn("publish_success");
            }

        } catch (Exception $e) {
            $this->ajaxReturn("publish_fail");
        }
    }

    function insertblog() {

    }

}
?>