<?php
namespace Home \ Controller;

use Think \ Controller;
use Home \ Common \ Util \ Guid;
use Home \ Common \ Util \ CookieSessionUtil;

class BlogController extends Controller {
    function tozone($page = 1) {
        $Check = new \ Home \ Common \ Util \ CookieSessionUtil();
        if ($Check->checkIn()) {
            $cur_user_id = session('zblog_current_user_id');
            $step = 6;
            $Article = M('Article');
            $condition['author_id'] = $cur_user_id;
            $condition['deleted_flag'] = 0;
            $sumCount = $Article->where($condition)->count();
            $totalPage = ceil($sumCount / $step);
            if ($totalPage == 0)
                $page = 1;
            else {
                if (empty ($page) || $page < 1)
                    $page = 1;
                if ($page > $totalPage)
                    $page = $totalPage;
            }
            $start = $step * ($page -1);
            $blog = $this->getZoneBlogList($cur_user_id, $start, $step);
            $AccountData = M('account_data');
            $condition['account_id'] = $cur_user_id;
            for ($i = 0; $i < count($blog); $i++) {
                $art['blog_id'] = $blog[$i]['id'];
                $art['title'] = $blog[$i]['title'];
                $art['created_time'] = $blog[$i]['created_time'];
                $artslist[$i] = $art;
            }
            $this->assign('totalPage', $totalPage);
            $this->assign('page', $page);
            $this->assign('artslist', $artslist);
            $this->display('blog_index');
        } else {
            session('pre_url', '/index.php/Home/Blog/tozone');
            $this->redirect('Index/signin');
        }
    }
    function newblog() {
        $Check = new \ Home \ Common \ Util \ CookieSessionUtil();
        if ($Check->checkIn()) {
            $this->display('blog_opt');
        } else {
            session('pre_url', '/index.php/Home/Blog/newblog');
            $this->redirect('Index/signin');
        }
    }
    function updateblog() {
        $Check = new \ Home \ Common \ Util \ CookieSessionUtil();
        if ($Check->checkIn()) {
            $cur_user_id = session('zblog_current_user_id');
            $Guid = new \ Home \ Common \ Util \ Guid();
            $Article = M('Article');
            $blogId = I('post.blog_id');

            $data['title'] = I('post.title');
            $data['content'] = I('post.content');
            $data['author_id'] = $cur_user_id;
            $data['created_time'] = date('y-m-d H:i:s', time());
            $data['updated_time'] = date('y-m-d H:i:s', time());
            $data['deleted_flag'] = 0;
            if (empty ($blogId)) {
                $data['id'] = $Guid->getGuid();
                $Article->add($data);
            } else {
                $data['id'] = $blogId;
                $Article->save($data);
            }

            $this->ajaxReturn('/index.php/Home/Blog/read/id/' . $data['id']);
        } else {
            $this->ajaxReturn('to_authorize');
        }
    }
    function savedraft() {
        $Check = new \ Home \ Common \ Util \ CookieSessionUtil();
        if ($Check->checkIn()) {
            $cur_user_id = session('zblog_current_user_id');
            $Guid = new \ Home \ Common \ Util \ Guid();
            $Article = M('Article');

        } else {
            $this->ajaxReturn('to_authorize');
        }

    }
    private function getZoneBlogList($user_id, $start, $step) {
        $Article = M('Article');
        $condition['deleted_flag'] = 0;
        $condition['author_id'] = $user_id;
        $result = $Article->where($condition)->order('created_time desc')->limit($start, $step)->select();
        return $result;
    }
    function read($id) {
        $Check = new \ Home \ Common \ Util \ CookieSessionUtil();
        if ($Check->checkIn()) {
            $Article = M('Article');
            $condition['id'] = $id;
            $condition['deleted_flag'] = 0;
            $result = $Article->where($condition)->select();
            if (empty ($result)) {
                $this->redirect('Blog/tozone');
            } else {
                $blog['id'] = $result[0]['id'];
                $blog['title'] = $result[0]['title'];
                $blog['content'] = $result[0]['content'];
                $blog['created_time'] = $result[0]['created_time'];
                $this->assign('blog', $blog);
                $this->display('blog_view');
            }
        } else {
            session('pre_url', '/index.php/Home/Blog/read/id/' . $id);
            $this->redirect('Index/signin');
        }
    }
    function deleteblog() {
        $Check = new \ Home \ Common \ Util \ CookieSessionUtil();
        if ($Check->checkIn()) {
            $Article = M('Article');
            $condition['id'] = I('post.id');
            $data['deleted_flag'] = 1;
            $Article->where($condition)->data($data)->save();
            $this->ajaxReturn("delete_success");
        } else {
            session('pre_url', '/index.php/Home/Blog/read/id/' . $condition['id']);
            $this->redirect('Index/signin');
        }
    }
    function editblog($id) {
        $Check = new \ Home \ Common \ Util \ CookieSessionUtil();
        if ($Check->checkIn()) {
            $Article = M('Article');
            $condition['id'] = $id;
            $result = $Article->where($condition)->select();
            if (empty ($result)) {
                $this->redirect('Blog/tozone');
            } else {
                $blog['id'] = $result[0]['id'];
                $blog['title'] = $result[0]['title'];
                $blog['content'] = $result[0]['content'];
                $this->assign('blog', $blog);
                $this->display('blog_opt');
            }
        } else {
            session('pre_url', '/index.php/Home/Blog/editblog/id/' . $id);
            $this->redirect('Index/signin');
        }
    }

}
?>