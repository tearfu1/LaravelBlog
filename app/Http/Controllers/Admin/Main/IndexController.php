<?php

namespace App\Http\Controllers\Admin\Main;

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
    public function __invoke(Request $request)
    {
        $data = [
            'users_count' => User::all()->count(),
            'posts_count' => Post::all()->count(),
            'categories_count' => Category::all()->count(),
            'tags_count' => Tag::all()->count(),
        ];
        return view('admin.main.index', compact('data'));
    }
}
