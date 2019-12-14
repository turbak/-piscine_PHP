let ft_list;
$(function () {
    ft_list = $("#ft_list");
    $("#new").click(newtodo);
    $("#ft_list div").click(deltodo);
    loadcsv();
});

function newtodo() {
    let str = prompt("Your task : ");
    if (str !== '')
    {
        $.ajax({
                method: "get",
                url: "insert.php?msg=" + str
            }).done(loadcsv);
    }
}

function deltodo() {
    if (confirm("Are you sure you want do delete this element?"))
    {
        $.ajax({
            method: "get",
            url: "delete.php?id=" + $(this).attr("id")
        }).done(loadcsv);
    }
}

function loadcsv() {
    ft_list.empty();
    $.ajax(
        {
            method: "get",
            url: "select.php"
        }).done(function (data) {
        data = jQuery.parseJSON(data);
        jQuery.each(data, function (id, msg) {
            ft_list.prepend($("<div id=" + id +  ">" + msg + "</div>").click(deltodo));
        })
    })
}
