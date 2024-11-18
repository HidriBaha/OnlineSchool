// JavaScript for Dropdown Toggle

// Handle form submission
document.getElementById("submitForm").addEventListener("click", function(event) {
    event.preventDefault();

    // Get form data
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const message = document.getElementById("message").value;

    if (name && email && message) {
        // Handle the form submission (for now, just log the values)
        console.log("Form Submitted:", { name, email, message });

        // Reset the form
        document.getElementById("contactForm").reset();

        // Close the modal
        const contactModal = bootstrap.Modal.getInstance(document.getElementById("contactModal"));
        contactModal.hide();
    } else {
        alert("Please fill in all fields!");
    }
});
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

// Role-based visibility handling

const role = 2; // Set role (1 = student, 2 = teacher)

// Handle visibility of elements based on role
window.addEventListener("DOMContentLoaded", function() {
    if (role === 1) {
        // Hide communication table for students
        document.getElementById("communicationTable").style.display = "none";

        // Show progress and courses as usual for students
        document.getElementById("progressSection").style.display = "block";
        document.getElementById("meineKurseSection").style.display = "block";
    } else if (role === 2) {
        // Hide progress section for teachers
        document.getElementById("progressSection").style.display = "none";

        // Change course button to 'Edit Course' for teachers
        const courseButtons = document.querySelectorAll(".course-button");
        courseButtons.forEach(button => {
            button.innerHTML = "Edit Course";
            button.href = "#"; // Link to edit course page (you can replace with actual URL)
        });

        // Show communication table for teachers
        document.getElementById("communicationTable").style.display = "block";
    }
});