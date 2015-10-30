$(document).ready(function() {
    var table = $("<table border=\"1\">");
    table.appendTo($("#blogtable"));
    for ( var i = 0; i < rowCount; i++) {
        var tr = $("<tr></tr>");
        tr.appendTo(table);
        for ( var j = 0; j < cellCount; j++) {
            var td = $("<td>" + i * j + "</td>");
            td.appendTo(tr);
        }
    }
    trend.appendTo(table);
    $("#blogtable").append("</table>");
});