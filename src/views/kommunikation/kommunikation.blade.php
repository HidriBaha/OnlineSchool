@extends("layouts.layout")
@section("content")
<section class="container mt-4">
    <div id="container">
        <button id="openChatBtn" class="btn btn-primary">+ Neue Nachricht</button>
        <table id="messages-table">
            <colgroup>
                <col id="topic-col">
                <col id="sender-col">
                <col id="recipient-col">
                <col id="date-col">
            </colgroup>
            <thead>
            <tr>
                <th class="messages-th topic">Betreff</th>
                <th class="messages-th sender">Absender</th>
                <th class="messages-th recipient">Empfänger</th>
                <th class="messages-th date">Datum / Uhrzeit</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($messages as $index => $message)
                <tr class="messages-td clickable" onclick="toggleRow('message-{{$index}}')">
                    <td class='messages-td topic'>{{$message['topic']}}</td>
                    <td class='messages-td sender'>{{$message['sender']}}</td>
                    <td class='messages-td recipient'>{{$message['recipient']}}</td>
                    <td class='messages-td date'>{{$message['date']}}</td>
                </tr>
                <tr class="hidden" id="message-{{$index}}">
                    <td colspan="4">{!! nl2br($message['message']) !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div id="chatContainer">
        <div id="chatHeader">
            <h3>Neue Nachricht</h3>
            <button id="closeChatBtn" class="btn close"></button>
        </div>
        <div id="chat-bottom">
            <form action="" method="post">
                <div>
                    <input type="text" class="msg-input" id="recipient" name="recipient" placeholder="Empfänger eingeben..." required>
                    <select name="verteiler" id="verteiler" class="dropdown" onchange="updateRecipients()">
                        <option value="Klassen" selected>Klassen</option>
                        @foreach($klassen as $name => $klasse)
                            <option class="dropdown-content" value="{{$name}}">{{$name}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="text" class="msg-input" id="topic" name="topic" placeholder="Betreff eingeben..." required>
                <textarea class="msg-input" id="messageInput" name="message" placeholder="Nachricht eingeben..." required></textarea><br>
                <button type="submit" id="sendMessageBtn" class="btn btn-primary">Senden</button>
            </form>
        </div>
    </div>
</section>
@endsection

@section("cssextra")
    <link rel="stylesheet" href="/css/kommunikation.css">
@endsection

@section("jsextra")
    <script src="/js/kommunikation.js">
        const klassenData = <?php echo json_encode($klassen); ?>;
    </script>
@endsection