function redirectToPage() {
    var selectElement = document.getElementById("mySelect");
    var selectedOption = selectElement.options[selectElement.selectedIndex].value;
    window.location.href = selectedOption;
}

test();
function test() {
    var check = document.getElementsByName("city");
    check.forEach(element => {
        element.addEventListener("change", function () {
            var value = element.value;
            window.location.replace("index.php?city=" + value);
        });
    });
}

function show() {
    var aswan = document.getElementById("aswan");
    if (aswan.style.display == "block") {
        aswan.style.display = "none";
    } else {
        aswan.style.display = "block";
    }
}

function showluxor() {
    var luxor = document.getElementById("luxor");
    if (luxor.style.display == "block") {
        luxor.style.display = "none";
    } else {
        luxor.style.display = "block";
    }
}

// function go(currentPage, endPage) {
//     let startPage = 1;
//     currentPage = parseInt(currentPage);

//     if (isNaN(currentPage)) {
//         // Handle the case where 'currentPage' is not a valid number
//         return;
//     }

//     if (currentPage < startPage) {
//         currentPage = startPage;
//     } else if (currentPage > endPage) {
//         currentPage = endPage;
//     } else if (currentPage+ 1<= endPage) {
//         // If currentPage is within the valid range, you can increment it
//         currentPage += 1;
//     }
//     window.location.replace("index.php?page=" + parseInt(currentPage));
// }
function go(x,max) {
    console.log(x);
    if (parseInt(x) < 9) {
        x = parseInt(x) + 1;
    }
    window.location.replace("index.php?page=" + x);
}

function back(x) {
    if (parseInt(x) > 0) {
        x = parseInt(x) - 1;
    }
    window.location.replace("index.php?page=" + x);
}

var slides = document.querySelectorAll('.slide');
var currentSlide = 0;

function showSlide(n) {
    slides[currentSlide].classList.remove('active');
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].classList .add('active');
}

function changeSlide(n) {
    showSlide(currentSlide + n);
}

window.addEventListener('load', function () {
    slides[currentSlide].classList.add('active');
});

// booking
function updateForm(selectedDate) {
    // Get the form element
    var form = document.getElementById('yourForm');
    // Get the input element within the form
    var input = form.querySelector('input[name="selectedDate"]');
    // Update the value of the input field with the selected date
    input.value = selectedDate;
}

function dates(e) {
    var v = e.target.value;
    window.location.replace("?id=" + v);
}
