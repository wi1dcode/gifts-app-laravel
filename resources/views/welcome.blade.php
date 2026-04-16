<x-layouts.app>
    <a href="{{ route('gifts.create') }}">Ajouter un cadeau</a>

    @if ($gifts->isEmpty())
        <p>Aucun cadeau enregistré.</p>
    @else
        <ul>
            @foreach ($gifts as $gift)
                <li>
                    <strong>{{ $gift->name }}</strong> - {{ $gift->price }} €

                    <a href="{{ route('gifts.show', $gift) }}">Voir</a>
                    <a href="{{ route('gifts.edit', $gift) }}">Modifier</a>

                    <form action="{{ route('gifts.destroy', $gift) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @endif
</x-layouts.app>