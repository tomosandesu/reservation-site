<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>

    <title>宿泊プラン新規作成</title>                         
</head>
<body>
    <ul class="nav justify-content-end my-4">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profile.edit') }}">アカウント画面</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('plan.index') }}">戻る</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
            
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
      </ul>
      <div class="container">
        <form action="{{ route('plan.update', $plan) }}" method="post">
            @csrf
            @method('patch')
              <div class="mb-3">
                  <label for="exampleFormControlInput1" class="form-label">宿泊プラン</label>
                  <input name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="" value="{{ old('title', $plan->title) }}">
              </div>
              <div class="mb-3">
                  <label for="exampleFormControlTextarea2" class="form-label">説明内容</label>
                  <textarea name="body" class="form-control" id="exampleFormControlTextarea2" rows="3" >{{ old('body', $plan->body) }}</textarea>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput3" class="form-label">追加料金</label>
                <input name="add_price" type="number" class="form-control" id="exampleFormControlInput3" placeholder="" value="{{ old('add_price', $plan->add_price) }}">
              </div>
                <button type="submit" class="btn btn-outline-success">更新</button>
        </form>
      </div>
    </body>
    </html>