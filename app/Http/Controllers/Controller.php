<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\logo;
use App\Models\Message;
use App\Models\news;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function __construct()
    {
        $new = news::all();
        $logo = logo::all();
        $comment = Comment::latest('created_at')->take(3)->get();
        $message = Message::all();
        View::share([
            "logo" => $logo,
            "message" => $message,
            "new" => $new,
            "comment" =>  $comment,
        ]);
    }
}
