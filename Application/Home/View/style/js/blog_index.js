$(document).ready(function() {
    $(".btn-edit").click(function() {
        location.href = "/index.php/Home/Blog/editblog/id/" + this.name;
    });
    $(".btn-delete").click(function() {
        $.confirm({
            content : '确认删除？',
            confirmButtonClass : 'btn-danger',
            cancelButtonClass : 'btn-default',
            confirmButton : 'Y',
            cancelButton : 'N',
            backgroundDismiss : true,
            confirm : function() {
                var bid = this.name;
                $.post("/index.php/Home/Blog/deleteblog", {
                    id : bid
                }, function(data, status) {
                    if (data == "delete_success") {
                        $.alert({
                            title : '提示',
                            content : '删除成功！',
                            autoClose : 'confirm|3000',
                            confirm : function() {
                                location.reload();
                            }
                        });
                    }
                });
            }
        });
    });
});