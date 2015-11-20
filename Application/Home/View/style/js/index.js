$(document).ready(function() {
    $("#signup-button").click(function() {
        location.href = '/index.php/Home/Account/signup';
    });
    $("#add-blog").click(function() {
        location.href = "/index.php/Home/Blog/newblog";
    });
    $("#signin-submit").click(function() {
        if ($("#text-username").val() == '') {
            $.alert({
                content : '请输入用户名！',
                autoClose : 'confirm|3000',
                confirm : function() {
                    return;
                }
            });
        }
        if ($("#text-userpwd").val() == '') {
            $.alert({
                content : '请输入密码！',
                autoClose : 'confirm|3000',
                confirm : function() {
                    return;
                }
            });
        }
        $.post("/index.php/Home/Account/dosignin", {
            username : $("#text-username").val(),
            userpwd : $("#text-userpwd").val(),
            rememberme : $("#cb-remember").val()
        }, function(data, status) {
            if (data == "authorize_fail") {
                $.alert({
                    content : '用户名或密码不正确！',
                    autoClose : 'confirm|3000',
                    confirm : function() {
                        return;
                    }
                });
            } else if (data == "authorize_success") {
                $("#signinModal").modal('hide');
            }
        });
    });
    $("#signin-submit-auto").click(function() {
        if ($("#text-username-auto").val() == '') {
            $.alert({
                content : '请输入用户名！',
                autoClose : 'confirm|3000',
                confirm : function() {
                    return;
                }
            });
        }
        if ($("#text-userpwd-auto").val() == '') {
            $.alert({
                content : '请输入密码！',
                autoClose : 'confirm|3000',
                confirm : function() {
                    return;
                }
            });
        }
        $.post("/index.php/Home/Account/dosignin", {
            username : $("#text-username-auto").val(),
            userpwd : $("#text-userpwd-auto").val(),
            rememberme : $("#cb-remember-auto").prop("checked")
        }, function(data, status) {
            if (data == "authorize_fail") {
                $.alert({
                    content : '用户名或密码不正确！',
                    autoClose : 'confirm|3000',
                    confirm : function() {
                        return;
                    }
                });
            } else {
                if (data == "authorize_success")
                    location.reload();
                else
                    location.href = data;
            }
        });
    });
});
jconfirm.defaults = {
    title : '提示',
    content : '',
    contentLoaded : function() {
    },
    icon : '',
    confirmButton : 'Okay',
    cancelButton : 'Cancel',
    confirmButtonClass : 'btn-default',
    cancelButtonClass : 'btn-default',
    theme : 'white',
    animation : 'zoom',
    closeAnimation : 'scale',
    animationSpeed : 400,
    animationBounce : 1.2,
    keyboardEnabled : false,
    rtl : false,
    // confirmKeys : [ 13, 32 ], // ENTER or SPACE key
    cancelKeys : [ 27 ], // ESC key
    container : 'body',
    confirm : function() {
    },
    cancel : function() {
    },
    backgroundDismiss : false,
    autoClose : false,
    closeIcon : null,
    columnClass : 'col-md-4 col-md-offset-4',
    onOpen : function() {
    },
    onClose : function() {
    },
    onAction : function() {
    }
};