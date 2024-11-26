@extends('layouts.app')

@section('content')
<div class="chatbot-container">
    <div class="chatbot">
        <div class="chat-header">
            Chatbot
        </div>
        <div class="chat-messages" id="chatMessages">
            <!-- Mensajes del chat -->
            <div class="chat-message bot">¡Hola! ¿En qué puedo ayudarte?</div>
        </div>
        <div class="chat-footer">
            <input type="text" id="chatInput" class="chat-input" placeholder="Escribe tu mensaje...">
            <button id="chatSend" class="chat-send">Enviar</button>
        </div>
    </div>
</div>

<script>
    document.getElementById('chatSend').addEventListener('click', function () {
        const chatMessages = document.getElementById('chatMessages');
        const chatInput = document.getElementById('chatInput');

        const userMessage = chatInput.value.trim();
        if (userMessage) {
            // Agregar el mensaje del usuario
            const userMsgDiv = document.createElement('div');
            userMsgDiv.className = 'chat-message user';
            userMsgDiv.textContent = userMessage;
            chatMessages.appendChild(userMsgDiv);

            // Simular respuesta del bot
            const botMsgDiv = document.createElement('div');
            botMsgDiv.className = 'chat-message bot';
            botMsgDiv.textContent = '¡Gracias por tu mensaje! Estoy aquí para ayudarte.';
            chatMessages.appendChild(botMsgDiv);

            chatInput.value = '';
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    });
</script>
@endsection
