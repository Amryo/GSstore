<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /* For make middleware for any Page  */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //where('status', '=', 'active')->orderBy('name', 'ASC')->orderBy('price', 'DESC')->get();
        Gate::authorize('products.view-any');
        $products = Product::active()->paginate();
        $count = Product::count();

        return view('admin.products.index', ['products' => $products, 'count' => $count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        Gate::authorize('products.create');
        $product = new Product();
        $categories = Category::all();
        return view('admin.products.create', ['product' => $product, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->merge([
            'slug' => Str::slug($request->get('name'))
        ]);

        $input = $request->all();
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $input['image'] = $image_path;
        }
        $products = Product::create($input);
        $success = request()->session()->flash('success', 'Product ' . '(' . $request['name'] . ')' . ' Add successfully');
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        Gate::authorize('products.update');
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.products.edit', ['product' => $product, 'categories' => $categories]);
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
        Gate::authorize('products.update');
        $products = Product::find($id);
        $input = $request->all();
        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('uploads', 'public');
            $input['image'] = $image_path;
        }
        $products->update($input);
        $success = request()->session()->flash('success', 'Product ' . '(' . $request['name'] . ')' . ' Update successfully');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Gate::authorize('products.delete');
        $product = Product::findorfail($id);
        $product->delete();
        $success = session()->flash('success', $product->name . ' Deleted successfully');
        return redirect()->back();
    }
}
