@extends("layouts.layout")
@section("content")
    <div class="container">
        <h1>
            {{$kurs["titel"]}}
        </h1>
        <div class="kapitel-outer-container">

            @foreach ($kurs["kapitel"] as $keyKapitel => $kapitel)
                <div class='kapitel-container'>
                    <div class='kapitel-header-row'>
                        <h2>{{$keyKapitel + 1}}.{{$kapitel["definition"]}} </h2>
                        <form class='kapitel-button-row-container' method='post'>
                            <input class='btn btn-primary' type='submit' name='newDef' value='+Def'/>
                            <input class='btn btn-primary' type='submit' name='newErklaerung' value='+Erklärung'/>
                            <input class='btn btn-primary' type='submit' name='newUebung' value='+Übung'/>
                            <input class='btn btn-primary' type='submit' name='newConstraint' value='+Einschränkung'/>
                        </form>
                    </div>

                    @foreach ($kapitel["erklaerungen"] as $keyDef => $def)
                        <div class='def-container'><h3>{{$keyKapitel + 1}}.{{$keyDef + 1}}.{{$def["header"]}} </h3></div>
                        <textarea name='erklaerung' class='textarea-def'>{{$def["erklaerung"]}}</textarea>
                    @endforeach
                    @foreach ($kapitel["aufgaben"] as $keyAufgabe => $aufgabe)
                        <div class='kapitel-header-row'>
                            <div class='def-container'>
                                <h3>{{$keyKapitel + 1}}.{{$keyAufgabe + 1}} Übung</h3>
                            </div>

                            <form class='kapitel-button-row-container' method='post'>
                                <input class='btn btn-primary'
                                       type='submit'
                                       name='newConstraint'
                                       value='+Lösung'/>
                            </form>
                        </div>

                        <textarea name='aufgaben' class='textarea-def'>{{$aufgabe["aufgabenstellung"]}}</textarea>
                        <div class='loesungen-container'>
                            @foreach ($aufgabe["loesungen"] as $keyLoesung => $loesung)

                                <div class='loesung-container'><label class='loesung-label'
                                                                      for='input-loesung'>Aufgaben</label>
                                    <input id='input-loesung'
                                           name='{{$keyKapitel}}.{{$keyDef}}.{{$keyAufgabe}}.{{$keyLoesung}}'
                                           value='{{$loesung}}'/>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            @endforeach

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

@section("jsextra")
@endsection