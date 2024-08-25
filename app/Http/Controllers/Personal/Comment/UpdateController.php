<?php

namespace App\Http\Controllers\Personal\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Comment $comment)
    {
        try {
            $data = $request->validated();
            DB::beginTransaction();
            $comment->update($data);
            $comment->fresh();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return redirect()->route('personal.comment.show', compact('comment'));
    }
}
