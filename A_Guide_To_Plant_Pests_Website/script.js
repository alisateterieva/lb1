/* //1 Визначення типу і версії браузера
var userAgent = navigator.userAgent;
alert("Інформація про браузер: " + userAgent); */

/* //2 Виконання математичних операцій
var num1 = 10;
var num2 = 5;

// Ділення та множення з використанням методу alert об'єкта window
window.alert("Ділення чисел: " + (num1 / num2));
window.alert("Множення чисел: " + (num1 * num2)); 

// Сума та різниця з використанням методу write об'єкта document
document.writeln("Сума чисел: " + (num1 + num2) + "<br>");
    document.writeln("Різниця чисел: " + (num1 - num2)); */
//3 Збільшення та зменшення зображення при наведенні
function enlargeImage(element) {
    element.style.transform = "scale(1.25)";
}

function shrinkImage(element) {
    element.style.transform = "scale(1)";
}

//4
function changeImage() {
    var selectedOption = document.querySelector('input[name="imageOption"]:checked').value;
    var image1 = document.querySelector('.enlarged:nth-child(1)');
    var image2 = document.querySelector('.enlarged:nth-child(2)');
    var image3 = document.querySelector('.enlarged:nth-child(3)');
    switch (selectedOption) {
        case "i1":
            image1.src = "media/1.jpg";
            image2.src = "media/1.jpg";
            image3.src = "media/1.jpg";
            break;
        case "i2":
            image1.src = "media/2.jpg";
            image2.src = "media/2.jpg";
            image3.src = "media/2.jpg";
            break;
        case "i3":
            image1.src = "media/3.jpg";
            image2.src = "media/3.jpg";
            image3.src = "media/3.jpg";
            break;
        case "i4":
            image1.src = "media/4.jpg";
            image2.src = "media/4.jpg";
            image3.src = "media/4.jpg";
            break;
        case "i5":
            image1.src = "media/5.jpg";
            image2.src = "media/5.jpg";
            image3.src = "media/5.jpg";
            break;
        default:
            break;
    }
}
var radioButtons = document.querySelectorAll('input[name="imageOption"]');
radioButtons.forEach(function (radio) {
    radio.addEventListener('change', changeImage);
});
document.addEventListener("DOMContentLoaded", changeImage);

//5
document.addEventListener("DOMContentLoaded", function() {
    var links = document.querySelectorAll(".menu a");

    links.forEach(function(link) {
        link.addEventListener("mouseover", function() {
            this.classList.add("hovered");
        });

        link.addEventListener("mouseout", function() {
            this.classList.remove("hovered");
        });
    });
});

//6
function redirectToPage() {
    var selectElement = document.getElementById("pageSelector");
    var selectedPage = selectElement.value;
    // Перейти на обрану сторінку
    window.location.href = selectedPage;
}

//7
function changeLanguage() {
    // Отримати вибрану мову
    var selectedLanguage = document.getElementById("languageSelector").value;

    // Визначити URL для вибраної мови
    var url;
    if (selectedLanguage === "UA") {
        url = "gribkypage.html";
    } else if (selectedLanguage === "EN") {
        url = "page_en.html";
    }

    // Перейти на нову сторінку
    window.location.href = url;
}

//8
var randomInfo = getRandomInfo();
        document.getElementById("dailyInfo").textContent = randomInfo;