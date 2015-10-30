$(document).ready(function() {
    $("#signup-button").click(function() {
        location.href = '/index.php/Home/Account/signup';
    });
    $("#add-blog").click(function() {
        location.href = "/index.php/Home/Blog/newblog";
    });
    $("#zone-index").click(function() {
        $.get("/index.php/Home/Blog/tozone", function(data, status) {
            if (data == "unauthorized") {
                $("#signinModal").modal();
            } else {
                location.href = "/index.php/Home/Blog/zone";
            }
        });
    });
    $("#signin-submit").click(function() {
        if ($("#text-username").val() == '') {
            alert("请输入用户名！");
            return;
        }
        if ($("#text-userpwd").val() == '') {
            alert("请输入密码！");
            return;
        }
        $.post("/index.php/Home/Account/dosignin", {
            username : $("#text-username").val(),
            userpwd : $("#text-userpwd").val()
        }, function(data, status) {
            if (data == "authorize_fail") {
                alert("用户名或密码不正确！");
            } else if (data == "authorize_success") {
                location.href = "/index.php/Home/Index/index";
            }
        });
    });
});