
function initializeProgressBar() {
    // Set up the total number of tasks
    const totalTasks = document.querySelectorAll('.solution-field').length;
    const progressBar = document.getElementById('progress-bar');

    function updateProgressBar() {
        const completedTasks = Array.from(document.querySelectorAll('.solution-field'))
            .filter(input => input.style.borderColor === 'green').length;

        const progressPercent = Math.round((completedTasks / totalTasks) * 100);
        progressBar.style.width = progressPercent + '%';
        progressBar.setAttribute('aria-valuenow', progressPercent);
        progressBar.textContent = progressPercent + '%';
    }

    // Listen to all solution field inputs
    document.querySelectorAll('.solution-field').forEach(inputField => {
        inputField.addEventListener('input', function () {
            setTimeout(updateProgressBar, 200); // Delay to allow validation
        });
    });

    // Initialize progress on page load
    updateProgressBar();
}

// Updated checkSolution function
function checkSolution(inputField) {
    console.log("checkSolution() called");
    // Get the ID of the input field
    const inputId = inputField.id;

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

    } else {
        inputField.style.borderColor = "red"; // Highlight incorrect input
        inputField.style.backgroundColor = "#ffe0e0"; // Light red background
        console.log("Falsch");
    }
}

// Helper function to normalize input for comparison

function normalizeString(str) {
    return str
        .trim() // Remove leading and trailing spaces
        .replace(/\s*,\s*/g, ', ') // Ensure a single space after each comma
        .replace(/\s+/g, ' '); // Collapse multiple spaces into one
}