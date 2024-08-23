<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tag\StoreRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        try {
            $data = $request->validated();
            DB::beginTransaction();
            $tag = Tag::firstOrCreate($data);
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            return $exception->getMessage();
        }
        return redirect()->route('admin.tag.show', compact('tag'));
    }
}
