@php
    require_once $_SERVER['DOCUMENT_ROOT']. '/../models/Faecher.php';
    require_once $_SERVER['DOCUMENT_ROOT']. '/../models/Thema.php';
    require_once $_SERVER['DOCUMENT_ROOT']. '/../models/Suche.php';
    $faecher = \models\get_Faecher();
@endphp
<!DOCTYPE html>
<html lang="de">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container" id="navbar-container">
        <!-- Schullogo links -->
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" class="logo" alt="Schullogo">
        </a>
        <!-- Navbar-Links (Links ausgerichtet) -->
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                @if(sizeof($faecher) > 0)
                    @foreach($faecher as $fach)
                        <li class="nav-item">
                            <a class="subject nav-link dropdown-toggle" href="#" id="{{$fach["name"]}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$fach["NAME"]}}</a>
                            <ul class="dropdown-menu" aria-labelledby="{{$fach["NAME"]}}">
                                @php
                                    $themen = \models\get_Themen($fach["ID"]);
                                @endphp
                                @if(sizeof($themen) > 0)
                                    @foreach($themen as $thema)
                                        @php
                                            $path = "/kurs-overview?fach=". $fach["NAME"]. "&thema=". $thema["name"];
                                        @endphp
                                        <li><a class ="dropdown-item" href="{{$path}}">{{$thema["name"]}}</a></li>
                                    @endforeach
                                @else
                                    <li><span class="dropdown-item">Keine Kurse gefunden.</span></li>
                                @endif
                            </ul>
                        </li>
                    @endforeach
                @endif
            </ul>
        </div>

        <!-- Suchleiste -->
        <div id="FlexSearch">
            <form method="POST" id="searchForm" class="nav-item">
                <input type="text" name="search" class="form-control" id="searchInput" placeholder="Suchbegriff eingeben" required>
                <input type="submit" id="navbar-search-input">
            </form>
        </div>

        <!-- Symbole rechts -->
        <div class="d-flex">
            <!-- Kommunikationssymbol -->
            <div class="nav-item me-3" id="ChatButton">
                <a href="/kommunikation" class="nav-link">
                    <i class="bi bi-chat-dots" style="font-size: 1.5rem;"></i>
                </a>
            </div>

            <!-- Benutzersymbol -->
            <div class="nav-item dropdown">
                <a href="#" class="nav-link" id="profileIcons" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-circle" style="font-size: 1.5rem;"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" id="profileDropdown2">
                    <li><a class="dropdown-item" href="#">Profil ansehen</a></li>
                    <li><a class="dropdown-item" href="#">Einstellungen</a></li>
                    <li><a class="dropdown-item" href="/logout">Abmelden</a></li>
                    @if(($_SESSION["role"]??null)=="admin")
                        <li><a class="dropdown-item" href="/registrieren">Registrieren</a></li>
                        <li><a class="dropdown-item" href="/users">Useransicht</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>
@if(isset($_POST["search"]))
    <div id="popup" class="popup">
        <div class="popup-content">
            <h2>Suchergebnisse</h2>
            @php
                $results = \models\get_SearchResult($_POST["search"]);
            @endphp
            @if(count($results) > 0)
                @foreach($results as $table => $result)
                    @foreach($result as $row)
                        @php
                            $path = "";
                            $description = "";
                        @endphp
                        @switch($table)
                            @case("faecher")
                                @php
                                    $title = $row["fach"];
                                    $path = "/kurs-overview?fach=". strtolower($row["fach"]);
                                @endphp
                                @break
                            @case("thema")
                                @php
                                    $title = $row["thema"];
                                    $path = "/kurs-overview?fach=". $row["fach"]. "&thema=". $row["thema"];
                                @endphp
                                @break
                            @case("kurse")
                                @php
                                    $title = "Kurs ". $row["kurs"];
                                    $description = $row["beschreibung"];
                                    $path = "/kurs-edit?kursID=".  strval(intval($row["id"]));
                                @endphp
                                @break
                            @case("kapitel")
                                @php
                                    $title = "Kurs ". $row["kurs"];
                                    $description = "<b>". "Kapitel ". $row["kapitel_nr"]. "<br>". $row["header"]. "</b>". "<br><br>". $row["erklaerung"];
                                    $path = "/kurs-edit?kursID=". strval(intval($row["id"])). "&kapitelNr=". strval(intval($row["kapitel_nr"]));
                                @endphp
                                @break
                        @endswitch
                            <div class="container mt-4">
                                <div class="row row-cols-1 g-4">
                                    <div class="col">
                                        <div class="card h-100">
                                            <div class="card-header">
                                                <h5 class="card-title mb-0">{{$title}}</h5>
                                            </div>
                                            <p id="searchResultDescription">{!! $description !!}</p>
                                            <div class="card-body" id="searchResultCards">
                                                <a class="btn btn-primary" href="{{$path}}">Zum Ergebnis</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @endforeach
            @else
                <p>Keine Ergebnisse gefunden.</p>
            @endif
            <button class="btn btn-primary" id="close-popup">Schließen</button>
        </div>
    </div>

@endif


<script>
    const role = <?php echo isset($_SESSION['role']) ? json_encode($_SESSION['role']) : 'null'; ?>;
    console.log("Role from PHPNavbar:", role);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/navbar.js"></script>
</html>
