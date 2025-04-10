<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>قائمة المحادثات</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h3>المحادثات الحالية</h3>
    <div class="list-group">
        @foreach($conversations as $conversation)
            <a href="{{ route('chat', $conversation->id) }}" class="list-group-item list-group-item-action">
                @if($conversation->doctor_id === auth()->user()->id)
                    <strong>مريض: </strong>{{ $conversation->patient->name }}
                @else
                    <strong>طبيب: </strong>{{ $conversation->doctor->name }}
                @endif
            </a>
        @endforeach
    </div>
</div>

</body>
</html>
