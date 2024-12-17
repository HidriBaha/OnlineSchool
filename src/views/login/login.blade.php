<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css"
    >
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
<header>
    
</header>
<div class="login-container">
    <div class="logo">
        <img src="/img/logo.png" alt="Logo"> <!-- Adjust image path -->
    </div>
    <h2>Login</h2>
    <form action="/verifyLogin" method="post">
        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Passwort:</label>
        <input type="password" id="password" name="password" required>
        <input type="submit" value="Einloggen" class="btn btn-primary">
    </form>
</div>
</body>
</html>