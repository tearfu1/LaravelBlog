<?php

namespace App\Http\Service\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    public function store($data)
    {
        try {
            DB::beginTransaction();
            $previewImagePath = Storage::disk('public')->put('/images', $data['preview_image']);
            $mainImagePath = Storage::disk('public')->put('/images', $data['main_image']);
            $data['preview_image'] = $previewImagePath;
            $data['main_image'] = $mainImagePath;
            $tagIds = $data['tag_ids'];
            unset($data['tag_ids']);
            $post = Post::firstOrCreate($data);
            $post->tags()->attach($tagIds);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return $post;
    }

    public function update(Post $post, $data)
    {
        try {
            DB::beginTransaction();
            if (array_key_exists('preview_image', $data)) {
                $previewImagePath = Storage::disk('public')->put('/images', $data['preview_image']);
                $data['preview_image'] = $previewImagePath;
            }
            if (array_key_exists('main_image', $data)) {
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
        return $post;
    }
}
