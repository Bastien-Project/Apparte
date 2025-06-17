const body = document.querySelector('body'),
    sidebar = body.querySelector('nav.sidebar'),
    toggle = body.querySelector(".toggle");

toggle.addEventListener("click", () => {
    sidebar.classList.toggle("close");

    // Ajouter ou retirer la classe blur
    if (sidebar.classList.contains("close")) {
        body.classList.remove("blur");
    } else {
        body.classList.add("blur");
    }
});