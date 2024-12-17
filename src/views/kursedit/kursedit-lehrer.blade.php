@extends("layouts.layout")
@section("content")
    <form class="container" action="/kurs-update" method="post" enctype="multipart/form-data">
        <div>
            <input hidden name="fach" id="fachHolder" value="{{!empty($kurs)?$kurs->getFach():$fach->getName()}}">
            <input hidden name="thema" id="themaHolder" value="{{!empty($kurs)?$kurs->getThema():$thema->getName()}}">
            <div>
                <label class="inpHeaderH3Nr" for="selectedFach">Fach:</label>
                <select class="dropDown" id="selectedFach" onchange="selectFach(event)">
                    @foreach($faecher as $f)
                        <option class="dropDownOption"
                                @if((!empty($kurs)&&$kurs->getFachId()==$f->getId())||(!empty($fach)&&$fach->getId()==$f->getId()))
                                    selected="selected"
                                @endif
                                value="{{$f->getId()}}">{{$f->getName()}}</option>
                        <option class="dropDownOption" value="2">Deutsch</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="inpHeaderH3Nr" for="selectedThema">Thema:</label>
                <select class="dropDown" name="selectedThema" id="selectedThema" required>
                    @foreach($themen as $t)
                        <option class="dropDownOption" data="{{$t->getFaecherId()}}"
                                @if((!empty($kurs)&&$kurs->getThemaId()==$t->getId())||(!empty($thema)&&$thema->getId()==$t->getId()))
                                    selected="selected"
                                @endif
                                value="{{$t->getId()}}">{{$t->getName()}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input type="text" class="inpTitle" name="title" placeholder="Title" value="{{!empty($kurs)?$kurs->getTitel():"Title"}}" required>
        <div class="kapitel-outer-container" id="kapitel-outer-container">
            <input hidden name="kursID" value="{{!empty($kurs)?$kurs->getID():"new"}}">
            @if(!empty($kurs))
                @foreach ($kurs->getKapitel() as $kapitel)
                    <div class='kapitel-container'>
                        <div class='kapitel-header-row'>
                            {{--<input hidden name="kapitel-new" value="false">--}}
                            <input hidden {{--name="kapitel-nr"--}} class="kapitelNr" value="{{$kapitel->getKapitelNR()}}">
                            <div class="inp-container">
                                <div class="inpHeaderH2Nr">{{$kapitel->getKapitelNR()}}.</div>
                                <input class="inpHeaderH2" name="kapitel-definition-{{$kapitel->getKapitelNR()}}"
                                       value="{{$kapitel->getDefinition()}}">
                            </div>
                            <div class='kapitel-button-row-container'>
                                {{-- <button class='btn btn-primary' onclick="createDef(event)">+Def</button>--}}
                                {{--<input class='btn btn-primary' type='submit' name='newErklaerung' value='+Erklärung'/>--}}
                                <button class='btn btn-primary' type="button" onclick="createAufgabe(event)">+Übung
                                </button>
                                <input type="file" class="upload"
                                       name="erklaerungImg-{{$kapitel->getKapitelNR()}}"
                                       accept="image/png, image/jpeg"
                                />
                                {{--<input class='btn btn-primary' type='submit' name='newConstraint' value='+Einschränkung'/>--}}
                            </div>
                        </div>
                        <div class='def-container'>
                            {{--<input hidden name="erklaerung-new" value="false">--}}
                            <input hidden {{--name="erklaerung-nr"--}} class="erklaerungNr"
                                   value="{{$kapitel->getErklaerung()->getErklaerungenNr()}}">
                            <div class="inp-container">
                                <div class="inpHeaderH3Nr">{{$kapitel->getKapitelNR()}}.{{$kapitel->getErklaerung()->getErklaerungenNr()}}.
                                </div>
                                <input class="inpHeaderH3"
                                       name="erklaerung-header-{{$kapitel->getKapitelNR()}}-{{$kapitel->getErklaerung()->getErklaerungenNr()}}"
                                       value="{{$kapitel->getErklaerung()->getHeader()}}">
                            </div>
                        </div>
                        <textarea
                                name='erklaerung-{{$kapitel->getKapitelNR()}}-{{$kapitel->getErklaerung()->getErklaerungenNr()}}'
                                class='textarea-def'>{{$kapitel->getErklaerung()->getErklaerung()}}</textarea>
                        <div class="aufgaben-container">
                            @foreach ($kapitel->getAufgaben() as $aufgabe)
                                <div class="aufgabe">
                                    <div class='kapitel-header-row'>
                                        <input hidden class="aufgabenNr" value="{{$aufgabe->getAufgabenNr()}}">
                                        <div class="inp-container">
                                            <div class="inpHeaderH3Nr">{{$kapitel->getKapitelNR()}}.{{$aufgabe->getAufgabenNr()}}.</div>
                                            <div class="inpHeaderH3" {{--name="uebung-header-{{$kapitel->getKapitelNR()}}-{{$aufgabe->getAufgabenNr()}}"--}}>
                                                Aufgabe
                                            </div>
                                        </div>
                                        <div class='kapitel-button-row-container'>
                                            <button class='btn btn-primary' type="button" onclick="createLoesung(event)">
                                                +Lösung
                                            </button>
                                            <input type="file" class="upload"
                                                   name="aufgabenImg-{{$kapitel->getKapitelNR()}}-{{$aufgabe->getAufgabenNr()}}"
                                                   accept="image/png, image/jpeg"/>
                                            <button class='btn btn-secondary' type="button" onclick="deleteAufgabe(event)">
                                                Entfernen
                                            </button>
                                        </div>
                                    </div>

                                    <textarea name='aufgaben-{{$kapitel->getKapitelNR()}}-{{$aufgabe->getAufgabenNr()}}'
                                              class='textarea-def'>{{$aufgabe->getAufgabenstellung()}}</textarea>
                                    <div class='loesungen-container'>
                                        @foreach ($aufgabe->getLoesungen() as $loesung)

                                            <div class='loesung-container'>
                                                <label class='loesung-label' for='input-loesung'>Aufgaben</label>
                                                <input id='input-loesung'
                                                       name='loesung-{{$kapitel->getKapitelNR()}}-{{$aufgabe->getAufgabenNr()}}-{{$loesung->getID()}}'
                                                       value='{{$loesung->getLoesung()}}'/>
                                                <button type="button" onclick="deleteLoesung(event)" class="btn btn-cancel">x</button>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            @else
                <div class='kapitel-container'>
                    <div class='kapitel-header-row'>
                        <input hidden {{--name="kapitel-nr"--}} class="kapitelNr" value="1">
                        <div class="inp-container">
                            <div class="inpHeaderH2Nr">1.</div>
                            <input class="inpHeaderH2" name="kapitel-definition-1"
                                   placeholder="neues Kapitel">
                        </div>
                        <div class='kapitel-button-row-container'>
                            <button class='btn btn-primary' type="button" onclick="createAufgabe(event)">+Übung
                            </button>
                            <input type="file" class="upload"
                                   name="erklaerungImg-1"
                                   accept="image/png, image/jpeg"
                            />
                        </div>
                    </div>
                    <div class='def-container'>
                        <input hidden class="erklaerungNr"
                               value="1">
                        <div class="inp-container">
                            <div class="inpHeaderH3Nr">1.1.</div>
                            <input class="inpHeaderH3"
                                   name="erklaerung-header-1-1"
                                   placeholder="neue Erklärung">
                        </div>
                    </div>
                    <textarea
                            name='erklaerung-1-11'
                            class='textarea-def'></textarea>
                    <div class="aufgaben-container">
                        <div class="aufgabe">
                            <div class='kapitel-header-row'>
                                <input hidden class="aufgabenNr" value="2">
                                <div class="inp-container">
                                    <div class="inpHeaderH3Nr">1.2.</div>
                                    <div class="inpHeaderH3">
                                        Aufgabe
                                    </div>
                                </div>
                                <div class='kapitel-button-row-container'>
                                    <button class='btn btn-primary' type="button" onclick="createLoesung(event)">
                                        +Lösung
                                    </button>
                                    <input type="file" class="upload"
                                           name="aufgabenImg-1-2"
                                           accept="image/png, image/jpeg"/>
                                    <button class='btn btn-secondary' type="button" onclick="deleteAufgabe(event)">
                                        Entfernen
                                    </button>
                                </div>
                            </div>

                            <textarea name='aufgaben-1-2'
                                      class='textarea-def'></textarea>
                            <div class='loesungen-container'>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <div class="kapitelButtonContainer">
            <button class='btn btn-primary' type="button" id="btn-create-new-kapitel" onclick="newKapitel()">+ Kapitel
            </button>
        </div>
        <div class="action-button-container">
            <input class="btn btn-primary" type="submit" name="create" value="Erstellen">
            <button class="btn btn-secondary" type="button" onclick="cancelKurs(event)">Verwerfen</button>
        </div>
    </form>
@endsection

@section("cssextra")
    <link rel="stylesheet" href="css/kursedit-lehrer.css">
@endsection
<script src="js/kursedit-lehrer.js"></script>
@section("jsextra")
@endsection