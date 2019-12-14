let ft_list;
$(function () {
    ft_list = $("#ft_list");
    $("#new").click(newtodo);
    let tmp = document.cookie;
    if (tmp) {
        let parse = JSON.parse(tmp);
        parse.forEach(function (elem) {
            addtodo(elem);
        })
    }
});

function addtodo(str) {
    ft_list.prepend($("<div>" + str + "</div>").click(deltodo));
}

function newtodo() {
    let str = prompt("Your task : ");
    if (str !== '')
        addtodo(str);
}

function deltodo() {
    if (confirm("Are you sure you want do delete this element?"))
        this.remove();
}

$( window ).on("unload", function() {
    let arr = [];
    let children =  ft_list.children();
    for (let i = 0; i < children.length; i++)
        arr.unshift(children[i].innerHTML);
    document.cookie = JSON.stringify(arr);
});