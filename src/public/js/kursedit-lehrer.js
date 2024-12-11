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
    divInputKapitelContainer.appendChild(h2KapitelHeader);
    divKapitelHeaderRow.appendChild(divInputKapitelContainer);

    const formKapitelButtonRowContainer = document.createElement("div");
    formKapitelButtonRowContainer.classList.add('kapitel-button-row-container');

    /*    const buttonNewDef = document.createElement("button");
        buttonNewDef.classList.add('btn', 'btn-primary');
        buttonNewDef.innerText = '+Def';
        buttonNewDef.onclick=createDef;*/

    // <input hidden name="kapitel-id" value="{{$kapitel->getKapitelID()}}">

    const inputKapitelNew = document.createElement("input");
    inputKapitelNew.hidden = true;
    inputKapitelNew.name = "kapitel-new"
    formKapitelButtonRowContainer.appendChild(inputKapitelNew);

    const inputKapitelNr = document.createElement("input");
    inputKapitelNr.hidden = true;
    inputKapitelNr.classList.add("kapitelNr");
    inputKapitelNr.value = kapitelNr + ". ";
    formKapitelButtonRowContainer.appendChild(inputKapitelNr);

    const buttonNewUebung = document.createElement("button");
    buttonNewUebung.classList.add('btn', 'btn-primary');
    buttonNewUebung.innerText = '+Übung';
    buttonNewUebung.onclick = createUebungen;


    formKapitelButtonRowContainer.appendChild(buttonNewUebung);
    divKapitelHeaderRow.appendChild(formKapitelButtonRowContainer);


    divKapitelContainer.appendChild(divKapitelHeaderRow);

    const defContianer = document.createElement("div");
    defContianer.classList.add('def-container');

    const divInputContainer = document.createElement("div");
    divInputContainer.classList.add("inp-container");

    //<input hidden name="erklaerung-nr" class="erklaerungNr" value="{{$kapitel->getErklaerung()->getErklaerungenNr()}}">

    const inputErklaerungNr = document.createElement("input");
    inputErklaerungNr.hidden=true;
    inputErklaerungNr.name="erklaerung-nr";
    inputErklaerungNr.classList.add("erklaerungNr");
    inputErklaerungNr.value=1;

    divInputContainer.appendChild(inputErklaerungNr);

    const inputErklaerungNew = document.createElement("input");
    inputErklaerungNew.hidden=true;
    inputErklaerungNew.name="erklaerung-new";
    inputErklaerungNew.value=true;

    divInputContainer.appendChild(inputErklaerungNew);


    const divErklaerungNr = document.createElement("div");
    divErklaerungNr.classList.add("inpHeaderH3Nr");
    divErklaerungNr.innerText = kapitelNr + ".1 ";
    divInputContainer.appendChild(divErklaerungNr);

    const h3Header = document.createElement("input");
    h3Header.classList.add('inpHeaderH3');
    h3Header.placeholder = 'neue Erklärung';
    divKapitelContainer.appendChild(defContianer);
    divInputContainer.appendChild(h3Header);

    defContianer.appendChild(divInputContainer);

    const textareaErklaerung = document.createElement("textarea");
    textareaErklaerung.classList.add('textarea-def');
    textareaErklaerung.name = "erklaerung"
    divKapitelContainer.appendChild(textareaErklaerung);

    const divAufgabenContainer = document.createElement("div");
    divAufgabenContainer.classList.add("aufgaben-container");

    const aufgabe = document.createElement("div");
    aufgabe.classList.add("aufgabe");

    const divUebungen = document.createElement('div');
    divUebungen.classList.add('kapitel-header-row');

    const divInputContainerUebung = document.createElement("div");
    divInputContainerUebung.classList.add("inp-container");

    const inputAufgabenNr = document.createElement("input");
    inputAufgabenNr.hidden = true;
    inputAufgabenNr.name = "aufgabenNr";
    inputAufgabenNr.classList.add("aufgabenNr");
    inputAufgabenNr.value = getAufgabenNr(divKapitelContainer);

    divInputContainerUebung.appendChild(inputAufgabenNr);

    const divKapitelNrUebung = document.createElement("div");
    divKapitelNrUebung.classList.add("inpHeaderH3Nr");
    divKapitelNrUebung.innerText = kapitelNr + "."+getAufgabenNr(divKapitelContainer)+". ";

    divInputContainerUebung.appendChild(divKapitelNrUebung);
    const h3UebungHeader = document.createElement('input');
    h3UebungHeader.classList.add('inpHeaderH3');
    h3UebungHeader.placeholder = 'neue Uebung';
    divInputContainerUebung.appendChild(h3UebungHeader)
    divUebungen.appendChild(divInputContainerUebung);

    const formUebung = document.createElement("div");
    formUebung.classList.add('kapitel-button-row-container');

    const inputNewLoesung = document.createElement("button");
    inputNewLoesung.classList.add('btn', 'btn-primary');
    inputNewLoesung.onclick = createLoesung;
    inputNewLoesung.innerText = '+Lösung';
    formUebung.appendChild(inputNewLoesung);
    divUebungen.appendChild(formUebung);
    aufgabe.appendChild(divUebungen);


    const textareaUebung = document.createElement("textarea");
    textareaUebung.classList.add('textarea-def');
    aufgabe.appendChild(textareaUebung);

    const divLoesung = document.createElement("div");
    divLoesung.classList.add("loesungen-container");
    aufgabe.appendChild(divLoesung);

    divAufgabenContainer.appendChild(aufgabe);
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

function getKapitelNr() {
    const kapitelNrs = [];
    document.querySelectorAll(".kapitelNr").forEach(obj => kapitelNrs.push(obj.value));
    let lastElement = kapitelNrs.sort()[kapitelNrs.length - 1];
    return parseInt(lastElement) + 1;
}

function createLoesung(event) {
    const kapitelContainer = event.target.parentNode.parentNode.parentNode;
    const losungenContainer = kapitelContainer.querySelector(".loesungen-container");
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
    inputLoesung.required = true;
    losungenContainer.appendChild(loesungContainer)
}


function createUebungen(event) {
    const kapitelContainer = event.target.parentNode.parentNode.parentNode;
    const aufgabenContainer = kapitelContainer.querySelector(".aufgaben-container");
    const kapitelNr = kapitelContainer.querySelector(".kapitelNr").value.replace(". ","");
    const aufgabenNr = getAufgabenNr(kapitelContainer);

    const divAufgabe = document.createElement("div");
    divAufgabe.classList.add("aufgabe");
    const divUebungen = document.createElement('div');

    divUebungen.classList.add('kapitel-header-row');
    const divInputContainerUebung = document.createElement("div");
    divInputContainerUebung.classList.add("inp-container");

    const inputKapitelNr = document.createElement("input");
    inputKapitelNr.hidden = true;
    inputKapitelNr.name = "aufgabenNr";
    inputKapitelNr.classList.add("aufgabenNr");
    inputKapitelNr.value = aufgabenNr;

    divInputContainerUebung.appendChild(inputKapitelNr);

    const divKapitelNrUebung = document.createElement("div");
    divKapitelNrUebung.classList.add("inpHeaderH3Nr");
    divKapitelNrUebung.innerText = kapitelNr + "." + aufgabenNr + ". ";

    divInputContainerUebung.appendChild(divKapitelNrUebung);
    const h3UebungHeader = document.createElement('input');
    h3UebungHeader.classList.add('inpHeaderH3');
    h3UebungHeader.placeholder = 'neue Uebung';
    divInputContainerUebung.appendChild(h3UebungHeader)
    divUebungen.appendChild(divInputContainerUebung);
    divAufgabe.appendChild(divUebungen);

    const formUebung = document.createElement("div");
    formUebung.classList.add('kapitel-button-row-container');

    const inputNewLoesung = document.createElement("button");
    inputNewLoesung.classList.add('btn', 'btn-primary');
    inputNewLoesung.onclick = createLoesung;
    inputNewLoesung.innerText = '+Lösung';
    formUebung.appendChild(inputNewLoesung);
    divUebungen.appendChild(formUebung);

    const textareaUebung = document.createElement("textarea");
    textareaUebung.classList.add('textarea-def');
    divAufgabe.appendChild(textareaUebung);

    const divLoesung = document.createElement("div");
    divLoesung.classList.add("loesungen-container");
    divAufgabe.appendChild(divLoesung);

    aufgabenContainer.appendChild(divAufgabe);
}

function getAufgabenNr(element) {
    const aufgabenNr = [];
    const aufgabenNrs = element.querySelectorAll(".aufgabenNr");
    if(aufgabenNrs.length===0){
        return 2;
    }
    aufgabenNrs.forEach(aufgabe => aufgabenNr.push(parseInt(aufgabe.value)));
    let aufgabeNr = parseInt(aufgabenNr.sort()[aufgabenNr.length - 1]);
    return aufgabeNr + 1;

}

