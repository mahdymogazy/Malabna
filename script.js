//javascript of responsive navigation menu
const menuBtn = document.querySelector(".menu-btn");
const navigation = document.querySelector(".navigation");

menuBtn.addEventListener("click", () => {
    menuBtn.classList.toggle("active");
    navigation.classList.toggle("active");
});
//javascript for video slider navigation
const btns = document.querySelectorAll(".nav-btn");
const slides = document.querySelectorAll(".video-slide");
const contents = document.querySelectorAll(".content");
var sliderNav = function (manual) {
    btns.forEach((btn) => {
        btn.classList.remove("active");
    })

    slides.forEach((slide) => {
        slide.classList.remove("active");
    })

    contents.forEach((content) => {
        content.classList.remove("active");
    })

    btns[manual].classList.add("active");
    slides[manual].classList.add("active");
    contents[manual].classList.add("active");
}
btns.forEach((btn, i) => {
    btn.addEventListener("click", () => {
        sliderNav(i);
    });
});

  

const menuIcon = document.getElementById("menu-bar");
const navbar = document.querySelector("nav");

menuIcon.addEventListener("click", () => {
    navbar.classList.toggle("active");
})



document.addEventListener('DOMContentLoaded', function() {
    // Bootstrap carousel initialization
    const myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleControls'), {
        interval: 500, // set the interval (if needed)
        // other options if necessary
    });
});

// // This script initializes the carousel
// var myCarousel = new bootstrap.Carousel(document.getElementById('carouselExampleControls'), {
//     interval: 1000, // Set the interval for automatic sliding if needed
//     wrap: true // Set to true to loop back to the beginning after the last item
//   });
  