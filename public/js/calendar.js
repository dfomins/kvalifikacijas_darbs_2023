// DAY (center-panel)

var dayDefault = ["Svētdiena", "Pirmdiena", "Otrdiena", "Trešdiena", "Ceturtdiena", "Piektdiena", "Sestdiena"];

    document.querySelector(".day").innerHTML = dayDefault[new Date().getDay()];
    document.querySelector(".date").innerHTML = new Date().toLocaleDateString("lv-LV", { day: 'numeric', month: 'long' });


// const renderCalendar = () => {

//     var monthDefault = ["Janvāris", "Februāris", "Marts", "Aprīlis", "Maijs", "Jūnijs", "Jūlijs", "Augusts", "Septembris", "Oktobris", "Novembris", "Decembris"];

//         document.querySelector(".month").innerHTML = monthDefault[date.getMonth()];
//         document.querySelector(".year").innerHTML = date.getFullYear();

//     const monthDays = document.querySelector(".days");

//     const lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDate();
//     const prevLastDay = new Date(date.getFullYear(), date.getMonth(), 0).getDate();
//     const lastDayIndex = new Date(date.getFullYear(), date.getMonth() + 1, 0).getDay();
//     const firstDayIndex = new Date(date.getFullYear(), date.getMonth(), 1, -1).getDay();
//     const nextDays = 7 - lastDayIndex + 1;

//     let days = "";

//     for (let x = firstDayIndex; x > 0; x--) {
//         days += `<div class="grid-item prev-date">${prevLastDay + 1 - x}</div>`;
//     }

//     for (let i = 1; i <= lastDay; i++) {
//         if (i === new Date().getDate() && date.getMonth() === new Date().getMonth()) {
//             days += `<div class="grid-item today">${i}</div>`;
//         } else {
//             days += `<div class="grid-item">${i}</div>`;
//         }
//     }

//     if (nextDays !== 8) {
//         for (let j = 1; j < nextDays; j++) {
//             days += `<div class="grid-item next-date">${j}</div>`;
//             monthDays.innerHTML = days;
//         }
//     } else {
//         monthDays.innerHTML = days;
//     }
// }

// const date = new Date();

// const previous = document.querySelector(".previous");
// const next = document.querySelector(".next");

// if (date.getMonth() == 0) {
//     next.style.display = "list-item";
//     previous.style.display = "none";
// } else if (date.getMonth() == new Date().getMonth()) {
//     next.style.display = "none";
//     previous.style.display = "list-item";
// }

// previous.addEventListener("click", () => {
//     if (date.getMonth() > 1) {
//         date.setMonth(date.getMonth() - 1);
//         renderCalendar();
//         next.style.display = "list-item";
//     } else {
//         date.setMonth(date.getMonth() - 1);
//         renderCalendar();
//         previous.style.display = "none";
//     }
// });

// next.addEventListener("click", () => {
//     if (date.getMonth() < new Date().getMonth()-1) {
//         date.setMonth(date.getMonth() + 1);
//         renderCalendar();
//         previous.style.display = "list-item";
//     } else {
//         date.setMonth(date.getMonth() + 1);
//         renderCalendar();
//         next.style.display = "none";
//     }
// });

// renderCalendar();