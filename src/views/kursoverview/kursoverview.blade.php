@extends("layouts.layout")
@section("content")
    <div class="container outer">
        <div class="list">
            <div class="Aufgabe-container">
                <div class="course-title">{{$kurseTitle[$_GET[THEMA] ?? "geometrie"]}}</div>
                <div class="progress-container mb-4">
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" style="width: 60%; background-color: #236C93;"
                             aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">
                            60%
                        </div>
                    </div>
                </div>
            </div>
            <div class="kurs-liste">
                @foreach($kurseThema as $key => $kursPerThema)
                    <div class='course-container'>
                        <div class='course-title'> {{$kursPerThema["titel"]}}  </div>
                        <div class='progress-container mb - 4'>
                            <div class='progress'>
                                <div class='progress-bar' role='progressbar'>
                                    60 %
                                </div>
                            </div>
                        </div>
                        <p class='course-description'> {{$kursPerThema["beschreibung"] }} </p>
                        <div hidden class='image-store'> {{$kursPerThema["img"] }} </div>
                        <a href='/edit-kurs?thema={{$thema}}&kursID={{$key}}' class='btn btn-primary'> Kurs
                            starten </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="preview-container" id="preview-container">
            <div></div>
        </div>
@endsection

@section("cssextra")
    <link rel="stylesheet" href="/css/kursoverview.css" >
@endsection

@section("jsextra")
            <script src="/js/kursoverview.js"></script>
@endsection