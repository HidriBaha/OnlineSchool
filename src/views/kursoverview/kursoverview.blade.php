@extends("layouts.layout")
@section("content")
    <div class="container outer">
        <div class="list">
            @foreach(array_keys($kurse) as $thema)
                <div class="Aufgabe-container">
                    <div class="course-title">{{$thema}}</div>
                    @if ($_SESSION['role'] == 'admin')
                        <a class="btn btn-primary left" href="/kurs-edit?kursID=new&fach={{$kurse[$thema][0]->getFach()}}&thema={{$kurse[$thema][0]->getThema()}}">+ Kurs</a>
                    @endif
                </div>
                <div class="kurs-liste">
                    @foreach($kurse[$thema] as $key => $kurs)
                        <div class='course-container'>
                            <div class='course-title'> {{$kurs->getTitel()}}  </div>
                            <div class='progress-container mb - 4'>
                                <div class='progress'>
                                    <div class='progress-bar' role='progressbar' style ="width: {{round($kurs->getProgress()*100)}}%">
                                        {{round($kurs->getProgress() * 100, 2)}} %
                                    </div>
                                </div>
                            </div>
                            <p class='course-description'> {{$kurs->getBeschreibung() }} </p>
                            <div hidden class='image-store'> {{$kurs->getImg() }} </div>
                            <a href='/kurs-edit?kursID={{$kurs->getId()}}' class='btn btn-primary'> Kurs
                                starten </a>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="preview-container" id="preview-container">
            <div></div>
        </div>
        @endsection

        @section("cssextra")
            <link rel="stylesheet" href="/css/kursoverview.css">
        @endsection

        @section("jsextra")
            <script src="/js/kursoverview.js"></script>
@endsection