@php
    require_once $_SERVER['DOCUMENT_ROOT']. '/../models/Faecher.php';
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
                @foreach($faecher as $fach)
                    <li class="nav-item">
                        <a class="nav-link" href="/kurs-overview?fach={{$fach["name"]}}">{{$fach["name"]}}</a>
                    </li>
                @endforeach
                <li class="nav-item">
                    <a class="nav-link" href="/kurs-overview?fach=Mathe&thema=geometrie">Geometrie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kurs-overview?fach=Mathe&thema=zahlenmengen">Zahlenmenge</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kurs-overview?fach=Mathe&thema=rechengesetze">Rechengesetze</a>
                </li>
                {{--                <li class="nav-item">
                                    <a class="nav-link" href="#">Wiederholen</a>
                                </li>--}}
            </ul>
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
                    <li><a class="dropdown-item" href="/reqistrieren">Registrieren</a></li>
                    <li><a class="dropdown-item" href="/users">Useransicht</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
<script>
    const role = <?php echo isset($_SESSION['role']) ? json_encode($_SESSION['role']) : 'null'; ?>;
    console.log("Role from PHPNavbar:", role);
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/navbar.js"></script>
</html>
