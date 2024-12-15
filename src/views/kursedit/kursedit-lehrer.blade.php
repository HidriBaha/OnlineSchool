@extends("layouts.layout")
@section("content")
    <form class="container" action="/kurs-update" method="post">
        <input type="text" class="inpTitle" name="title" value="{{$kurs->getTitel()}}">
        <div class="kapitel-outer-container" id="kapitel-outer-container">
            <input hidden name="kursID" value="{{$kurs->getID()}}">

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
                            <div class="aufgabe" >
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
        </div>
        <div class="kapitelButtonContainer">
            <button class='btn btn-primary' type="button" id="btn-create-new-kapitel" onclick="newKapitel()">+ Kapitel
            </button>
        </div>
        <div class="action-button-container">
            <input class="btn btn-primary" type="submit" value="Erstellen">
            <input class="btn btn-secondary" type="submit" value="Verwerfen">
        </div>
    </form>
@endsection

@section("cssextra")
    <link rel="stylesheet" href="css/kursedit-lehrer.css">
@endsection
<script src="js/kursedit-lehrer.js"></script>
@section("jsextra")
@endsection