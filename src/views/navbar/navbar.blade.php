@php
    require_once $_SERVER['DOCUMENT_ROOT']. '/../models/Faecher.php';
    require_once $_SERVER['DOCUMENT_ROOT']. '/../models/Themen.php';
    $faecher = \models\get_Faecher();
@endphp
<!DOCTYPE html>
<html lang="de">
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F2F6F9;">
    <div class="container">
        <!-- Schullogo links -->
        <a class="navbar-brand" href="/">
            <img src="/img/logo.png" class="logo" alt="Schullogo">
        </a>
        <!-- Navbar-Links (Links ausgerichtet) -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @if(sizeof($faecher) > 0)
                    @foreach($faecher as $fach)
                        <li class="nav-item">
                            <a class="subject nav-link dropdown-toggle" href="#" id="{{$fach["name"]}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{$fach["name"]}}</a>
                            <ul class="dropdown-menu" aria-labelledby="{{$fach["name"]}}">
                                @php
                                    $themen = \models\get_Themen($fach["id"]);
                                @endphp
                                @if(sizeof($themen) > 0)
                                    @foreach($themen as $thema)
                                        @php
                                            $path = "/kurs-overview?fach=". $fach["name"]. "&thema=". $thema["name"];
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
        <!-- Symbole rechts -->
        <div class="d-flex">
            <!-- Suchleiste -->
            <form method="get" id="searchBar" class="nav-item">
                <div class="form-group mb-2">
                    <input type="text" name="search" class="form-control" id="searchInput" placeholder="Suchbegriff eingeben" required>
                </div>
                <!-- Der Button ist versteckt, aber das Formular kann trotzdem mit Enter abgesendet werden -->
                <input type="submit" style="display:none;">
            </form>
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
                    <li><a class="dropdown-item" href="/reqistrieren">Registrieren</a></li>
                    <li><a class="dropdown-item" href="/users">Useransicht</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
@if(isset($_GET["search"]))
    <div id="popup" class="popup">
        <div class="popup-content">
            <h2>Suchergebnisse</h2>
            <p>Hier können Sie die Suchergebnisse oder andere relevante Informationen anzeigen.</p>
            <button id="close-popup">Schließen</button>
        </div>
    </div>

    <style>
        .popup {
            display: none; /* Standardmäßig nicht sichtbar */
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        .popup-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 600px;
        }
    </style>

@endif


<script>
    const role = <?php echo isset($_SESSION['role']) ? json_encode($_SESSION['role']) : 'null'; ?>;
    console.log("Role from PHPNavbar:", role);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/navbar.js"></script>
</html>
