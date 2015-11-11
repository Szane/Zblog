$(document).ready(function() {
    $("#signup-button").click(function() {
        location.href = '/index.php/Home/Account/signup';
    });
    $("#add-blog").click(function() {
        location.href = "/index.php/Home/Blog/newblog";
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
                $("#signinModal").modal('hide');
            }
        });
    });
    $("#signin-submit-jump").click(function() {
        if ($("#text-username-jump").val() == '') {
            alert("请输入用户名！");
            return;
        }
        if ($("#text-userpwd-jump").val() == '') {
            alert("请输入密码！");
            return;
        }
        $.post("/index.php/Home/Account/dosignin", {
            username : $("#text-username-jump").val(),
            userpwd : $("#text-userpwd-jump").val()
        }, function(data, status) {
            if (data == "authorize_fail") {
                alert("用户名或密码不正确！");
            } else {
                if (data == "authorize_success")
                    location.reload();
                else
                    location.href = data;
            }
        });
    });
    $("#signin-submit-auto").click(function() {
        if ($("#text-username-auto").val() == '') {
            alert("请输入用户名！");
            return;
        }
        if ($("#text-userpwd-auto").val() == '') {
            alert("请输入密码！");
            return;
        }
        $.post("/index.php/Home/Account/dosignin", {
            username : $("#text-username-auto").val(),
            userpwd : $("#text-userpwd-auto").val()
        }, function(data, status) {
            if (data == "authorize_fail") {
                alert("用户名或密码不正确！");
            } else {
                if (data == "authorize_success")
                    location.reload();
                else
                    location.href = data;
            }
        });
    });
});