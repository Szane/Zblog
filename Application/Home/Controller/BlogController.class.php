<?php
namespace Home \ Controller;

use Think \ Controller;
class BlogController extends Controller {

    function tozone() {
        $cur_user_id = session('current_user_id');
        if (empty ($cur_user_id)) {
            $this->ajaxReturn('unauthorized');
        } else {
            $this->ajaxReturn($cur_user_id);
        }
    }
    function zone() {
        $this->display('blog_index');
    }

    function newblog() {
        $this->display("blog_add");
    }
    function insertblog() {
        $Guid = new \ Home \ Common \ Util \ Guid();
        $Article = M('Article');
        $data['id'] = $Guid->getGuid();
    }
}
?>