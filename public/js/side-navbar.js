// SIDEBAR

document.querySelector(".close-menu").addEventListener("click", () => {
    document.querySelector(".navLinks").style.right = "-200px";
});

document.querySelector(".open-menu").addEventListener("click", () => {
    document.querySelector(".navLinks").style.right = "0px";
});
