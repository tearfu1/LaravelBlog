<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Http\Requests\Admin\Tag\UpdateRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Tag $tag)
    {
        try {
            $data = $request->validated();
            DB::beginTransaction();
            $tag->update($data);
            $tag->fresh();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return redirect()->route('admin.tag.show', compact('tag'));
    }
}
