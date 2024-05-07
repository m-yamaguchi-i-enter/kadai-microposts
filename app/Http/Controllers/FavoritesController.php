<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavoritesController extends Controller
{
     /**
     * micropostをfavoriteするアクション。
     *
     * @param  $micropost_id  お気に入りするmicropostsのid
     * @return \Illuminate\Http\Response
     */
    public function store(string $id)
    {
        // 認証済みユーザー（閲覧者）が、 micropost_idのmicropostをfavoriteする
        \Auth::user()->favorite(intval($id));
        // 前のURLへリダイレクトさせる
        return back();
    }

    /**
     * micropostをunfavoriteするアクション。
     *
     * @param  $micropost_id  お気に入り解除するmicropostsのid
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $id)
    {
        // 認証済みユーザー（閲覧者）が、 micropost_idのmicropostをunfavoriteする
        \Auth::user()->unfavorite(intval($id));
        // 前のURLへリダイレクトさせる
        return back();
    }
}
