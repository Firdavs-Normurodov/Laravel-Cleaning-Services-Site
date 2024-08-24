<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Hurmatli {{ $post->user->name }}!</h1>
    <h5>Siz {{ $post->created_at }} da yangi post yaratdingiz</h5>
    <p>Post id: {{ $post->id }}</p>
    <div>{{ $post->title }}</div>
    <div>{{ $post->short_content }}</div>
    <div>{{ $post->content }}</div>
    <strong>Rahmat</strong>
</body>

</html>
