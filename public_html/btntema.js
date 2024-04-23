var tema = localStorage.getItem("tema");
if (!tema) {
    tema = "light";
    localStorage.setItem("tema", "light");
}
document.body.dataset.bsTheme = tema;


document.getElementById("btntema").addEventListener("click", function(){
    if (tema == "dark")
        tema = "light";
    else
        tema = "dark";

    localStorage.setItem("tema", tema);
    document.body.dataset.bsTheme = tema;
});
