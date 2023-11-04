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
    <title>宿泊プラン一覧</title>                         
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
        <a class="btn btn-primary" href="{{ route('plan.create') }}">新規作成</a>
          <table class="table table-bordered mt-4">
              <thead>
                  <tr>
                      <th>宿泊プラン名</th>
                      <th>説明</th>
                      <th>追加料金</th>
                      <th>画像アップロード</th>
                      <th>編集・削除</th>
                  </tr>
              </thead>
              <tbody>


                  @foreach($plans as $plan)
                  <tr>
                      <td>{{ $plan->title }}</td>
                      <td>{{ $plan->body }}</td>
                      <td>{{ $plan->add_price }}円</td>
                      <td>
                        <form method="POST" action="{{ route('image.store', $plan->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div>
                                <input type="file" name="image">
                            </div>
                            <button type="submit">アップロード</button>
                        </form>
                      </td>
                      <td> 
                          <a class="btn btn-primary" href="{{ route('plan.edit', $plan) }}">編集</a>
                          <form action="{{ route('plan.destroy', $plan) }}" method="post">
                          @csrf
                          @method('delete')
                          <button type="submit" class="btn btn-danger">削除</button>
                          </form>
                      </td>
                  </tr>
                  
                  @endforeach
              </tbody>
          </table>

        </div>
    </body>
    </html>