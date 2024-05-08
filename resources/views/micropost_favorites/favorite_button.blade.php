@if (Auth::user()->is_favorites($id))
    {{-- お気に入り解除のボタンのフォーム --}}
    <form method="POST" action="{{ route('favorites.unfavorite', $id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-error btn-block normal-case">Unfavorite</button>
    </form>
@else
    {{-- お気に入りボタンのフォーム --}}
    <form method="POST" action="{{ route('favorites.favorite', $id) }}">
        @csrf
        <button type="submit" class="btn btn-primary btn-block normal-case">Favorite</button>
    </form>
@endif
