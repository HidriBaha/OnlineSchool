@extends("layouts.layout")
@section("content")
    <div class="container kursinhalt">
        <!-- Dynamic Progress Bar -->
        <div class="progress my-4">
            <div id="progress-bar" class="progress-bar progress-bar-striped" role="progressbar"
                 style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                0%
            </div>
        </div>

        <!-- Course Contents -->
        <input name='amount-tasks' type='hidden' value='{{ count($kurs->getKapitel()[$kapitelNr]->getAufgaben()) }}'>
        <form action='#' method='post'>
            <h3> {{$kurs->getBeschreibung()}}</h3>
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
                        @foreach ($kurs->getKapitel()[$kapitelNr]->getAufgaben() as $keyAufgaben => $aufgabe)
                            <li>{{ $aufgabe->getAufgabenstellung() }}</li><br>
                            @if (trim($aufgabe->getImgSrc()) != "")
                                <img class='img-task' alt='Aufgabe IMG' src='{{ $aufgabe->getImgSrc() }}'><br>
                            @endif
                            @foreach ($aufgabe->getLoesungen() as $keyLoesungen => $loesung)
                                <input id="input-{{$keyAufgaben}}-{{$keyLoesungen}}"
                                       name="submitted-{{$keyAufgaben}}-{{$keyLoesungen}}"
                                       type="text"
                                       placeholder="Bitte Loesung eintragen"
                                       class="form-control form-control-lg my-4 solution-field"
                                       oninput="checkSolution(this)">

                                <input type="hidden" id="hidden-solution-{{$keyAufgaben}}-{{$keyLoesungen}}"
                                       value="{{ htmlspecialchars($loesung->getLoesung(), ENT_QUOTES, 'UTF-8') }}">

                                <div id="feedback-{{$keyAufgaben}}-{{$keyLoesungen}}" class="feedback-container"></div>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </form>
    </div>
@endsection

@section("cssextra")
    <link rel="stylesheet" href="/css/kursedit-schueler.css">
@endsection

@section("jsextra")
    <script src="/js/kursedit-schueler.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initializeProgressBar();
        });
    </script>
@endsection
