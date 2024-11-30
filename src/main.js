
// Role-based visibility handling

//const role = 1; // Set role (1 = student, 2 = teacher)
console.log("Role from PHP:", role);


// Handle visibility of elements based on role
window.addEventListener("DOMContentLoaded", function() {
    if (role === "schüler") {
        // Hide communication table for students
        document.getElementById("communicationTable").style.display = "none";

        // Show progress and courses as usual for students
        document.getElementById("progressSection").style.display = "block";
        document.getElementById("meineKurseSection").style.display = "block";
        const courseButtons = document.querySelectorAll(".course-button");
        courseButtons.forEach(button => {
            button.innerHTML = "View Course"; // Customize button text
            button.href = "#"; // Replace with actual link to course page
        });
    } else if (role === "lehrer") {
        // Hide progress section for teachers
        document.getElementById("progressSection").style.display = "none";

        // Change course button to 'Edit Course' for teachers
       /* const courseButtons = document.querySelectorAll(".course-button");
        courseButtons.forEach(button => {
            button.innerHTML = "Edit Course";
            button.href = "#"; // Link to edit course page (you can replace with actual URL)
        });*/
        const linksArr = document.querySelectorAll('.btn-primary');
        if (role === "lehrer") {
            // Hide communication table for students

            linksArr.forEach(a => {
                console.log(a)
                a.innerHTML = a.innerHTML.replace("Zum Kurs", "Kurs bearbeiten");
                a.href = a.href.replace("/edit-kurs-schueler/edit-kurs-schueler.php", "/create-edit-kurs/create-edit-kurs.php");
            });
        }

        // Show communication table for teachers
        document.getElementById("communicationTable").style.display = "block";
    }
});
