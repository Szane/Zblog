$(document).ready(function() {
    $("#publish-button").click(function() {
        $.post("/index.php/Home/Blog/addblog", {
            title : $("#blog_title").val(),
            content : $("#editor").html()
        }, function(data, status) {
            if (data == "to_authorize")
                $("#signinModal").modal();
            else
                location.href = data;
        });
    });
});