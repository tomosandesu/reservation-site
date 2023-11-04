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
<title>管理画面</title>
</head>
<body>
  <ul class="nav justify-content-end my-4">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('profile.edit')}}">アカウント画面</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('contact.index') }}">お問い合わせ一覧</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('reservation_slot.index') }}">予約枠一覧</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('reservation.index') }}">予約一覧</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('plan.index') }}">宿泊プラン一覧</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
      
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
      </form>
  </li>
  </ul>

    <div class="container">
    <h2 class="content-heading mt-4">Icon Tiles <small>Simple</small></h2>
    <div class="row g-sm">
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-badge fa-4x"></i>
              </p>
              <p class="fw-medium">Badges</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-envelope fa-4x text-success"></i>
              </p>
              <p class="fw-medium">Inbox</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-bag fa-4x text-danger"></i>
              </p>
              <p class="fw-medium">Cart</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-bar-chart fa-4x text-corporate"></i>
              </p>
              <p class="fw-medium">Live Stats</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-cloud-upload fa-4x text-flat"></i>
              </p>
              <p class="fw-medium">~ 7.5 MB/s</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-chemistry fa-4x text-elegance"></i>
              </p>
              <p class="fw-medium">Lab</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-diamond fa-4x text-info"></i>
              </p>
              <p class="fw-medium">Minecraft</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-camera fa-4x text-muted"></i>
              </p>
              <p class="fw-medium">Videos</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-support fa-4x text-warning"></i>
              </p>
              <p class="fw-medium">Support</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-bubbles fa-4x text-pulse"></i>
              </p>
              <p class="fw-medium">Chat</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-compass fa-4x text-earth"></i>
              </p>
              <p class="fw-medium">Locating..</p>
            </div>
          </a>
        </div>
        <div class="col-6 col-md-4 col-xl-2">
          <a class="block block-link-shadow text-center" href="javascript:void(0)">
            <div class="block-content">
              <p class="mt-1">
                <i class="si si-globe fa-4x"></i>
              </p>
              <p class="fw-medium">World Live</p>
              <i class="fa-regular fa-calendar-days"></i>
              <i class="fa-sharp fa-light fa-envelope"></i>
            </div>
          </a>
        </div>
      </div>

     
    
    
</body>
</html>
