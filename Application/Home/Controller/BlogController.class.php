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
            $totalPage = floor($sumCount / $step);
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
            $author = $AccountData->where($condition)->select();
            for ($i = 0; $i < count($blog); $i++) {
                $art['blog_id'] = $blog[$i]['id'];
                $art['title'] = $blog[$i]['title'];
                $art['author'] = $author[0]['personal_name'];
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
            $this->display('blog_add');
        } else {
            session('pre_url', '/index.php/Home/Blog/newblog');
            $this->redirect('Index/signin');
        }
    }
    function addblog() {
        $Check = new \ Home \ Common \ Util \ CookieSessionUtil();
        if ($Check->checkIn()) {
            $cur_user_id = session('zblog_current_user_id');
            $Guid = new \ Home \ Common \ Util \ Guid();
            $Article = M('Article');
            $data['id'] = $Guid->getGuid();
            $data['title'] = I('post.title');
            $data['content'] = I('post.content');
            $data['author_id'] = $cur_user_id;
            $data['created_time'] = date('y-m-d h:i:s', time());
            $data['updated_time'] = date('y-m-d h:i:s', time());
            $data['deleted_flag'] = 0;
            $Article->add($data);
            $this->ajaxReturn('/index.php/Home/Blog/read/id/' . $data['id']);
        } else {
            $this->ajaxReturn('to_authorize');
        }
    }

    private function getZoneBlogList($user_id, $start, $step) {
        $Article = M('Article');
        $condition['deleted_flag'] = 0;
        $condition['author_id'] = $user_id;
        $result = $Article->where($condition)->order('created_time desc,id desc')->limit($start, $step)->select();
        return $result;
    }
    function read($id) {
        $Check = new \ Home \ Common \ Util \ CookieSessionUtil();
        if ($Check->checkIn()) {
            $Article = M('Article');
            $condition['id'] = $id;
            $result = $Article->where($condition)->select();
            $blog['title'] = $result[0]['title'];
            $blog['content'] = $result[0]['content'];
            $this->assign('blog', $blog);
            $this->display('blog_view');
        } else {
            session('pre_url', '/index.php/Home/Blog/read/id/' . $id);
            $this->redirect('Index/signin');
        }
    }
}
?>