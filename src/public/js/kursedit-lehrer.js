function newKapitel () {
    const kapitelContainer = document.getElementById("kapitel-outer-container");
    kapitelContainer.appendChild(createEmptyKapitel());
}

function createEmptyKapitel()
{
    const divKapitelContainer = document.createElement("div");
    divKapitelContainer.classList.add('kapitel-container');

    const divKapitelHeaderRow = document.createElement("div");
    divKapitelHeaderRow.classList.add('kapitel-header-row');

    const h2KapitelHeader = document.createElement("h2");
    h2KapitelHeader.innerText='TODO';
    divKapitelHeaderRow.appendChild(h2KapitelHeader);

    const formKapitelButtonRowContainer = document.createElement("form");
    formKapitelButtonRowContainer.classList.add('kapitel-button-row-container');

    const inputNewDef = document.createElement("input");
    inputNewDef.classList.add('btn', 'btn-primary');
    inputNewDef.type = 'submit';
    inputNewDef.name = 'newDef';
    inputNewDef.value = '+Def';

    const inputNewUebung = document.createElement("input");
    inputNewUebung.classList.add('btn','btn-primary');
    inputNewUebung.type = 'submit';
    inputNewUebung.name = 'newDef';
    inputNewUebung.value = '+Übung';
    formKapitelButtonRowContainer.appendChild(inputNewDef);
    formKapitelButtonRowContainer.appendChild(inputNewUebung);
    divKapitelHeaderRow.appendChild(formKapitelButtonRowContainer);


    divKapitelContainer.appendChild(divKapitelHeaderRow);

    const defContianer = document.createElement("div");
    defContianer.classList.add('def-container');

    const h3Header = document.createElement("h3");
    h3Header.innerText='TODO';
    divKapitelContainer.appendChild(defContianer);
    defContianer.appendChild(h3Header);

    const textareaErklaerung = document.createElement("textarea");
    textareaErklaerung.classList.add('textarea-def');
    textareaErklaerung.name="erklaerung"
    divKapitelContainer.appendChild(textareaErklaerung);

    const divUebungen = document.createElement('div');
    divUebungen.classList.add('kapitel-header-row');

    const divDefContainer = document.createElement('div');
    divDefContainer.classList.add('def-container');

    const h3UebungHeader = document.createElement('h3');
    h3UebungHeader.innerText='TODO $kapitel->getKapitelNR()}}.{{$aufgabe->getAufgabenNr()}}. &Uuml;bung'
    divDefContainer.appendChild(h3UebungHeader);
    divUebungen.appendChild(divDefContainer);

    const formUebung = document.createElement("form");
    formUebung.classList.add('kapitel-button-row-container');

    const inputNewLoesung =document.createElement("input");
    inputNewLoesung.classList.add('btn','btn-primary');
    inputNewLoesung.type = 'submit';
    inputNewLoesung.name='newLösung';
    inputNewLoesung.value='+Lösung';
    formUebung.appendChild(inputNewLoesung);
    divUebungen.appendChild(formUebung);
    divKapitelContainer.appendChild(divUebungen);

    const textareaUebung = document.createElement("textarea");
    textareaUebung.classList.add('textarea-def');
    divKapitelContainer.appendChild(textareaUebung);

    const divLoesung = document.createElement("div");
    divLoesung.classList.add("loesungen-container");

    const loesungContainer = document.createElement("div");
    loesungContainer.classList.add('loesung-container');

    const labelLoesungContainer = document.createElement("label");
    labelLoesungContainer.classList.add('loesung-label');
    labelLoesungContainer.htmlFor='input-loesung';
    labelLoesungContainer.innerText='Aufgaben';

    loesungContainer.appendChild(labelLoesungContainer);

    const inputLoesung = document.createElement("input");
    loesungContainer.appendChild(inputLoesung);

    divLoesung.appendChild(loesungContainer);

    divKapitelContainer.appendChild(divLoesung);

    return divKapitelContainer;
}
