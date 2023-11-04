<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>予約枠新規作成</title>                         
</head>
<body>
    <ul class="nav justify-content-end my-4">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.edit') }}">アカウント画面</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('reservation_slot.index') }}">戻る</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
      </ul>
    <div class="container">
      <h1>予約スロット作成</h1>
    
      <form action="{{ route('reservation_slot.store') }}" method="post">
          @csrf
          @method('post')


          <label for="room_id">部屋の種類</label>
            <select name="room_id" id="room_id">
            <option value="">選択してください</option>
            @foreach($rooms as $room)
            <option value="{{ $room->id }}">{{ $room->room_type }}</option>
            @endforeach
            </select> 

  
          <div class="mb-3">
              <label for="date" class="form-label">日付</label>
              <input type="date" class="form-control" id="date" name="date" required>
          </div>
  
          <div class="mb-3">
              <label for="available_count" class="form-label">利用可能数</label>
              <input type="number" class="form-control" id="available_count" name="available_count" required>
          </div>
  
          <div class="mb-3">
              <label for="price" class="form-label">価格</label>
              <input type="number" class="form-control" id="price" name="price" required>
          </div>
  
          <button type="submit" class="btn btn-primary">保存</button>
      </form>
    </div>

</body>
</html>