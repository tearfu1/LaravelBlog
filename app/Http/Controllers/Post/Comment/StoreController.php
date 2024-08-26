<?php

namespace App\Http\Controllers\Post\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\Comment\StoreRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request, Post $post)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $data['post_id'] = $post->id;
            $data['user_id'] = auth()->user()->id;
            Comment::create($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return redirect()->route('post.show', $post);
    }
}
