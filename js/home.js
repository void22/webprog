function toggleMenu()
{
    var x = document.getElementById("menu");
    if (x.className === "menu-bar")
    {
        x.className += " responsive";
    }
    else
    {
        x.className = "menu-bar";
    }
}
