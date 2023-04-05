var dayDefault = [
    "Svētdiena",
    "Pirmdiena",
    "Otrdiena",
    "Trešdiena",
    "Ceturtdiena",
    "Piektdiena",
    "Sestdiena",
];

document.querySelector(".day").innerHTML = dayDefault[new Date().getDay()];
document.querySelector(".date").innerHTML = new Date().toLocaleDateString(
    "lv-LV",
    { day: "numeric", month: "long" }
);
