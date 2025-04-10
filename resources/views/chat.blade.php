<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>دردشة الطبيب والمريض</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #messages {
            height: 400px;
            overflow-y: scroll;
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
        .message {
            padding: 5px;
            margin-bottom: 10px;
        }
        .message.patient {
            background-color: #e1f5fe;
        }
        .message.doctor {
            background-color: #fff3e0;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-12">
            <h3>دردشة مع الطبيب</h3>
            <div id="messages">
                @foreach($messages as $message)
                    <div class="message {{ $message->sender_id == auth()->user()->id ? 'doctor' : 'patient' }}">
                        {{ $message->message }}
                    </div>
                @endforeach
            </div>
            <textarea id="message-input" class="form-control" rows="3" placeholder="اكتب رسالتك هنا..."></textarea>
            <button id="send-message" class="btn btn-primary mt-3">إرسال</button>
        </div>
    </div>
</div>

<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script>
    // إعداد Pusher
    Pusher.logToConsole = true;
    
    var pusherKey = '{{ env('PUSHER_APP_KEY') }}';  // استخدام متغير بيئي للمفتاح
    var pusher = new Pusher(pusherKey, {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}'
    });

    var channel = pusher.subscribe('conversation.{{ $conversation->id }}');
    channel.bind('message.sent', function(data) {
        displayMessage(data.message);
    });

    // إرسال الرسالة
    document.getElementById('send-message').addEventListener('click', function() {
        var message = document.getElementById('message-input').value;
        if (!message.trim()) return;  // تجنب إرسال رسائل فارغة
        
        var senderId = {{ auth()->user()->id }};
        var conversationId = {{ $conversation->id }};

        axios.post('/send-message', {
            conversation_id: conversationId,
            sender_id: senderId,
            message: message,
            message_type: 'text',
            _token: '{{ csrf_token() }}'  // إضافة رمز CSRF للأمان
        }).then(function(response) {
            document.getElementById('message-input').value = '';
            displayMessage(response.data);
        }).catch(function(error) {
            console.error(error);
            alert('حدث خطأ أثناء إرسال الرسالة');
        });
    });

    function displayMessage(message) {
        var messageContainer = document.getElementById('messages');
        var messageElement = document.createElement('div');
        messageElement.classList.add('message');

        if (message.sender_id === {{ auth()->user()->id }}) {
            messageElement.classList.add('doctor');
        } else {
            messageElement.classList.add('patient');
        }

        messageElement.innerHTML = message.message;
        messageContainer.appendChild(messageElement);
        messageContainer.scrollTop = messageContainer.scrollHeight;
    }
</script>

</body>
</html>