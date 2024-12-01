@extends("layouts.layout")
@section("content")
    <section class="container mt-4">
        <!-- Fortschrittsbereich -->
        <div class="container mt-4">
            <!-- Fortschrittsbereich (Sichtbar für Schüler) -->
            <div id="progressSection" style="display: block;">
                <h2>Fortschritt</h2>
                <!-- Geometrie I -->
                <div class="progress-container mb-4">
                    <h5>Geometrie I</h5>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 60%; background-color: #236C93;"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                            60%
                        </div>
                    </div>
                </div>

                <!-- Geometrie II -->
                <div class="progress-container mb-4">
                    <h5>Geometrie II</h5>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 0; background-color: #236C93;"
                             aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                            0%
                        </div>
                    </div>
                </div>

                <!-- Geometrie III -->
                <div class="progress-container mb-4">
                    <h5>Geometrie III</h5>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 100%; background-color: #236C93;"
                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                            100%
                        </div>
                    </div>
                </div>
            </div>
            <!-- Kursbereich -->
            <!-- Meine Kurse Bereich -->
            <h2 class="mt-4">Meine Kurse</h2>
            <div class="row">
                <!-- Kurskarte 1 - Geometrie -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="bi bi-rulers" style="font-size: 3rem; color: #236C93;"></i>
                            <!-- Symbol für Geometrie -->
                            <h5 class="card-title mt-3">Geometrie I</h5>
                            <p class="card-text"> {{$kurse["geometrie"][0]["beschreibung"]}}</p>
                            <a href="/kurs-edit?thema=geometrie&kursID=0"
                               class="btn btn-primary">Zum Kurs</a>
                        </div>
                    </div>
                </div>

                <!-- Kurskarte 2 - Zahlenmenge -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="bi bi-calculator" style="font-size: 3rem; color: #236C93;"></i>
                            <!-- Symbol für Zahlenmenge -->
                            <h5 class="card-title mt-3">Zahlenmenge</h5>
                            <p class="card-text"> {{$kurse["zahlenmenge"][0]["beschreibung"]}}</p>
                            <a href="/kurs-edit?thema=zahlenmenge&kursID=0"
                               class="btn btn-primary">Zum Kurs</a>
                        </div>
                    </div>
                </div>

                <!-- Kurskarte 3 - Rechengesetze -->
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <i class="bi bi-journal-text" style="font-size: 3rem; color: #236C93;"></i>
                            <!-- Symbol für Rechengesetze -->
                            <h5 class="card-title mt-3">Rechengesetze</h5>
                            <p class="card-text">{{$kurse["rechengesetze"][0]["beschreibung"]}}</p><br>
                            <a href="/kurs-edit?thema=rechengesetze&kursID=0"
                               class="btn btn-primary">Zum Kurs</a>
                        </div>
                    </div>
                </div>
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


