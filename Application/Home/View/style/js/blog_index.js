$(document).ready(function() {
    $(".btn-delete").click(function() {
        $.confirm({
            content : '确认删除？',
            confirmButtonClass : 'btn-danger',
            cancelButtonClass : 'btn-default',
            confirmButton : 'Y',
            cancelButton : 'N',
            backgroundDismiss : true,
            confirm : function() {
                var bid = this.id;
                $.post("/index.php/Home/Blog/deleteblog", {
                    id : bid
                }, function(data, status) {
                    if (data == "delete_success") {
                        $.alert({
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
