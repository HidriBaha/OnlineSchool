@extends("layouts.layout")
@section("content")
    <div class="container">
        <h1>
            {{$kurs->getTitel()}}
        </h1>
        <div class="kapitel-outer-container" id="kapitel-outer-container">


            @foreach ($kurs->getKapitel() as $kapitel)
                <div class='kapitel-container'>
                    <div class='kapitel-header-row'>
                        <h2>{{$kapitel->getKapitelNR()}}. {{$kapitel->getDefinition()}} </h2>
                        <form class='kapitel-button-row-container' method='post'>
                            <input class='btn btn-primary' type='submit' name='newDef' value='+Def'/>
                            {{--<input class='btn btn-primary' type='submit' name='newErklaerung' value='+Erklärung'/>--}}
                            <input class='btn btn-primary' type='submit' name='newUebung' value='+Übung'/>
                            {{--<input class='btn btn-primary' type='submit' name='newConstraint' value='+Einschränkung'/>--}}
                        </form>
                    </div>
                    <div class='def-container'><h3>{{$kapitel->getKapitelNR()}}
                            .{{$kapitel->getErklaerung()->getErklaerungenNr()}}
                            . {{$kapitel->getErklaerung()->getHeader()}} </h3></div>
                    <textarea name='erklaerung'
                              class='textarea-def'>{{$kapitel->getErklaerung()->getErklaerung()}}</textarea>
                    @foreach ($kapitel->getAufgaben() as $aufgabe)
                        <div class='kapitel-header-row'>
                            <div class='def-container'>
                                <h3>{{$kapitel->getKapitelNR()}}.{{$aufgabe->getAufgabenNr()}}. &Uuml;bung</h3>
                            </div>

                            <form class='kapitel-button-row-container' method='post'>
                                <input class='btn btn-primary'
                                       type='submit'
                                       name='newConstraint'
                                       value='+Lösung'/>
                            </form>
                        </div>

                        <textarea name='aufgaben' class='textarea-def'>{{$aufgabe->getAufgabenstellung()}}</textarea>
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