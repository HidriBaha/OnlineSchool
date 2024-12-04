// The `loesungen` array from PHP (loesung.php) is now available in JavaScript




function checkSolution(inputField) {
    console.log("checkSolution() called");
    // Get the ID of the input field
    const inputId = inputField.id;

    // Find the corresponding hidden solution
    const hiddenSolutionId = inputId.replace('input-', 'hidden-solution-');
    const hiddenSolution = document.getElementById(hiddenSolutionId).value;
    console.log("lösung",hiddenSolution)
    // Compare the input with the correct solution
    if (inputField.value.trim() === hiddenSolution) {
        inputField.style.borderColor = "green"; // Highlight correct input
        inputField.style.backgroundColor = "#e0ffe0"; // Light green background for correct input
        feedbackContainer.innerHTML = "<span style='color: green;'>✔ Richtig!</span>"; // Correct icon/message
        feedbackContainer.style.color = "green";
        feedbackContainer.style.fontWeight = "bold"; // Make the message bold
        console.log("Richtig");
    } else {
        inputField.style.borderColor = "red"; // Highlight incorrect input
        inputField.style.backgroundColor = "#ffe0e0"; // Light red background for incorrect input
        feedbackContainer.innerHTML = "<span style='color: red;'>❌ Falsch!</span>"; // Incorrect icon/message
        feedbackContainer.style.color = "red";
        feedbackContainer.style.fontWeight = "bold"; // Make the message bold
        console.log("Falsch");
    }
}