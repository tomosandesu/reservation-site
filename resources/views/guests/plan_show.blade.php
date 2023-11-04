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
    <title>宿泊プラン一覧</title>
</head>
<body>
   
        <ul class="nav nav-tabs my-4">
            <li class="nav-item">
                <h3 class="nav-link disabled mx-3">宿泊プラン一覧</h3>
            </li>
        </ul>

    <div class="container">
        <form method="GET" action="{{ route('plan.show') }}">
            <div class="form-group">
                <label for="title">宿泊プラン</label>
                <select class="form-control" name="title" id="title">
                    <option value="">すべて</option>
                    <option value="朝食付きプラン">朝食付きプラン</option>
                    <option value="朝食・夕食付プラン">朝食・夕食付プラン</option>
                    <option value="素泊まりプラン">素泊まりプラン</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">検索</button>
        </form>

        <div class="row">
            @foreach($plans as $plan)
            <div class="card mx-4 mt-4" style="width: 18rem;">
            {{-- Planに関連する全てのImageを取得 --}}
             @foreach($plan->images as $image)
            <img src="{{ $image->path }}" class="card-img-top" alt="">
            @endforeach 
                <div class="card-body">
                    <h5 class="card-title">{{ $plan->title}}</h5>
                    <p class="card-text">{{ $plan->body }}</p>
                    <p>追加料金:{{ $plan->add_price }}円</p>
                    <a href="{{ route('plan.detail', $plan->id) }}" class="btn btn-primary">詳細について</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>




{{-- <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        @foreach($plan->images as $image)
      <div class="carousel-item active">
        <img src="{{ asset($image->path) }}" class="d-block w-100" alt="">
      </div>
      @endforeach
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div> --}}