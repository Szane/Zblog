$(document).ready(function() {
    $("#signin-button").click(function() {
        location.href = '/index.php/Home/Account/signin';
    });
    $("#signup-button").click(function() {
        location.href = '/index.php/Home/Account/signup';
    });
    $("#add-blog").click(function() {
        location.href = "/index.php/Home/Blog/newblog";
    });
});