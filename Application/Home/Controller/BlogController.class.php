<?php
namespace Home \ Controller;

use Think \ Controller;
use Home \ Common \ Util \ Guid;

class BlogController extends Controller {
    function tozone() {
        $cur_user_id = session('current_user_id');
        if (empty ($cur_user_id)) {
            session('pre_url', '/index.php/Home/Blog/tozone');
            $this->redirect('Index/signin');
        } else {
            $blog = $this->getZoneBlogList($cur_user_id);
            $AccountData = M('account_data');
            $condition['deleted_flag'] = 0;
            $condition['account_id'] = $cur_user_id;
            $author = $AccountData->where($condition)->select();
            for ($i = 0; $i < count($blog); $i++) {
                $art['blog_id'] = $blog[$i]['id'];
                $art['title'] = $blog[$i]['title'];
                $art['author'] = $author[0]['personal_name'];
                $artslist[$i] = $art;
            }
            $this->assign('artslist', $artslist);
            $this->display('blog_index');
        }
    }
    function newblog() {
        // $cur_user_id = session('current_user_id');
        // if (empty ($cur_user_id)) {
        // $this->ajaxReturn('unauthorized');
        // } else {
        // $this->ajaxReturn($cur_user_id);
        // }
        $this->display('blog_add');
    }
    function save() {
        try {
            $cur_user_id = session('current_user_id');
            if (empty ($cur_user_id)) {
                $this->ajaxReturn("to_authorize");
            } else {
                $Guid = new Guid();
                dump($Guid);
                exit ();
                $Article = M('Article');
                $data['id'] = $Guid->getGuid();
                $data['author_id'] = $cur_user_id;
                $data['title'] = I('post.title');
                $data['content'] = I('post.content');
                $data['created_time'] = date('Ymd H:i:s');
                $data['updated_time'] = date('Ymd H:i:s');
                $data['deleted_flag'] = 0;
                // $data['privacy'] = I('post.blog_privacy');
                $Article->add($data);

                $this->ajaxReturn("/index.php/Home/Blog/read/id/" . $data['id']);
            }
        } catch (Exception $e) {
            $this->ajaxReturn("publish_fail");
        }
    }

    private function getZoneBlogList($user_id) {
        $Article = M('Article');
        $condition['deleted_flag'] = 0;
        $condition['author_id'] = $user_id;
        $result = $Article->where($condition)->select();
        return $result;
    }
    function read($id) {
        $cur_user_id = session('current_user_id');
        if (empty ($cur_user_id)) {
            session('pre_url', '/index.php/Home/Blog/read/id/' . $id);
            $this->redirect('Index/signin');
        } else {
            $Article = M('Article');
            $condition['id'] = $id;
            $result = $Article->where($condition)->select();
            $blog['title'] = $result[0]['title'];
            $blog['content'] = $result[0]['content'];
            $this->assign('blog', $blog);
            $this->display('blog_view');
        }
    }
}
?>