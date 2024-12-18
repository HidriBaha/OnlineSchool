@extends("layouts.layout")
@section("content")
    <section class="container mt-4">
        <!-- Fortschrittsbereich -->
        <div class="container mt-4">
            <!-- Fortschrittsbereich (Sichtbar für Schüler) -->
            <div id="progressSection" style="display: block;">
                <h2>Fortschritt</h2>
                <!-- Geometrie I -->
                @foreach ($kurse as $thema => $kursePerThema)
                @foreach ($kursePerThema as $kurs)

                <div class="progress-container mb-4">
                    <h5>{{$kurs->getTitel()}}</h5>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: {{round($kurs->getProgress()*100)}}%; background-color: var(--primary-btn-color);"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                           {{round($kurs->getProgress()*100)}}%
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach

            </div>

            <!-- Kursbereich -->
            <!-- Meine Kurse Bereich -->
            <h2 class="mt-4">Meine Kurse</h2>
            <div class="row">

                @foreach ($kurse as $thema => $kursePerThema)
                    @foreach ($kursePerThema as $kurs)
                <!-- Kurskarte 1 - Geometrie -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                        <i @if($thema=="Zahlenmenge") class="bi bi-calculator"  @else class="bi bi-rulers" @endif style="font-size: 3rem; color: var(--primary-btn-color);"></i>
                            <!-- Symbol für Geometrie -->
                            <h5 class="card-title mt-3">{{$kurs->getTitel()}}</h5>
                            <p class="card-text"> {{$kurs->getBeschreibung()}}</p>
                            <a href="/kurs-edit?kursID={{$kurs->getID()}}"
                               class="btn btn-primary">Zum Kurs</a>
                        </div>
                    </div>
                </div>
                @endforeach
                @endforeach

            </div>

            <!-- Communication Section -->
            <div id="communicationTable" style="display: none;">
                <h2>Kommunikation</h2>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Empfänger</th>
                        <th>Betreff</th>
                        <th>Gesendet am</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Messages go here -->


                    @foreach($recentMessages as $message)

                        <tr>
                            <td> {{htmlspecialchars($message['recipient'])}}</td>
                            <td> {{htmlspecialchars($message['topic'])}}</td>
                            <td>{{htmlspecialchars($message['date'])}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <a href="/kommunikation/Kommunikation.php" class="btn btn-primary mt-3">Alle Nachrichten anzeigen</a>


            </div>
        </div>
    </section>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

    <!-- Link to main.js -->
@endsection
@section("cssextra")


