<!doctype html>
<html class="no-js" lang="DE">
<head>
    <meta charset="utf-8">
    <title>E-Mensa Routing Script</title>
    <meta name="description" content="unused">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/style.css">
    @yield("cssextra")
    <!-- good developers check the markup ;) -->
</head>
<body>
<header>
    @include('navbar.navbar')
</header>
<main>
    @yield("content")
</main>
@yield("jsextra")
</body>

</html>
