<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //protected $vali = Category::validateRule();
    public function index(Request $request)
    {
        $category = Category::when($request->query('parent_id'), function ($query, $value) {
            $query->where('parent_id', '=', $value);
        })->paginate();
        return CategoryResource::collection($category);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$request->user()->tokenCan('categories.read')) {
            abort(403, 'Not Allowed');
        }
        $request->validate([
            'name' => 'sometimes|required'
        ]);
        $category = Category::create($request->all());
        $category->refresh();
        return response()->json($category, 201, ['x-application-name' => config('app.name')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $category = Category::with('children')->findOrFail($id);
        return new CategoryResource($category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Category::validateRule();
        $category = Category::findOrfail($id);
        $category->update($request->all());

        return response()->json([
            'message' => 'Category Update Successfully',
            'category' => $category,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return response()->json([
            'message' => 'Category Deleted Successfully',
        ]);
    }
}
