let ft_list;
window.onload = function () {
    let tmp = document.cookie;
    ft_list = document.getElementById("ft_list");
    if (tmp) {
        var parse = JSON.parse(tmp);
        parse.forEach(function (elem) {
            addtodo(elem);
        })
    }
    let newel = document.getElementById("new");
    newel.addEventListener("click", newtodo);
};

function addtodo(str) {
    let div = document.createElement('div');
    div.innerHTML = str;
    div.addEventListener("click", deltodo);
    ft_list.insertBefore(div, ft_list.firstChild);
}

function newtodo() {
    let str = prompt("Your task : ");
    if (str !== '')
        addtodo(str);
}

function deltodo() {
    if (confirm("Are you sure you want do delete this element?"))
        ft_list.removeChild(this);
}

window.onunload = function () {
    let arr = [];
    let children =  ft_list.children;
    for (let i = 0; i < children.length; i++)
        arr.unshift(children[i].innerHTML);
    document.cookie = JSON.stringify(arr);
};