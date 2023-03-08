import "./bootstrap";
import "../sass/app.scss";

window.addEventListener("load", function () {
    const wrapper = this.document.getElementById("wrapper");
    const menu = wrapper.querySelector(".header-container");
    menu.classList.toggle("sticky-active");

    const aside = wrapper.querySelector(".aside");
    const header = wrapper.querySelector(".header");
    if (aside) {
        header.classList.add("header-session");
    }
});

window.addEventListener("scroll", function () {
    const wrapper = this.document.getElementById("wrapper");
    const menu = wrapper.querySelector(".header-container");
    const screen = this.window.scrollY;

    if (screen <= 120) {
        menu.classList.remove("sticky");
        menu.classList.add("sticky-active");
    } else {
        menu.classList.remove("sticky-active");
        menu.classList.remove("sticky");
        this.setTimeout(() => {
            menu.classList.add("sticky");
        }, 300);
    }
});
