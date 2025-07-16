(function ($) {
    "use strict";

    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
        return false;
    });

    // Testimonials carousel
    $(".testimonials-carousel").owlCarousel({
        autoplay: true,
        items: 1,
        smartSpeed: 450,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="fa fa-angle-left" aria-hidden="true"></i>',
            '<i class="fa fa-angle-right" aria-hidden="true"></i>'
        ]
    });

})(jQuery);

document.querySelectorAll('a[href^="#"]').forEach(link => {
    link.addEventListener('click', e => {
        e.preventDefault();
        const target = document.querySelector(link.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth'
            });
        }
    });
});

document.getElementById("appointment-date").addEventListener("focus", function () {
    this.showPicker?.();
});

const dateInput = document.getElementById("appointment-date");
const today = new Date().toISOString().split("T")[0];
dateInput.min = today;

document.getElementById("appointment-date").addEventListener("change", function () {
    const selectedDate = new Date(this.value);
    const now = new Date();

    const timeSelect = document.getElementById("appointment-time");
    const options = timeSelect.options;

    for (let i = 0; i < options.length; i++) {
        const optionTime = new Date(selectedDate);
        const [hour, minute] = options[i].value.split(":");
        optionTime.setHours(hour, minute, 0, 0);

        if (selectedDate.toDateString() === now.toDateString() && optionTime <= now) {
            options[i].disabled = true;
        } else {
            options[i].disabled = false;
        }
    }
});
