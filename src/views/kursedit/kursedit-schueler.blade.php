@extends("layouts.layout")
@section("content")
    <div class="container kursinhalt">
        <!-- Get some Parameters and open Form -->

        <input name='amount-tasks' type='hidden' value='{{count($kapitel['aufgaben'])}}'>
        <form action='#' method='post'>
            <!-- open and close form if course is being edited -->

            <!-- Course Description -->
            <h3> {{$kursBeschreibung}}</h3>

            <!-- Course contents -->
            <div class="chapters">
                <div class="definition">
                    <h2>{{$kapitel['definition']}}</h2><br>
                    <h4>Übungserklärung:</h4>
                    {{$kapitel['erklaerungen'][0]['erklaerung']}};
                    @if (trim($kapitel['erklaerungen'][0]['img-src']) != "")
                        <br><img id='img-help' alt='Hilfsstellung IMG' src='{{$kapitel["erklaerungen"][0]["img-src"]}}'>
                    @endif
                    <br><br>

                    <h3>Übungen</h3>
                    <ul>
                        @foreach ($kapitel['aufgaben'] as $keyAufgaben=> $aufgabe)
                            <li>{{$aufgabe['aufgabenstellung']}}</li><br>
                            @if (trim($aufgabe['img-src']) != "")
                                <img class='img-task' alt='Aufgabe IMG' src='{{$aufgabe["img-src"]}}'><br>
                            @endif
                            @foreach ($aufgabe['loesungen'] as $keyLoesungen=> $loesung)
                                <input id='input-{{$keyAufgaben}}-{{$keyLoesungen}}'
                                       name='submitted-$taskCounter-{{$keyLoesungen}}'
                                       type='text'
                                       placeholder='Bitte Loesung eintragen'
                                       class='form-control form-control-lg my-4 solution-field'
                                       oninput='checkSolution(this)'>

                                {{--Extract the hidden correct solution from $aufgabe['loesungen']--}}
                                <input type='hidden' id='hidden-solution-{{$keyAufgaben}}-{{$keyLoesungen}}'
                                       value='{{htmlspecialchars($loesung, ENT_QUOTES, ' UTF-8')}}'>
                                <br><br>
                            @endforeach
                        @endforeach

                    </ul>
                    <div></div>
                </div>
                <a href='/kurs-overview?thema={{$thema}}&kursID={{$kursID}}' class='btn btn-primary'>zurück zur &Uuml;bersicht</a>
            </div>
        </form>
    </div>

@endsection

@section("cssextra")
    <link rel="stylesheet" href="/css/kursedit-schuler.css">
@endsection

@section("jsextra")
    <script src="/js/kursedit-schuler.js"></script>
    <script>
        // Expose PHP session variable to JavaScript
        const role = <?php echo isset($_SESSION['role']) ? json_encode($_SESSION['role']) : 'null'; ?>;
    </script>
@endsection