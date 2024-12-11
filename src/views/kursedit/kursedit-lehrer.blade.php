@extends("layouts.layout")
@section("content")
    <div class="container">
        <input type="text" class="inpTitle" value="{{$kurs->getTitel()}}">
        <div class="kapitel-outer-container" id="kapitel-outer-container">


            @foreach ($kurs->getKapitel() as $kapitel)
                <div class='kapitel-container'>
                    <div class='kapitel-header-row'>
                            <input hidden name="kapitel-new" value="false">
                            <input hidden name="kapitel-nr" class="kapitelNr" value="{{$kapitel->getKapitelNR()}}">
                        <div class="inp-container">
                            <div class="inpHeaderH2Nr">{{$kapitel->getKapitelNR()}}. </div>
                            <input class="inpHeaderH2" value="{{$kapitel->getDefinition()}}">
                        </div>
                        <div class='kapitel-button-row-container'>
                           {{-- <button class='btn btn-primary' onclick="createDef(event)">+Def</button>--}}
                            {{--<input class='btn btn-primary' type='submit' name='newErklaerung' value='+Erklärung'/>--}}
                            <button class='btn btn-primary' onclick="createUebungen(event)">+Übung</button>
                            {{--<input class='btn btn-primary' type='submit' name='newConstraint' value='+Einschränkung'/>--}}
                        </div>
                    </div>
                    <div class='def-container'>
                        <div class="inp-container">
                            <div class="inpHeaderH3Nr">{{$kapitel->getKapitelNR()}}.{{$kapitel->getErklaerung()->getErklaerungenNr()}}. </div>
                            <input class="inpHeaderH3" value="{{$kapitel->getErklaerung()->getHeader()}}">
                        </div>
                        </div>
                    <textarea name='erklaerung'
                              class='textarea-def'>{{$kapitel->getErklaerung()->getErklaerung()}}</textarea>
                    <div class="aufgaben-container">
                        @foreach ($kapitel->getAufgaben() as $aufgabe)
                            <div class='kapitel-header-row'>
                                <div class="inp-container">
                                    <input hidden name="aufgabenNr"  class="aufgabenNr" value="{{$aufgabe->getAufgabenNr()}}">
                                    <div class="inpHeaderH3Nr">{{$kapitel->getKapitelNR()}}.{{$aufgabe->getAufgabenNr()}}. </div>
                                    <input class="inpHeaderH3"
                                       value="&Uuml;bung">
                                </div>
                                <div class='kapitel-button-row-container'>
                                    <button class='btn btn-primary' onclick="createLoesung(event)">+Lösung</button>
                                </div>
                            </div>

                            <textarea name='aufgaben'
                                      class='textarea-def'>{{$aufgabe->getAufgabenstellung()}}</textarea>
                            <div class='loesungen-container'>
                                @foreach ($aufgabe->getLoesungen() as $loesung)

                                    <div class='loesung-container'><label class='loesung-label'
                                                                          for='input-loesung'>Aufgaben</label>
                                        <input id='input-loesung'
                                               name='loesung-{{$loesung->getID()}}'
                                               value='{{$loesung->getLoesung()}}'/>
                                    </div>
                                @endforeach
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
        <div class="kapitelButtonContainer">
            <button class='btn btn-primary' id="btn-create-new-kapitel" onclick="newKapitel()">+ Kapitel</button>
        </div>
        <form class="action-button-container" method="post">
            <input class="btn btn-primary" type="submit" value="Erstellen" name="create">
            <input class="btn btn-secondary" type="submit" value="Verwerfen" name="discard">
        </form>
    </div>
@endsection

@section("cssextra")
    <link rel="stylesheet" href="/css/kursedit-lehrer.css">
@endsection
<script src="/js/kursedit-lehrer.js"></script>
@section("jsextra")
@endsection