<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>Zblog</title>
<link href="/Application/Home/View/style/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
<script src="/Application/Home/View/style/jquery/jquery-1.11.3.min.js"></script>
<script src="/Application/Home/View/style/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/Application/Home/View/style/js/index.js"></script>
</head>



<body>
    <div class="container"><div class="container">
    <nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">Zblog</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="/index.php">Home</a></li>
            <li><a id="zone-index" href="#">Zone</a></li>
            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> Option <b class="caret"></b>
            </a>
                <ul class="dropdown-menu">
                    <li><a href="#">介绍</a></li>
                    <li class="divider"></li>
                    <li><a href="#">其他</a></li>
                </ul></li>
        </ul>
    </div>
    <div class="navbar-form navbar-right btn-group btn-group-sm">
        <button id="signin-button" class="btn btn-default" data-toggle="modal" data-target="#signinModal">Sign In</button>
        <button id="signup-button" type="button" class="btn btn-default">Sign Up</button>
    </div>
</nav>
<div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalLabel" aria-hidden="true">
    <form class="form-horizontal" role="form" action="/index.php/Home/Account/dosignin">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="signinModalLabel">
                        <b>登&nbsp;&nbsp;录</b>
                    </h4>
                </div>
                <div class="container col-sm-12">
                    <br>
                    <div class="form-group col-sm-12">
                        <input name="username" type="text" class="form-control" placeholder="请输入用户名/邮箱">
                    </div>
                    <div class="form-group col-sm-12">
                        <input name="userpwd" type="password" class="form-control" placeholder="请输入密码">
                    </div>
                    <div class="form-group col-sm-12">
                        <div class="checkbox">
                            <label> <input type="checkbox"> 请记住我
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group col-sm-12">
                        <button type="submit" class="btn btn-default">登录</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>









    <div class="row">
        <div class="container  col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">面板标题</div>
                <div class="panel-body">
                    <p>这是一个基本的面板内容。这是一个基本的面板内容。 这是一个基本的面板内容。这是一个基本的面板内容。 这是一个基本的面板内容。这是一个基本的面板内容。 这是一个基本的面板内容。这是一个基本的面板内容。</p>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">免费域名注册</li>
                    <li class="list-group-item">免费 Window 空间托管</li>
                    <li class="list-group-item">图像的数量</li>
                    <li class="list-group-item">24*7 支持</li>
                    <li class="list-group-item">每年更新成本</li>
                </ul>
            </div>
        </div>
        <div class="container  col-md-6">
            <div class="panel panel-default ">
                <div class="panel-heading">面板标题</div>
                <div class="panel-body">
                    <p>这是一个基本的面板内容。这是一个基本的面板内容。 这是一个基本的面板内容。这是一个基本的面板内容。 这是一个基本的面板内容。这是一个基本的面板内容。 这是一个基本的面板内容。这是一个基本的面板内容。</p>
                </div>
                <ul class="list-group">
                    <li class="list-group-item">免费域名注册</li>
                    <li class="list-group-item">免费 Window 空间托管</li>
                    <li class="list-group-item">图像的数量</li>
                    <li class="list-group-item">24*7 支持</li>
                    <li class="list-group-item">每年更新成本</li>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>