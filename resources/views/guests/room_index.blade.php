<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>客室紹介</title>
</head>
<body>

    <ul class="nav nav-tabs my-4">
        <li class="nav-item">
            <h3 class="nav-link disabled mx-3">客室紹介</h3>
        </li>
    </ul>

    <div class="container">
        <div class="row">
        @foreach ($rooms as $room)
            <div class="card" style="width: 22rem;">
                <div class="row">
                    <img src="https://thumb.photo-ac.com/fe/fe359aae609314562791721c74a912ca_t.jpeg" class="card-img-top" alt="..." width="180" height="250">
                    <div class="card-body">
                        <h5 class="card-title">{{ $room->room_type }}</h5>
                        <p class="card-text">{{ $room->description }}</p>
                        <p class="card-text">部屋数：{{ $room->total_rooms }}</p>
                    </div>
                </div>
            </div>          
        @endforeach
    </div>

    </div>




</body>
</html>