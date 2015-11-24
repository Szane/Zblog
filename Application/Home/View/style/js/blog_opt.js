$(document).ready(function() {
    // 预览
    $("#preview-button").click(function() {
        $("#pre-title").empty();
        $("#pre-content").empty();
        $("#pre-title").append($("#blog_title").val());
        var precontent = $("#editor").html();
        precontent = precontent.replace(/&lt;/g, "<");
        precontent = precontent.replace(/&gt;/g, ">");
        precontent = precontent.replace(/&amp;lt;/g, "<");
        precontent = precontent.replace(/&amp;gt;/g, ">");
        precontent = precontent.replace(/\\/g, " ");
        precontent = precontent.replace(/&quot;/g, "\"");
        precontent = precontent.replace(/&nbsp;/g, " ");
        precontent = precontent.replace(/&amp;nbsp;/g, " ");
        precontent = precontent.replace(/&amp;amp;/g, "& ");
        $("#pre-content").html(precontent);
        $("#previewModal").modal();
    });
    // 发布
    $("#publish-button").click(function() {
        $.post("/index.php/Home/Blog/updateblog", {
            blog_id : $("#blog_id").val(),
            title : $("#blog_title").val(),
            content : $("#editor").html()
        }, function(data, status) {
            if (data == "to_authorize")
                $("#signinModal").modal();
            else
                location.href = data;
        });
    });
    // 保存为草稿
    $("#savedraft-button").click(function() {

    });
    // 取消
    $("#cancelblog-button").click(function() {

    });
});