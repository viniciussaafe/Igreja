var MenuItens = document.getElementById("menuItens");

MenuItens.style.maxHeight = "0px";

function MenuCelular() {
    if (MenuItens.style.maxHeight == "0px") {
        MenuItens.style.maxHeight = "200px";
    } else {
        MenuItens.style.maxHeight = "0px";
    }
};
