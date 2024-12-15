function newKapitel() {
    const kapitelContainer = document.getElementById("kapitel-outer-container");
    kapitelContainer.appendChild(createEmptyKapitel());
}

function createEmptyKapitel() {
    const kapitelNr = getKapitelNr();
    const divKapitelContainer = document.createElement("div");
    divKapitelContainer.classList.add('kapitel-container');

    const divKapitelHeaderRow = document.createElement("div");
    divKapitelHeaderRow.classList.add('kapitel-header-row');

    const divInputKapitelContainer = document.createElement("div");
    divInputKapitelContainer.classList.add("inp-container");

    const divKapitelNrKapitelNr = document.createElement("div");
    divKapitelNrKapitelNr.classList.add("inpHeaderH2Nr");
    divKapitelNrKapitelNr.innerText = kapitelNr + ". ";
    divInputKapitelContainer.appendChild(divKapitelNrKapitelNr);

    const h2KapitelHeader = document.createElement("input");
    h2KapitelHeader.classList.add("inpHeaderH2");
    h2KapitelHeader.placeholder = 'neues Kapitel';
    h2KapitelHeader.name = "kapitel-definition-" + kapitelNr + "-new";
    divInputKapitelContainer.appendChild(h2KapitelHeader);
    divKapitelHeaderRow.appendChild(divInputKapitelContainer);

    const formKapitelButtonRowContainer = document.createElement("div");
    formKapitelButtonRowContainer.classList.add('kapitel-button-row-container');

    const inputKapitelNr = document.createElement("input");
    inputKapitelNr.hidden = true;
    inputKapitelNr.classList.add("kapitelNr");
    inputKapitelNr.value = kapitelNr;
    formKapitelButtonRowContainer.appendChild(inputKapitelNr);

    const buttonNewUebung = document.createElement("button");
    buttonNewUebung.classList.add('btn', 'btn-primary');
    buttonNewUebung.innerText = '+Übung';
    buttonNewUebung.onclick = createAufgabe;
    buttonNewUebung.type = "button";

    formKapitelButtonRowContainer.appendChild(buttonNewUebung);
    divKapitelHeaderRow.appendChild(formKapitelButtonRowContainer);

    divKapitelContainer.appendChild(divKapitelHeaderRow);

    const defContianer = document.createElement("div");
    defContianer.classList.add('def-container');

    const divInputContainer = document.createElement("div");
    divInputContainer.classList.add("inp-container");

     const divErklaerungNr = document.createElement("div");
    divErklaerungNr.classList.add("inpHeaderH3Nr");
    divErklaerungNr.innerText = kapitelNr + ".1 ";
    divInputContainer.appendChild(divErklaerungNr);

    const h3Header = document.createElement("input");
    h3Header.classList.add('inpHeaderH3');
    h3Header.placeholder = 'neue Erklärung';
    h3Header.name = "erklaerung-header-" + kapitelNr + "-" + "1" + "-new";
    divKapitelContainer.appendChild(defContianer);
    divInputContainer.appendChild(h3Header);

    defContianer.appendChild(divInputContainer);

    const textareaErklaerung = document.createElement("textarea");
    textareaErklaerung.classList.add('textarea-def');
    textareaErklaerung.name = "erklaerung-" + kapitelNr + "-" + "1" + "-new";
    divKapitelContainer.appendChild(textareaErklaerung);

    const divAufgabenContainer = document.createElement("div");
    divAufgabenContainer.classList.add("aufgaben-container");
    divKapitelContainer.appendChild(divAufgabenContainer);

    createAufgabe({target:divKapitelContainer});

    return divKapitelContainer;
}

function getKapitelNr() {
    const kapitelNrs = [];
    document.querySelectorAll(".kapitelNr").forEach(obj => kapitelNrs.push(obj.value));
    let lastElement = kapitelNrs.sort()[kapitelNrs.length - 1];
    return parseInt(lastElement) + 1;
}

function createLoesung(event) {
    const kapitelContainer = findContainer(event.target,"kapitel-container");
    const losungenContainer = kapitelContainer.querySelector(".loesungen-container");
    const kapitelNr = kapitelContainer.querySelector(".kapitelNr").value.replace(". ", "");
    const aufgabenNr = findContainer(event.target,"kapitel-header-row").querySelector(".aufgabenNr").value;

    const loesungContainer = document.createElement("div");
    loesungContainer.classList.add('loesung-container');

    const labelLoesungContainer = document.createElement("label");
    labelLoesungContainer.classList.add('loesung-label');
    labelLoesungContainer.htmlFor = 'input-loesung';
    labelLoesungContainer.innerText = 'Aufgaben';

    loesungContainer.appendChild(labelLoesungContainer);

    const inputLoesung = document.createElement("input");
    inputLoesung.name = "loesung-" + kapitelNr + "-" + aufgabenNr + "-new"
    loesungContainer.appendChild(inputLoesung);
    inputLoesung.required = true;

    const deleteLoesungButton = document.createElement("button");
    deleteLoesungButton.classList.add("btn", "btn-cancel");
    deleteLoesungButton.innerText = "x";
    deleteLoesungButton.type = "button";
    deleteLoesungButton.onclick = deleteLoesung;

    loesungContainer.appendChild(deleteLoesungButton);
    losungenContainer.appendChild(loesungContainer);
}


function createAufgabe(event) {

    const kapitelContainer = findContainer(event.target, "kapitel-container")
    const aufgabenContainer = kapitelContainer.querySelector(".aufgaben-container");
    const kapitelNr = kapitelContainer.querySelector(".kapitelNr").value.replace(". ", "");
    const aufgabenNr = getAufgabenNr(kapitelContainer);

    const divAufgabe = document.createElement("div");
    divAufgabe.classList.add("aufgabe");
    const divUebungen = document.createElement('div');

    divUebungen.classList.add('kapitel-header-row');
    const divInputContainerUebung = document.createElement("div");
    divInputContainerUebung.classList.add("inp-container");

    const inputAufgabenNR = document.createElement("input");
    inputAufgabenNR.hidden = true;
    inputAufgabenNR.classList.add("aufgabenNr");
    inputAufgabenNR.value = aufgabenNr;

    divInputContainerUebung.appendChild(inputAufgabenNR);

    const divKapitelNrUebung = document.createElement("div");
    divKapitelNrUebung.classList.add("inpHeaderH3Nr");
    divKapitelNrUebung.innerText = kapitelNr + "." + aufgabenNr + ". ";

    divInputContainerUebung.appendChild(divKapitelNrUebung);
    const h3UebungHeader = document.createElement('input');
    h3UebungHeader.classList.add('inpHeaderH3');
    h3UebungHeader.name = "uebung-header-" + kapitelNr + "-" + aufgabenNr;
    h3UebungHeader.placeholder = 'Aufgabe';
    divInputContainerUebung.appendChild(h3UebungHeader)
    divUebungen.appendChild(divInputContainerUebung);
    divAufgabe.appendChild(divUebungen);

    const formUebung = document.createElement("div");
    formUebung.classList.add('kapitel-button-row-container');

    const inputNewLoesung = document.createElement("button");
    inputNewLoesung.classList.add('btn', 'btn-primary');
    inputNewLoesung.onclick = createLoesung;
    inputNewLoesung.innerText = '+Lösung';
    inputNewLoesung.type = "button";
    formUebung.appendChild(inputNewLoesung);

    const inputDeleteAufgabe = document.createElement("button");
    inputDeleteAufgabe.classList.add('btn', 'btn-secondary');
    inputDeleteAufgabe.onclick = deleteAufgabe;
    inputDeleteAufgabe.innerText = 'Entfernen';
    inputDeleteAufgabe.type = "button";

    formUebung.appendChild(inputDeleteAufgabe);
    divUebungen.appendChild(formUebung);

    const textareaUebung = document.createElement("textarea");
    textareaUebung.name = "aufgaben-" + kapitelNr + "-" + aufgabenNr + "-new";
    textareaUebung.classList.add('textarea-def');
    divAufgabe.appendChild(textareaUebung);

    const divLoesung = document.createElement("div");
    divLoesung.classList.add("loesungen-container");
    divAufgabe.appendChild(divLoesung);

    aufgabenContainer.appendChild(divAufgabe);
}

function deleteAufgabe(event) {

    const aufgabe = findContainer(event.target, "aufgabe")
    aufgabe.remove()
}

function deleteLoesung(event) {

    const loesungContainer = findContainer(event.target, "loesung-container");
    loesungContainer.remove();
}

function getAufgabenNr(element) {
    const aufgabenNr = [];
    const aufgabenNrs = element.querySelectorAll(".aufgabenNr");
    if (aufgabenNrs.length === 0) {
        return 2;
    }
    aufgabenNrs.forEach(aufgabe => aufgabenNr.push(parseInt(aufgabe.value)));
    let aufgabeNr = parseInt(aufgabenNr.sort()[aufgabenNr.length - 1]);
    return aufgabeNr + 1;
}

function findContainer(node, className) {
    console.log(node)
    //not class name
    while (node.className !== className) {
        node = node.parentNode;
    }
    return node;
}


