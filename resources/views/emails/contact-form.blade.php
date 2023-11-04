<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form Message</title>
</head>
<body>
    <h2>お問い合わせ内容</h2>
    <p>メールアドレス: {{ $data['email'] }}</p>
    <p>お問い合わせ内容:</p>
    <p>{{ $data['message'] }}</p>
</body>
</html>
