<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\StoreRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            $previewImagePath = Storage::put('/images', $data['preview_image']);
            $mainImagePath = Storage::put('/images', $data['main_image']);
            $data['preview_image'] = $previewImagePath;
            $data['main_image'] = $mainImagePath;
            $post = Post::firstOrCreate($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return redirect()->route('admin.post.show', compact('post'));
    }
}
