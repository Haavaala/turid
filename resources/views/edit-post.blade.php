<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rediger blogginnlegg</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>

<body>
    <button class="back-button" onclick="window.history.back()">Tilbake</button>
    <h1>Rediger blogginnlegg</h1>
    <form action="{{ route('update-post', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Tittel</label>
        <input type="text" id="title" name="title" value="{{ $post->title }}">

        <label for="text">Tekst</label>
        <textarea id="text" name="text">{{ $post->text }}</textarea>

        <label for="image">Bilde</label>
        <input type="file" id="image" name="image">

        <input type="submit" value="Bekreft endringer"></input>
    </form>
</body>

</html>