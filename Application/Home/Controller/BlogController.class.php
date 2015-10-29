<?php
namespace Home \ Controller;

use Think \ Controller;
class BlogController extends Controller {

    function tozone() {
        $this->display("blog_index");
    }

    function newblog() {
        $this->display("blog_add");
    }
}
?>