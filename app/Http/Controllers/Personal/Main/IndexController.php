<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $data = [
            'lps_count' => auth()->user()->likedPosts->count(),
            'comments_count' => auth()->user()->comments->count(),
        ];
        return view('personal.main.index', compact('data'));
    }
}
