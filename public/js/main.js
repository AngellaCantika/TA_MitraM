// document.addEventListener("DOMContentLoaded", function () {
//     // Sidebar toggle
//     const toggleButton = document.querySelector(".toggle-sidebar-btn");
//     if (toggleButton) {
//         toggleButton.addEventListener("click", function (event) {
//             event.stopPropagation();
//             document.body.classList.toggle("toggle-sidebar");
//         });
//     }
// });


document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.querySelector(".toggle-sidebar-btn");
    if(toggleButton) {
        toggleButton.addEventListener("click", function (event) {
            event.stopPropagation();
            document.body.classList.toggle("toggle-sidebar");
        });
    }
});