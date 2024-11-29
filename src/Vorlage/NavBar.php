<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/Vorlage/NavBar.css" rel="stylesheet">
    <title>NavBar Vorlage</title>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F2F6F9;">
    <div class="container">
        <!-- Schullogo links -->
        <a class="navbar-brand" href="/index.php">
            <img src="/img/logo.png" class="logo" alt="Schullogo">
        </a>

        <!-- Navbar-Links (Links ausgerichtet) -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/kurs-overview/kurs-overview.php?thema=geometrie">Geometrie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kurs-overview/kurs-overview.php?thema=zahlenmenge">Zahlenmenge</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/kurs-overview/kurs-overview.php?thema=rechengesetze">Rechengesetze</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Wiederholen</a>
                </li>
            </ul>
        </div>

        <!-- Symbole rechts -->
        <div class="d-flex">
            <!-- Kommunikationssymbol -->
            <div class="nav-item me-3" id="ChatButton">
                <a href="/kommunikation/Kommunikation.php" class="nav-link">
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
                    <li><a class="dropdown-item" href="/login/logout.php">Abmelden</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<script>
    const role = <?php echo isset($_SESSION['role']) ? json_encode($_SESSION['role']) : 'null'; ?>;
    console.log("Role from PHPNavbar222222:", role);

    document.getElementById("profileIcons").addEventListener("click", function(event) {
        console.log("Profile icon clicked");
    });

</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="../Vorlage/NavBar.js"></script>
</body>
</html>
