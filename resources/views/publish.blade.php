<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Turids Neglsalong</title>
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
</head>

<body>

    <form action="{{ route('publish') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="title">Tittel</label>
        <input type="text" name="title" placeholder="Skriv en tittel her" required>

        <label for="text">Tekst</label>
        <textarea name="text" id="text" cols="30" rows="10" placeholder="Skriv en tekst her" required></textarea>

        <label for="image">Bilde (valgfritt*)</label>
        <input type="file" name="image" id="image">

        <input type="submit" value="Publiser">
    </form>



</body>

</html>