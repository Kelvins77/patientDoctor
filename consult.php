<?php include('config.php');?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatroom</title>
    <style>
        /* CSS styles for the chatroom form */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 60%;
            padding: 20px;
            background-color: #f3f3f3;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
        }

        #chat-container {
            height: 300px;
            overflow-y: scroll;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }

        #chat-list {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        #input-container {
            display: flex;
            gap: 10px;
        }

        #input-message {
            flex-grow: 1;
        }

        #btn-send {
            flex-shrink: 0;
        }
           /* Styling for buttons */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #0d6efd;
            color: #fff;
            text-decoration: none;
            margin-right: 10px;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #0b5ed7;
        }

        .btn-red {
            background-color: #dc3545;
        }

        .btn-red:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <form>
        <h1>Consultation Space</h1>
        <div id="chat-container">
            <ul id="chat-list"></ul>
        </div>
        <div id="input-container">
            <input type="text" id="input-message" placeholder="Type your message...">
            <button id="btn-send">Send</button>
        </div>
         <a href="pdash1.php" class="btn btn-red">Close</a>
    </form>

</body>
</html>
    <script type="text/javascript">
            <script src="script.js">
        // Fetch chat messages from the database and display them in the chat container
function fetchChatMessages() {
    const chatList = document.getElementById('chat-list');
    chatList.innerHTML = ''; // Clear chat list

    // Fetch chat messages from the database using an API endpoint
    fetch('fetch-messages.php')
        .then(response => response.json())
        .then(data => {
            // Loop through the chat messages and append them to the chat list
            data.forEach(message => {
                const listItem = document.createElement('li');
                listItem.textContent = `${message.sender}: ${message.message}`;
                chatList.appendChild(listItem);
            });

            // Scroll to the bottom of the chat container
            chatList.scrollTop = chatList.scrollHeight;
        })
        .catch(error => console.error(error));
}

// Send chat message to the database and update the chat container
function sendChatMessage(sender, message) {
    // Send chat message to the database using an API endpoint
    fetch('api/send-message.php', {
        method: 'POST',
        body: JSON.stringify({ sender, message }),
        headers: { 'Content-Type': 'application/json' }
    })
        .then(response => response.json())
        .then(data => {
            // Fetch chat messages again to update the chat container
            fetchChatMessages();
        })
        .catch(error => console.error(error));
}

// Fetch initial chat messages when the page loads
document.addEventListener('DOMContentLoaded', () => {
    fetchChatMessages();
});

// Send chat message when the Send button is clicked
document.getElementById('btn-send').addEventListener('click', () => {
    const inputMessage = document.getElementById('input-message');
    const sender = 'Patient'; // Replace with appropriate sender (e.g., 'Specialist')
    const message = inputMessage.value.trim();

    // Check if input message is not empty
    if (message !== '') {
        sendChatMessage(sender, message);
        inputMessage.value = ''; // Clear input message
    }
});

// Send chat message when Enter key is pressed in the input message field
document.getElementById('input-message').addEventListener('keydown', event => {
    const sender = 'Patient'; // Replace with appropriate sender (e.g., 'Specialist')
    const message = event.target.value.trim();

    // Check if Enter key is pressed and input message is not empty
    if (event.keyCode === 13 && message !== '') {
        sendChatMessage(sender, message);
        event.target.value = ''; // Clear input message
    }
});

    </script>
