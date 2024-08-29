/// nav bar transperancy
function changeNaveBg() {
    var navbar = document.getElementById('navbar');
    var scrollValue = window.scrollY;
    console.log(scrollValue);

    if (scrollValue < 50) {
        navbar.classList.remove('change-navbg-onScroll-in');
        navbar.classList.add('change-navbg-onScroll-out');
    } else {
        navbar.classList.add('change-navbg-onScroll-in');
        navbar.classList.remove('change-navbg-onScroll-out');
    }
}

window.addEventListener('scroll', changeNaveBg);
// nav bar transperancy end



// id navigathion to custom position
document.getElementById("achievement-by-ADTC-btn").addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default action of the anchor tag
    var targetElement = document.getElementById("achievement-by-ADTC");
    if (!targetElement) {
        // If targetElement is not found, navigate to the href specified in the anchor tag
        window.location.href = this.href; // Navigate to the href specified in the anchor tag
    } else {
        // If targetElement is found, scroll to it
        var targetPosition = targetElement.offsetTop - 90; // Custom position 93px down from the top
        window.scrollTo({
            top: targetPosition,
            behavior: 'smooth' // Optional: Smooth scrolling
        });
    }
});
// id navigathion to custom position end

// id navigathion to custom position
document.getElementById("gallery-btn").addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default action of the anchor tag
    var targetElement = document.getElementById("gallery");
    if (!targetElement) {
        // If targetElement is not found, navigate to the href specified in the anchor tag
        window.location.href = this.href; // Navigate to the href specified in the anchor tag
    } else {
        // If targetElement is found, scroll to it
        var targetPosition = targetElement.offsetTop - 90; // Custom position 93px down from the top
        window.scrollTo({
            top: targetPosition,
            behavior: 'smooth' // Optional: Smooth scrolling
        });
    }
});
// id navigathion to custom position end