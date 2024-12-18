/**
 * Lock completed tasks on the page
 * @param {Array} completedTasks - Array of completed task IDs
 */

function initializeCompletedTasks(completedTasks) {
    console.log("Initializing completed tasks:", completedTasks);

    // Select all input fields related to tasks
    const taskInputs = document.querySelectorAll("input.solution-field");

    taskInputs.forEach((inputField) => {
        const aufgabeId = parseInt(inputField.dataset.aufgabeId, 10);

        // Check if the current task ID exists in the completed tasks
        if (completedTasks.includes(aufgabeId)) {
            lockTask(inputField);
            inputField.style.borderColor = "green";
            inputField.style.backgroundColor = "#e0ffe0";
        }
    });
}
document.addEventListener('DOMContentLoaded', function () {
    // Initialize completed tasks first
    initializeCompletedTasks(completedTasks);

    // Then initialize the progress bar
    initializeProgressBar();
});

/**
 * Check the user's input against the solution
 * @param {HTMLInputElement} inputField - The input field being checked
 */
function initializeProgressBar() {
    const totalTasks = document.querySelectorAll('.solution-field').length; // Total tasks on the page
    const progressBar = document.getElementById('progress-bar');

    function updateProgressBar() {
        const completedTasks = Array.from(document.querySelectorAll('.solution-field'))
            .filter(input => input.disabled || input.style.borderColor === "green").length;

        const progressPercent = Math.round((completedTasks / totalTasks) * 100);
        progressBar.style.width = progressPercent + '%';
        progressBar.setAttribute('aria-valuenow', progressPercent);
        progressBar.textContent = progressPercent + '%';
    }

    // Update the progress bar initially
    updateProgressBar();

    // Listen to changes in solution fields
    document.querySelectorAll('.solution-field').forEach(inputField => {
        inputField.addEventListener('input', function () {
            setTimeout(updateProgressBar, 200); // Delay to allow validation
        });
    });
}


// Updated checkSolution function
function checkSolution(inputField) {
    console.log("checkSolution() called");
    // Get the ID of the input field
    const inputId = inputField.id;
    const feedbackContainer = inputField.nextElementSibling;

    // Find the corresponding hidden solution
    const hiddenSolutionId = inputId.replace('input-', 'hidden-solution-');
    const hiddenSolution = document.getElementById(hiddenSolutionId).value.trim();
    console.log("Lösung:", hiddenSolution);

    // Compare the input with the correct solution
    const userInput = inputField.value.trim();
    if (userInput === hiddenSolution || normalizeString(userInput) === normalizeString(hiddenSolution)) {
        inputField.style.borderColor = "green"; // Highlight correct input
        inputField.style.backgroundColor = "#e0ffe0"; // Light green background
        inputField.setAttribute('readonly', true); // Prevent further changes
        console.log("Richtig,field readonly");
        // Mark task as completed
        lockTask(inputField);

        // Display feedback
        if (feedbackContainer && feedbackContainer.classList.contains("feedback-container")) {
            feedbackContainer.innerHTML = "<span style='color: green;'>✔ Aufgabe abgeschlossen!</span>";
        }

        // Send AJAX request to mark as completed
        const aufgabeId = inputField.dataset.aufgabeId;
        if (aufgabeId) {
            markTaskAsCompleted(aufgabeId);
        } else {
            console.error("Aufgabe ID is missing for this input field.");
        }

    } else {
        inputField.style.borderColor = "red";
        inputField.style.backgroundColor = "#ffe0e0";

        if (feedbackContainer && feedbackContainer.classList.contains("feedback-container")) {
            feedbackContainer.innerHTML = "<span style='color: red;'>✘ Falsche Antwort!</span>";
        }
    }
}

// Helper function to normalize input for comparison
function lockTask(inputField) {
    inputField.disabled = true;
}
function markTaskAsCompleted(aufgabeId) {
    console.log(`Marking task ${aufgabeId} as completed`);

    fetch("/mark-task-completed", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ aufgabe_id: aufgabeId }),
    })
        .then((response) => response.json())
        .then((data) => {
            if (data.success) {
                console.log(`Task ${aufgabeId} marked as completed successfully`);
            } else {
                console.error(`Failed to mark task ${aufgabeId} as completed:`, data.error);
            }
        })
        .catch((error) => {
            console.error("Error marking task as completed:", error);
        });
}

function normalizeString(str) {
    return str
        .trim() // Remove leading and trailing spaces
        .replace(/\s*,\s*/g, ', ') // Ensure a single space after each comma
        .replace(/\s+/g, ' '); // Collapse multiple spaces into one
}