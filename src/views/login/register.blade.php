@extends("layouts.layout")

@section("content")
    <div class="container">
        <h2 class="Benutzerregistrierung">Benutzerregistrierung</h2>
        <form action="/registerUser" method="post">
            <label for="email">E-Mail:</label>
            <input type="email" id="email" name="email" required><br><br>

            <label for="password">Passwort:</label>
            <input type="password" id="password" name="password" required><br><br>

            <label for="vorname">Vorname:</label>
            <input type="text" id="vorname" name="vorname" required><br><br>

            <label for="nachname">Nachname:</label>
            <input type="text" id="nachname" name="nachname" required><br><br>

            <label for="geburtsdatum">Geburtsdatum:</label>
            <input type="date" id="geburtsdatum" name="geburtsdatum" required><br><br>

            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" required><br><br>

            <label for="role">Rolle:</label>
            <select id="role" name="role" required>
                <option value="schüler">Schüler</option>
                <option value="lehrer">Lehrer</option>
                <option value="eltern">Eltern</option>
                <option value="admin">Admin</option>
            </select><br><br>

            <input type="submit" value="Registrieren" class="btn btn-primary    ">
        </form>
    </div>

@endsection

@section("cssextra")
    <link rel="stylesheet" href="/css/register.css">
@endsection
