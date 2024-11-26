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

            // Condiciones para las respuestas del bot
            const botMsgDiv = document.createElement('div');
            botMsgDiv.className = 'chat-message bot';
            
            // Respuestas condicionadas
            if (userMessage.toLowerCase().includes('hola')) {
                botMsgDiv.textContent = '¡Hola! ¿Cómo puedo ayudarte hoy? ¿Quieres saber cómo realizar una denuncia?';
                setTimeout(() => {
                    // Mostrar el menú de opciones después de un breve retraso
                    const menuDiv = document.createElement('div');
                    menuDiv.className = 'chat-message bot';
                    menuDiv.innerHTML = `
                        <strong>Opciones:</strong><br>
                        1. Cómo realizar una denuncia<br>
                        2. Consultar el estado de una denuncia<br>
                        3. Hablar con un agente de soporte<br>
                        Por favor, elige una opción escribiendo el número correspondiente.
                    `;
                    chatMessages.appendChild(menuDiv);
                    chatMessages.scrollTop = chatMessages.scrollHeight;
                }, 1000);  // Mostrar el menú después de 1 segundo
            } else if (userMessage.toLowerCase().includes('gracias')) {
                botMsgDiv.textContent = '¡De nada! ¿Hay algo más en lo que pueda ayudarte?';
            } else if (userMessage.toLowerCase().includes('cómo estás')) {
                botMsgDiv.textContent = 'Estoy bien, gracias por preguntar. ¿Y tú?';
            } else if (userMessage.toLowerCase().includes('adiós')) {
                botMsgDiv.textContent = '¡Hasta luego! ¡Que tengas un buen día!';
            } else if (userMessage === '1') {
                botMsgDiv.textContent = 'Para realizar una denuncia, sigue estos pasos:\n1. Regístrate o inicia sesión en la plataforma.\n2. Dirígete a la sección de "Denuncias".\n3. Completa el formulario con los detalles de la denuncia.\n4. Envía el formulario para procesar tu denuncia.';
            } else if (userMessage === '2') {
                botMsgDiv.textContent = 'Para consultar el estado de una denuncia, ingresa el código de la denuncia en la sección "Consultar estado".';
            } else if (userMessage === '3') {
                botMsgDiv.textContent = 'Para hablar con un agente de soporte, por favor, completa el formulario de contacto en la sección "Soporte" y un agente se pondrá en contacto contigo.';
            } else {
                botMsgDiv.textContent = 'Lo siento, no entiendo esa pregunta. ¿Puedo ayudarte con algo más?';
            }
            
            chatMessages.appendChild(botMsgDiv);

            chatInput.value = '';
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    });
</script>
@endsection
