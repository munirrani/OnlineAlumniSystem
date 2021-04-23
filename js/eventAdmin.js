var main = document.querySelector("main");
var buttons = main.querySelectorAll("button");
for(var i = 0; i < buttons.length; i++)
{
    buttons[i].parentElement.removeChild(buttons[i]);
}