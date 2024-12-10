@extends("layouts.layout")
@section("content")
    <div class="container kursinhalt">
        <!-- Get some Parameters and open Form -->


       <input name='amount-tasks' type='hidden' value='{{count($kurs->getKapitel()[$kapitelNr]->getAufgaben())}}'>
        <form action='#' method='post'>
            <!-- open and close form if course is being edited -->

            <!-- Course Description -->
            <h3> {{$kurs->getBeschreibung()}}</h3>

            <!-- Course contents -->
            <div class="chapters">
                <div class="definition">
                    <h2>{{$kurs->getKapitel()[$kapitelNr]->getDefinition()}}</h2><br>
                    <h4>Übungserklärung:</h4>
                    {{$kurs->getKapitel()[$kapitelNr]->getErklaerung()->getErklaerung()}}
                    <br>
                    @if (trim($kurs->getKapitel()[$kapitelNr]->getErklaerung()->getImgSrc()) != "")
                        <br><img id='img-help' alt='Hilfsstellung IMG' src='{{$kapitel["erklaerungen"][0]["img-src"]}}'>
                    @endif
                    <br><br>

                    <h3>Übungen</h3>
                    <ul>
                        @foreach ($kurs->getKapitel()[$kapitelNr]->getAufgaben() as $aufgabe)
                            <li>{{$aufgabe->getAufgabenstellung()}}</li><br>
                            @if (trim($aufgabe->getImgSrc()) != "")
                                <img class='img-task' alt='Aufgabe IMG' src='{{$aufgabe->getImgSrc()}}'><br>
                            @endif
                            @foreach ($aufgabe->getLoesungen() as $loesung)
                                <input id='input-{{$keyAufgaben}}-{{$keyLoesungen}}'
                                       name='submitted-$taskCounter-{{$keyLoesungen}}'
                                       type='text'
                                       placeholder='Bitte Loesung eintragen'
                                       class='form-control form-control-lg my-4 solution-field'
                                       oninput='checkSolution(this)'>

                                {{--Extract the hidden correct solution from $aufgabe['loesungen']--}}
                                <input type='hidden' id='hidden-solution-{{$aufgabe->getId}}'
                                       value='{{htmlspecialchars($loesung->getLoesung(), ENT_QUOTES, ' UTF-8')}}'>
                                <br><br>
                            @endforeach
                        @endforeach

                    </ul>
                    <div></div>
                </div>
                @if(isset($kurs->getKapitel()[$kapitelNr+1]))
                    <a href='/kurs-edit?kursID={{$kurs->getId()}}&kapitelNr={{$kapitelNr+1}}' class='btn btn-primary'>nächstes Kapitel</a>
                @else
                    <a href='/kurs-overview?fach={{$fach}}&thema={{$thema}}' class='btn btn-primary'>zurück zur &Uuml;bersicht</a>
                @endif
            </div>
        </form>
    </div>

@endsection

@section("cssextra")
    <link rel="stylesheet" href="/css/kursedit-schuler.css">
@endsection

@section("jsextra")
    <script src="/js/kursedit-schueler.js"></script>
    <script>
        // Expose PHP session variable to JavaScript
        const role = <?php echo isset($_SESSION['role']) ? json_encode($_SESSION['role']) : 'null'; ?>;
    </script>
@endsection