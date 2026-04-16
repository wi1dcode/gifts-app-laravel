<x-layouts.app>
    <h1>Modifier un cadeau</h1>

    <form action="{{ route('gifts.update', $gift) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name', $gift->name) }}">
            @error('name')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="url">URL</label>
            <input type="text" name="url" id="url" value="{{ old('url', $gift->url) }}">
            @error('url')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="details">Détails</label>
            <textarea name="details" id="details">{{ old('details', $gift->details) }}</textarea>
            @error('details')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="price">Prix</label>
            <input type="text" name="price" id="price" value="{{ old('price', $gift->price) }}">
            @error('price')
                <p>{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Mettre à jour</button>
    </form>

    <p><a href="{{ route('home') }}">Retour</a></p>
</x-layouts.app>