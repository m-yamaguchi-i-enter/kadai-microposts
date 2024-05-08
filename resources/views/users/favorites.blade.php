@extends('layouts.app')

@section('content')
    <div class="sm:grid sm:grid-cols-3 sm:gap-10">
        <aside class="mt-4">
            {{-- ユーザー情報 --}}
            @include('users.card')
        </aside>
        <div class="sm:col-span-2 mt-4">
            {{-- タブ --}}
            @include('users.navtabs')
            <div class="mt-4">
                {{-- お気に入り一覧 --}}
                @foreach ($favorites as $favorite)
                    <li class="flex items-start gap-x-2 mb-4">
                    {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                    <div class="avatar">
                        <div class="w-12 rounded">
                            <img src="{{ Gravatar::get($favorite->user->email) }}" alt="" />
                        </div>
                    </div>
                    <div>
                        <div>
                            {{-- 投稿の所有者のユーザー詳細ページへのリンク --}}
                            <a class="link link-hover text-info" href="{{ route('users.show', $favorite->user->id) }}">{{ $favorite->user->name }}</a>
                            <span class="text-muted text-gray-500">posted at {{ $favorite->created_at }}</span>
                        </div>
                        <div>
                            {{-- 投稿内容 --}}
                            <p class="mb-0">{!! nl2br(e($favorite->content)) !!}</p>
                            <!--{, }} で囲った場合は、htmlspecialchars関数に通したものが出力される-->
                            <!--｛!!, !!} で囲った場合は、そのまま出力される-->
                        </div>
                        @include('micropost_favorites.favorite_button', ['id' => $favorite->id])
                    </div>
                </li>
                @endforeach
            </div>
        </div>
    </div>
@endsection