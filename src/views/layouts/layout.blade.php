<!doctype html>
<html class="no-js" lang="DE">
<head>
    <meta charset="utf-8">
    <title>Learning-Plattform</title>
    <meta name="description" content="unused">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/navbar.css">
    @yield("cssextra")
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
