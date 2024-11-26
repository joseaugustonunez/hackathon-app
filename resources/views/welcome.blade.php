<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contraloría del Perú</title>
   
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        html, body {
            height: 100%; /* Asegura que ocupen toda la altura */
            margin: 0;
            display: flex;
            flex-direction: column; /* Configura un diseño vertical */
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #F8F9FA;
        }

        .navbar {
            background-color: #F5F5F5; /* Gris claro */
            border-bottom: 2px solid #E30613; /* Línea roja */
        }

        .navbar-brand img {
            height: 100px; /* Ajusta el tamaño según lo que necesites */
            max-height: none; /* Permite que la imagen crezca sin restricciones */
        }

        .navbar-nav .nav-link {
            color: #343A40 !important; /* Negro */
            font-weight: 500;
        }

        .navbar-nav .nav-link:hover {
            color: #E30613 !important; /* Rojo para hover */
        }

        .hero {
        background: url('{{ asset('img/contraloria.jpg') }}') no-repeat center center; /* Ruta de la imagen */
        background-size: cover; /* Ajusta la imagen para cubrir todo el contenedor */
        text-align: center;
        padding: 80px 20px;
        margin-bottom: 50px;
        position: relative;
    }

    .hero h1,
    .hero p {
        color: white;
        position: relative;
        z-index: 2;
    }

    .hero h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    .hero p {
        font-size: 1.5rem;
        margin-top: 20px;
    }

    .hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.2));
        z-index: 1;
    }

    .btn-custom {
        background-color: white;
        color: #E30613; /* Rojo institucional */
        font-weight: bold;
        border: 2px solid white;
        position: relative;
        z-index: 2;
    }

    .btn-custom:hover {
        background-color: #C70000;
        color: white;
    }

        .card {
            border: none;
            background-color: white;
        }

        .card-title {
            color: #E30613; /* Títulos en rojo */
            font-weight: bold;
        }

        .card-text {
            color: #6C757D; /* Texto en plomo */
        }

        footer {
            background-color: #F5F5F5;
            color: #343A40;
            text-align: center;
            padding: 10px 0;
            flex-shrink: 0; /* Evita que el footer se reduzca */
        }

        footer p {
            margin: 0; /* Corrige el margen del texto dentro del footer */
        }

        main {
            flex: 1; /* Permite que el contenido principal ocupe el espacio restante */
            margin-top: 0px; /* Agrega un margen superior para separación adicional */
        }
/* Estilos generales para el chat flotante */
.chat-container {
    position: fixed;
    bottom: 20px;
    right: 20px;
    width: 300px;
    height: 400px;
    background-color: #fff; /* Blanco */
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2); /* Sombra gris oscuro */
    display: none;
    flex-direction: column;
    font-family: Arial, sans-serif;
    z-index: 1000;
}

/* Cabecera del chat */
.chat-header {
    background-color: #D32F2F; /* Rojo */
    color: white;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-radius: 10px 10px 0 0;
}

.chat-header h5 {
    margin: 0;
}

/* Botón de cierre */
.close-btn {
    background-color: transparent;
    border: none;
    color: white;
    font-size: 18px;
    cursor: pointer;
}

/* Área de mensajes */
.chat-body {
    padding: 15px;
    overflow-y: auto;
    flex: 1;
    background-color: #F5F5F5; /* Plomo claro */
}

/* Mensajes del chat */
.chat-message {
    margin-bottom: 10px;
    padding: 8px;
    border-radius: 10px;
    max-width: 80%;
}

.chat-message.bot {
    background-color: #B0BEC5; /* Plomo */
    margin-left: 10px;
}

.chat-message.user {
    background-color: #D32F2F; /* Rojo */
    color: white;
    margin-right: 10px;
    align-self: flex-end;
}

/* Input para escribir */
.chat-input {
    padding: 10px;
    border: none;
    border-top: 1px solid #ddd;
    border-radius: 0 0 10px 10px;
    width: 100%;
    box-sizing: border-box;
    background-color: #F5F5F5; /* Plomo claro */
}

/* Botón para abrir el chat */
.open-chat-btn {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #D32F2F; /* Rojo */
    color: white;
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    font-size: 24px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
    z-index: 1001;
}

/* Animación de aparición */
@keyframes slideUp {
    0% {
        transform: translateY(100%);
    }
    100% {
        transform: translateY(0);
    }
}


    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/logo_standar.svg') }}" alt="Logo Contraloría">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="nav-link">Inicio</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">Iniciar Sesión</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a href="{{ route('register') }}" class="nav-link" >Registrarse</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <h1>Bienvenido a la Contraloría</h1>
        <p class="lead">Sistema de seguimiento y monitoreo de denuncias.</p>
        <a href="{{ route('register') }}" class="btn btn-custom btn-lg">Conoce Más</a>
    </div>

    <!-- Main Content -->
    <main class="d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <button class="btn btn-light w-100">
                            <a href="/denuncias/mostrar" class="btn btn-light w-100 text-decoration-none">
                                <div class="card-body">
                                    <h5 class="card-title text-danger">Seguimiento a tu denuncia</h5>
                                    <p class="card-text">Click para ver el progreso de su denuncia.</p>
                                </div>
                            </a>
                        </button>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card shadow">
                        <button class="btn btn-light w-100">
                            <a href="/denuncias/registro" class="btn btn-light w-100 text-decoration-none">
                                <div class="card-body">
                                    <h5 class="card-title text-danger">Realizar denuncia</h5>
                                    <p class="card-text">Click aquí si quieres hacer una denuncia</p>
                                </div>
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Chat flotante -->
    <div class="chat-container" id="chat-container">
        <div class="chat-header">
            <h5>Chat de Ayuda</h5>
            <button class="close-btn" onclick="toggleChat()">X</button>
        </div>
        <div class="chat-body" id="chat-body">
            <!-- Mensajes del chat -->
            <div class="chat-message bot">
                <p><strong>Bot:</strong> Hola, ¿en qué puedo ayudarte?</p>
            </div>
        </div>
        <input type="text" class="chat-input" id="chat-input" placeholder="Escribe un mensaje..." onkeypress="sendMessage(event)">
    </div>
    <button class="open-chat-btn" onclick="toggleChat()">💬</button>

    <!-- Footer -->
    <footer class="py-4">
        <div class="container text-center">
            <p class="text-muted">&copy; 2024 Contraloría General de la República del Perú. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Función para alternar la visibilidad del chat
function toggleChat() {
    const chatContainer = document.getElementById('chat-container');
    chatContainer.style.display = chatContainer.style.display === 'none' || chatContainer.style.display === '' ? 'flex' : 'none';
}

// Función para enviar un mensaje
function sendMessage(event) {
    if (event.key === 'Enter') {
        const input = document.getElementById('chat-input');
        const userMessage = input.value.trim();
        
        if (userMessage) {
            // Agregar mensaje del usuario
            appendMessage(userMessage, 'user');
            
            // Limpiar el campo de texto
            input.value = '';

            // Simular respuesta del bot
            setTimeout(() => {
                const botResponse = getBotResponse(userMessage);
                appendMessage(botResponse, 'bot');
            }, 1000);
        }
    }
}

// Función para mostrar los mensajes en el chat
function appendMessage(message, sender) {
    const chatBody = document.getElementById('chat-body');
    const messageElement = document.createElement('div');
    messageElement.classList.add('chat-message', sender);
    messageElement.innerHTML = `<p><strong>${sender === 'user' ? 'Tú' : 'Bot'}:</strong> ${message}</p>`;
    chatBody.appendChild(messageElement);
    chatBody.scrollTop = chatBody.scrollHeight; // Desplazar hacia abajo
}

function getBotResponse(userMessage) {
    // Mensajes de respuesta
    const responses = {
        "hola": "¡Hola! Soy el asistente de la Contraloría. ¿Cómo puedo ayudarte? Por favor, elige una opción:\n\n1. ¿Cómo presentar una denuncia?\n2. ¿Qué tipos de denuncias puedo hacer?\n3. ¿Cuál es el proceso de una denuncia?\n4. ¿Cómo consultar el estado de mi denuncia?\n\nEscribe el número de la opción o la pregunta.",
        "1": "Para presentar una denuncia, sigue estos pasos:\n1. Ingresa a la página web de la Contraloría.\n2. Accede a la sección de denuncias.\n3. Llena el formulario con los datos solicitados (tipo de denuncia, descripción, evidencias, etc.).\n4. Envía el formulario. Te notificaremos el estado de tu denuncia.",
        "2": "Puedes presentar denuncias sobre:\n1. Corrupción.\n2. Mal uso de recursos públicos.\n3. Abuso de poder.\n4. Inmoralidad administrativa.\n5. Otros. (Especifica tu denuncia si no está en las opciones).\nEscribe el número del tipo de denuncia o detalla tu denuncia.",
        "3": "El proceso de una denuncia es el siguiente:\n1. Recepción de la denuncia y validación de los datos.\n2. Investigación del caso.\n3. Toma de decisiones y resolución.\n4. Comunicación del resultado al denunciante.",
        "4": "Para consultar el estado de tu denuncia, por favor, ingresa el número de seguimiento o el código de tu denuncia.",
        "adiós": "¡Hasta luego! Si necesitas más ayuda, no dudes en volver.",
    };

    // Respuesta predeterminada si no hay coincidencias
    return responses[userMessage.toLowerCase()] || "Lo siento, no entiendo esa pregunta. Por favor, elige una opción:\n\n1. ¿Cómo presentar una denuncia?\n2. ¿Qué tipos de denuncias puedo hacer?\n3. ¿Cuál es el proceso de una denuncia?\n4. ¿Cómo consultar el estado de mi denuncia?\n\nEscribe el número de la opción o la pregunta.";
}

    </script>
</body>
</html>
