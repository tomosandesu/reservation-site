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
    <title>宿泊プラン詳細</title>
</head>
<body>
        <ul class="nav nav-tabs my-4">
            <li class="nav-item">
                <h3 class="nav-link disabled mx-3">宿泊プラン詳細</h3>
            </li>
        </ul>

        <div class="container">
            <h3>{{ $plan->title }}</h3>
            <p>{{ $plan->body }}</p>
            <div id="carouselExample" class="carousel slide">
              @foreach ($plan->images as $image)
                

              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="{{ $image->path }}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                  <img src="" class="d-block w-100" alt="...">
                </div>
              </div>
              @endforeach
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            
              <a href="{{ route('select-room', $plan->id) }}" class="btn btn-primary">部屋選択画面へ</a>
        </div>
    </body>
    </html>