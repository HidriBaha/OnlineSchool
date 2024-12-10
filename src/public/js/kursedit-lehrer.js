function newKapitel() {
    const kapitelContainer = document.getElementById("kapitel-outer-container");
    kapitelContainer.appendChild(createEmptyKapitel());
}

function createEmptyKapitel() {
    const divKapitelContainer = document.createElement("div");
    divKapitelContainer.classList.add('kapitel-container');

    const divKapitelHeaderRow = document.createElement("div");
    divKapitelHeaderRow.classList.add('kapitel-header-row');

    const h2KapitelHeader = document.createElement("input");
    h2KapitelHeader.classList.add("inpHeaderH2");
    h2KapitelHeader.placeholder = 'neues Kapitel';
    divKapitelHeaderRow.appendChild(h2KapitelHeader);

    const formKapitelButtonRowContainer = document.createElement("div");
    formKapitelButtonRowContainer.classList.add('kapitel-button-row-container');

    const buttonNewDef = document.createElement("button");
    buttonNewDef.classList.add('btn', 'btn-primary');
    buttonNewDef.innerText = '+Def';
    buttonNewDef.onclick=createDef;

    const buttonNewUebung = document.createElement("button");
    buttonNewUebung.classList.add('btn', 'btn-primary');
    buttonNewUebung.innerText = '+Übung';
    buttonNewUebung.onclick=createUebungen;

    formKapitelButtonRowContainer.appendChild(buttonNewDef);
    formKapitelButtonRowContainer.appendChild(buttonNewUebung);
    divKapitelHeaderRow.appendChild(formKapitelButtonRowContainer);


    divKapitelContainer.appendChild(divKapitelHeaderRow);

    const defContianer = document.createElement("div");
    defContianer.classList.add('def-container');

    const h3Header = document.createElement("input");
    h3Header.classList.add('inpHeaderH3');
    h3Header.placeholder = 'neue Erklärung';
    divKapitelContainer.appendChild(defContianer);
    defContianer.appendChild(h3Header);

    const textareaErklaerung = document.createElement("textarea");
    textareaErklaerung.classList.add('textarea-def');
    textareaErklaerung.name = "erklaerung"
    divKapitelContainer.appendChild(textareaErklaerung);

    const divAufgabenContainer = document.createElement("div");
    divAufgabenContainer.classList.add("aufgaben-container");

    const divUebungen = document.createElement('div');
    divUebungen.classList.add('kapitel-header-row');

    const h3UebungHeader = document.createElement('input');
    h3UebungHeader.classList.add('inpHeaderH3');
    h3UebungHeader.placeholder = 'neue Uebung';
    divUebungen.appendChild(h3UebungHeader);
    divAufgabenContainer.appendChild(divUebungen);

    const formUebung = document.createElement("div");
    formUebung.classList.add('kapitel-button-row-container');

    const inputNewLoesung = document.createElement("button");
    inputNewLoesung.classList.add('btn', 'btn-primary');
    inputNewLoesung.onclick=createLoesung;
    inputNewLoesung.innerText = '+Lösung';
    formUebung.appendChild(inputNewLoesung);

    const textareaUebung = document.createElement("textarea");
    textareaUebung.classList.add('textarea-def');
    divAufgabenContainer.appendChild(textareaUebung);

    const divLoesung = document.createElement("div");
    divLoesung.classList.add("loesungen-container");
    divAufgabenContainer.appendChild(divLoesung);

    divKapitelContainer.appendChild(divAufgabenContainer);

    /* const loesungContainer = document.createElement("div");
     loesungContainer.classList.add('loesung-container');

     const labelLoesungContainer = document.createElement("label");
     labelLoesungContainer.classList.add('loesung-label');
     labelLoesungContainer.htmlFor='input-loesung';
     labelLoesungContainer.innerText='Aufgaben';

     loesungContainer.appendChild(labelLoesungContainer);

     const inputLoesung = document.createElement("input");
     loesungContainer.appendChild(inputLoesung);

     divLoesung.appendChild(loesungContainer);*/


    return divKapitelContainer;
}


function createLoesung(event) {
    const kapitelContainer = event.target.parentNode.parentNode.parentNode;
    const losungenContainer =kapitelContainer.querySelector(".loesungen-container");
    console.log(losungenContainer);

    const loesungContainer = document.createElement("div");
    loesungContainer.classList.add('loesung-container');

    const labelLoesungContainer = document.createElement("label");
    labelLoesungContainer.classList.add('loesung-label');
    labelLoesungContainer.htmlFor = 'input-loesung';
    labelLoesungContainer.innerText = 'Aufgaben';

    loesungContainer.appendChild(labelLoesungContainer);

    const inputLoesung = document.createElement("input");
    loesungContainer.appendChild(inputLoesung);

    losungenContainer.appendChild(loesungContainer)
}


function createUebungen(event) {
    const kapitelContainer = event.target.parentNode.parentNode.parentNode;
    const aufgabenContainer =kapitelContainer.querySelector(".aufgaben-container");
    console.log(aufgabenContainer);

    const divAufgabe = document.createElement("div");
    divAufgabe.classList.add("aufgabe");
    const divUebungen = document.createElement('div');
    divUebungen.classList.add('kapitel-header-row');

    const h3UebungHeader = document.createElement('input');
    h3UebungHeader.classList.add('inpHeaderH3');
    h3UebungHeader.placeholder = 'neue Uebung';
    divUebungen.appendChild(h3UebungHeader);
    divAufgabe.appendChild(divUebungen);

    const formUebung = document.createElement("div");
    formUebung.classList.add('kapitel-button-row-container');

    const inputNewLoesung = document.createElement("button");
    inputNewLoesung.classList.add('btn', 'btn-primary');
    inputNewLoesung.onclick=createLoesung;
    inputNewLoesung.innerText = '+Lösung';
    formUebung.appendChild(inputNewLoesung);

    const textareaUebung = document.createElement("textarea");
    textareaUebung.classList.add('textarea-def');
    divAufgabe.appendChild(textareaUebung);

    const divLoesung = document.createElement("div");
    divLoesung.classList.add("loesungen-container");
    divAufgabe.appendChild(divLoesung);

    aufgabenContainer.appendChild(divAufgabe);
}

function createDef(event){
    const kapitelContainer = event.target.parentNode.parentNode.parentNode;
}