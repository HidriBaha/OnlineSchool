@extends("layouts.layout")
@section("content")
    <div class="container kursinhalt">
        <!-- Dynamic Progress Bar -->


        <!-- Course Contents -->
        <input name='amount-tasks' type='hidden' value='{{ count($kurs->getKapitel()[$kapitelNr]->getAufgaben()) }}'>
        <form action='#' method='post'>
            <h1>{{$kurs->getTitel()}}</h1>
            <h3> {{$kurs->getBeschreibung()}}</h3>
            <div class="chapters">
                <div class="definition">
                    <h2>{{$kurs->getKapitel()[$kapitelNr]->getDefinition()}}</h2><br>
                    <div class="progress my-4">
                        <div id="progress-bar" class="progress-bar progress-bar-striped" role="progressbar"
                             style="width: {{round($kurs->getProgress()*100)}}%; background-color: var(--primary-btn-color);"
                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            0%
                        </div>
                    </div>
                    <h4>Übungserklärung:</h4>
                    {{$kurs->getKapitel()[$kapitelNr]->getErklaerung()->getErklaerung()}}
                    <br>
                    @if ($kurs->getKapitel()[$kapitelNr]->getErklaerung()->getImgSrc()!= NULL)
                        <br><img id='img-help' alt='Hilfsstellung IMG' src='{{$kurs->getKapitel()[$kapitelNr]->getErklaerung()->getImgSrc()}}'>
                    @endif
                    <br><br>
                    <?php
                    $userId = $_SESSION['userId']; // Assuming you store the logged-in user's ID in the session
                    ?>
                    <h3>Übungen</h3>
                    <ul>
                        <script>
                            const completedTasks = @json($completedTasks ?? []);
                            console.log(completedTasks);
                        </script>

                        @foreach ($kurs->getKapitel()[$kapitelNr]->getAufgaben() as $keyAufgaben => $aufgabe)
                            @php
                                // Check if the current task is completed
                                      $isCompleted = in_array($aufgabe->getId(), $completedTasks ?? []);

                            @endphp

                            <li>{{ $aufgabe->getAufgabenstellung() }}</li><br>
                            @if ($aufgabe->getImgSrc() != NULL)
                                <img class='img-task' alt='Aufgabe IMG' src='{{$aufgabe->getImgSrc()}}'><br>
                            @endif
                            @foreach ($aufgabe->getLoesungen() as $keyLoesungen => $loesung)
                                <input
                                        id="input-{{ $keyAufgaben }}-{{ $keyLoesungen }}"
                                        name="submitted-{{ $keyAufgaben }}-{{ $keyLoesungen }}"
                                        type="text"
                                        data-aufgabe-id="{{ $aufgabe->getId() }}"
                                        placeholder="Bitte Loesung eintragen"
                                        class="form-control form-control-lg my-4 solution-field"
                                        value="{{ $isCompleted ? htmlspecialchars($loesung->getLoesung(), ENT_QUOTES, 'UTF-8') : '' }}"
                                        {{ $isCompleted ? 'disabled' : '' }}
                                        oninput="checkSolution(this)"




                                >
{{--                                <pre>{{ print_r($completedTasks) }}</pre>--}}
                                <input type="hidden" id="hidden-solution-{{ $keyAufgaben }}-{{ $keyLoesungen }}"
                                       value="{{ htmlspecialchars($loesung->getLoesung(), ENT_QUOTES, 'UTF-8') }}">

                                <div id="feedback-{{ $keyAufgaben }}-{{ $keyLoesungen }}" class="feedback-container"></div>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
                @if(isset($kurs->getKapitel()[$kapitelNr-1]))
                <a href='/kurs-edit?kursID={{$kurs->getId()}}&kapitelNr={{$kapitelNr-1}}' class='btn btn-secondary'>vorheriges Kapitel</a>
                @endif
                @if(isset($kurs->getKapitel()[$kapitelNr+1]))
                    <a href='/kurs-edit?kursID={{$kurs->getId()}}&kapitelNr={{$kapitelNr+1}}' class='btn btn-primary'>nächstes Kapitel</a>
                @else
                    <a href='/kurs-overview?fach={{$kurs->getFach()}}&thema={{$kurs->getThema()}}' class='btn btn-primary'>zurück zur &Uuml;bersicht</a>
                @endif
            </div>
        </form>
    </div>

@endsection

@section("cssextra")
    <link rel="stylesheet" href="css/kursedit-schueler.css">
@endsection

@section("jsextra")
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            initializeProgressBar();
        });
    </script>


    <script src="js/kursedit-schueler.js"></script>



@endsection
