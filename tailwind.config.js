/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            backgroundImage: {
                login: "url(/img/backgrounds/login_bg_2.jpg)",
            },
        },
    },
    plugins: [require("tailwind-scrollbar")],
};
