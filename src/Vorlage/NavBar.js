
document.getElementById("profileIcon").addEventListener("click", function(event) {
    event.preventDefault();
    const dropdown = document.getElementById("profileDropdown");
    dropdown.style.display = dropdown.style.display === "none" ? "block" : "none";
});

// Close dropdowns if clicking outside
document.addEventListener("click", function(event) {
    if (!event.target.closest("#communicationIcon") && !event.target.closest("#communicationDropdown")) {
        document.getElementById("communicationDropdown").style.display = "none";
    }
    if (!event.target.closest("#profileIcon") && !event.target.closest("#profileDropdown")) {
        document.getElementById("profileDropdown").style.display = "none";
    }
});