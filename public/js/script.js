document.addEventListener("DOMContentLoaded", function () {
    const dropdownButton = document.getElementById("dropdownHoverButton");
    const dropdown = document.getElementById("dropdownHover");
    const selectedRating = document.getElementById("selectedRating");
    const ratingInput = document.getElementById("rating");
    const dropdownItems = dropdown.querySelectorAll("a[data-value]");

    dropdownButton.addEventListener("click", function (event) {
        event.preventDefault();
        dropdown.classList.toggle("hidden");
    });

    dropdownItems.forEach((item) => {
        item.addEventListener("click", function (event) {
            event.preventDefault();
            const value = this.getAttribute("data-value");
            selectedRating.textContent = `${value} Star${value > 1 ? "s" : ""}`;
            ratingInput.value = value;
            dropdown.classList.add("hidden");
        });
    });

    document.addEventListener("click", function (event) {
        if (
            !dropdown.contains(event.target) &&
            !dropdownButton.contains(event.target)
        ) {
            dropdown.classList.add("hidden");
        }
    });
});
