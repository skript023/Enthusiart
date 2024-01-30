document.addEventListener("DOMContentLoaded", function() {
    let carouselItems = document.querySelectorAll('.carousel-item');

    carouselItems.forEach(function(item) {
        let scrollDownButton = document.createElement('div');
        scrollDownButton.classList.add('scroll-down');
        scrollDownButton.innerHTML = '<a href="#" onclick="scrollToAbout()"><i class="fa-solid fa-circle-chevron-down fa-2xl" style="color: #fff;"></i></a>';
        item.appendChild(scrollDownButton);
    });
});
function scrollToAbout() {
    document.getElementById('about').scrollIntoView({
        behavior: 'smooth'
    });
}