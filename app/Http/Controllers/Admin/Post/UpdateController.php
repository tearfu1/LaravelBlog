<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Post\UpdateRequest;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Post $post)
    {
        try {
            DB::beginTransaction();
            $data = $request->validated();
            if(array_key_exists('preview_image',$data)){
                $previewImagePath = Storage::disk('public')->put('/images', $data['preview_image']);
                $data['preview_image'] = $previewImagePath;
            }
            if(array_key_exists('main_image',$data)){
                $mainImagePath = Storage::disk('public')->put('/images', $data['main_image']);
                $data['main_image'] = $mainImagePath;
            }
                $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            $post->update($data);
            $post->tags()->sync($tagIds);
            $post->fresh();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return redirect()->route('admin.post.show', compact('post'));
    }
}
