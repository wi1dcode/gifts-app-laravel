<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un cadeau</title>
</head>
<body>
    <h1>Créer un cadeau</h1>

    <form action="{{ route('gifts.store') }}" method="POST">
        @csrf

        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="url">URL</label>
            <input type="text" name="url" id="url" value="{{ old('url') }}">
            @error('url')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="details">Détails</label>
            <textarea name="details" id="details">{{ old('details') }}</textarea>
            @error('details')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="price">Prix</label>
            <input type="text" name="price" id="price" value="{{ old('price') }}">
            @error('price')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Enregistrer</button>
    </form>

    <p><a href="{{ route('home') }}">Retour</a></p>
</body>
</html>