function toggleRow(rowId) {
    let row = document.getElementById(rowId);
    if (row) {
        let displayStyle = window.getComputedStyle(row).display;
        if (displayStyle === "none") {
            row.style.display = "table-row"; // Zeige die Zeile an
        } else {
            row.style.display = "none"; // Blende die Zeile aus
        }
    }
}

document.getElementById('openChatBtn').addEventListener('click', function() {
    document.getElementById('chatContainer').style.display = 'grid';
});

document.getElementById('closeChatBtn').addEventListener('click', function() {
    document.getElementById('chatContainer').style.display = 'none';
});

document.getElementById('sendMessageBtn').addEventListener('click', sendMessage);

function sendMessage() {
}

function updateRecipients() {
    var verteiler = document.getElementById('verteiler');
    var recipient = document.getElementById('recipient');
    var selectedClass = verteiler.value;

    if (selectedClass !== 'Kurse' && klassenData[selectedClass]) {
        recipient.value = klassenData[selectedClass]['parents'].join(', ');
    } else {
        recipient.value = '';
    }
}
