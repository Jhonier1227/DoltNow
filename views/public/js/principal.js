$(document).ready(function() {
    $('#modo-btn').click(function() {
        $('body').toggleClass('dark-mode');
        localStorage.setItem("modo", $('body').hasClass('dark-mode') ? "oscuro" : "claro");
        $('#modo-btn').text($('body').hasClass('dark-mode') ? "☀️" : "🌙");
    });
    if (localStorage.getItem("modo") === "oscuro") {
        $('body').addClass('dark-mode');
        $('#modo-btn').text("☀️");
    }
});