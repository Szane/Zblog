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
                $("#signinModal").modal({});
            } else {
                location.href = "/index.php/Home/Blog/zone";
            }
        });
    });
});