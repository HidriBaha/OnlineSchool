@extends("layouts.layout")

@section("content")
    <div class=container>

        @if ($userList->num_rows > 0)
            <h2>Benutzerübersicht</h2>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Vorname</th>
                    <th>Nachname</th>
                    <th>Rolle</th>
                    <th>Geburtsdatum</th>
                    <th>Adresse</th>
                </tr>
                @while($row = $userList->fetch_assoc())
                    <tr>
                        <td> {{htmlspecialchars($row['ID'])}}  </td>
                        <td> {{htmlspecialchars($row['EMAIL'])}}  </td>
                        <td> {{htmlspecialchars($row['VORNAME'])}}  </td>
                        <td> {{htmlspecialchars($row['NACHNAME'])}}  </td>
                        <td> {{htmlspecialchars($row['ROLLE'])}}  </td>
                        <td> {{htmlspecialchars($row['GEBURTSDATUM'])}}  </td>
                        <td> {{htmlspecialchars($row['ADRESSE'])}}  </td>
                    </tr>
                @endwhile
            </table>
        @else

            <h1> Keine Benutzer gefunden</h1>

        @endif


    </div>

@endsection
@section("cssextra")
    <link rel="stylesheet" href="/css/alluser.css">
@endsection



