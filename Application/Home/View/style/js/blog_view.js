$(document).ready(function() {
    var content = $("div#blog-hidden").html();
    content = content.replace(/&lt;/g, "<");
    content = content.replace(/&gt;/g, ">");
    content = content.replace(/&amp;lt;/g, "<");
    content = content.replace(/&amp;gt;/g, ">");
    content = content.replace(/\\/g, " ");
    alert(content)
    $(content).prependTo("#blog-content");
});